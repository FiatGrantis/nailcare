<?php

class NewsPageController extends BaseController {


    public function getNews($page = 1) {
        if ((int)$page != $page || $page < 1) {
            $page = 1;
        }
        $per_page = 6;
        $skip = ((int)$page - 1) * (int)$per_page;

        $news_all = News::with('author')->orderBy('created_at', 'DESC')->skip($skip)->take($per_page)->get();
        $counter = News::count();

        $pages = intval($counter / $per_page) + 1;



        return View::make('news/all', array(
            'news_all'  => $news_all,
            'counter'  => $counter,
            'pages' => $pages,
        ));

    }
}