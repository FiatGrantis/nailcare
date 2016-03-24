<?php

class Comment extends Eloquent {

    protected $fillable = array(
        'title',
        'text',
    );


    public static function getValidationRules(){
        $validation = array(
            'title' => 'required',
            'text' => 'required',
        );

        return $validation;
    }

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }

}

