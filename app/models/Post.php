<?php
 
class Post extends Eloquent {
    public static $group = array(
        'french' => "Френч",
        'design' => "Дизайн",
        'extension' => "Наращивание",
    );
    protected $fillable = array(
        'name',
        'group',
        'photo',
        'description',
        'id',
    );

    public static function getValidationRules(){
        $validation = array(
            'name' => 'required',
            'photo' => 'required',
            'post_prev_text' => 'required',
            'description' => 'required',
        );
        $validation['group'] = 'required|in:' . implode(',', array_keys(self::$group));

        return $validation;
    }

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }

}