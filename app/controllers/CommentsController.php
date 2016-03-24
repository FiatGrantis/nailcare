<?php

class CommentsController extends \BaseController {

    public function postAdd() {
        if (!Auth::check()) {
            return Redirect::back()->withErrors('Авторизируйтесь, чтобы оставить комментарий');
        }

        $data = Input::all();

        $validation = Validator::make($data, Comment::getValidationRules());
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $comment = new Comment();
        $comment->title = Input::get('title');
        $comment->comment = Input::get('text');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = Input::get('post_id');
        $comment->save();
        return Redirect::back();
    }

//    public function getView($commentId)
//    {
//        $comment = Comment::find($commentId);
//
//        // Если такой записи нет, то вернем пользователю ошибку 404 - Не найдено
//        if (!$comment) {
//            App::abort(404);
//        }
//    }

}
