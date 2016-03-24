<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('username', 'email', 'password');

    public static $validation = array(
        // Поле email является обязательным, также это должен быть допустимый адрес
        // электронной почты и быть уникальным в таблице users
        'email'     => 'required|email|unique:users',

        // Поле username является обязательным, содержать только латинские символы и цифры, и
        // также быть уникальным в таблице users
        'username'  => 'required|alpha_num|unique:users|min:4',

        // Поле password является обязательным, должно быть длиной не меньше 6 символов, а
        // также должно быть повторено (подтверждено) в поле password_confirmation
        'password'  => 'required|confirmed|min:6',
    );

    public function register() {
        $this->password = Hash::make($this->password);
        $this->activationCode = $this->generateCode();
        $this->isActive = false;
        $this->save();

        Log::info("User [{$this->email}] registered. Activation code: {$this->activationCode}");

        $this->sendActivationMail();

        return $this->id;
    }

    protected function generateCode() {
        return Str::random(); // По умолчанию длина случайной строки 16 символов
    }

    public function sendActivationMail() {
        $activationUrl = action(
            'UsersController@getActivate',
            array(
                'userId' => $this->id,
                'activationCode'    => $this->activationCode,
            )
        );

        $that = $this;
        Mail::send('emails/activation',
            array('activationUrl' => $activationUrl),
            function ($message) use($that) {
                $message->to($that->email)->subject('Спасибо за регистрацию!');
            }
        );
    }

    public function activate($activationCode) {
        // Если пользователь уже активирован, не будем делать никаких
        // проверок и вернем false
        if ($this->isActive) {
            return false;
        }

        // Если коды не совпадают, то также ввернем false
        if ($activationCode != $this->activationCode) {
            return false;
        }

        // Обнулим код, изменим флаг isActive и сохраним
        $this->activationCode = '';
        $this->isActive = true;
        $this->save();

        // И запишем информацию в лог, просто, чтобы была
        Log::info("User [{$this->email}] successfully activated");

        return true;
    }

    public function isAdmin()
    {
        return ($this->isAdmin == 1);
    }
}
