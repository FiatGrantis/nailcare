<?php

class NewsController extends \BaseController {

    public function getAdd() {
        return View::make('news/add');
    }

    public function postAdd() {
        $data = Input::all();

        $validation = Validator::make($data, News::getValidationRules());
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        if (Auth::check() || Auth::user()->isAdmin()) {
            $data['user_id'] = Auth::user()->id;
        }

        if(Input::hasFile('news_photo')){
            $file = Input::file('news_photo');
            $photo = str_random(6).'.'.$file->getClientOriginalExtension();
            $photo_thumb = 'uploads/news/thumbs/'.$photo;
            $image = Image::make($file->getRealPath())->fit(300, 240)->save($photo_thumb);
            $originalImage = Image::make($file->getRealPath())->fit(300, 240)->save('uploads/news/'.$photo);
        }

        $news = new News();
        $news->news_name = Input::get('news_name');
        $news->news_thumbnail = $photo_thumb;
        $news->news_prev_text = Input::get('news_prev_text');
        $news->news_photo = $photo;
        $news->news_text = Input::get('news_text');
        $news->user_id = Auth::user()->id;
        $news->save();


        return Redirect::to(action('NewsController@getView', array($news->id)));
    }

    public function getView($newsId) {
        $news_all = News::find($newsId);

        // get PREVIOUS news id
        $previous_news = News::where('id', '<', $newsId)->max('id');

        // get NEXT news id
        $next_news = News::where('id', '>', $newsId)->min('id');

//        echo '<pre>';
//        die(var_dump($previous));
//        echo '</pre>';

        // Если такой записи нет, то вернем пользователю ошибку 404 - Не найдено
        if (!$news_all) {
            App::abort(404);
        }

        return View::make('news/view', array('news' => $news_all,
            'previous' => $previous_news,
            'next' => $next_news));
    }


}
