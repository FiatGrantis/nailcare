<?php

class News extends Eloquent {

    protected $fillable = array(
        'news_name',
        'news_photo',
        'news_text',
    );

    public static function getValidationRules(){
        $validation = array(
            'news_name' => 'required',
            'news_prev_text' => 'required',
            'news_photo' => 'required',
            'news_text' => 'required',
        );

        return $validation;
    }

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }

}