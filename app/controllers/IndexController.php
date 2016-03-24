<?php

class IndexController extends BaseController {

    public function getIndex($page = 1) {
        if ((int)$page != $page || $page < 1) {
            $page = 1;
        }
        $per_page = 12;
        $skip = ((int)$page - 1) * (int)$per_page;

        $posts = Post::with('author')->orderBy('created_at', 'DESC')->skip($skip)->take($per_page)->get();
        $counter = Post::count();

        $pages = intval($counter / $per_page) + 1;

        $news_all = News::with('author')->orderBy('created_at', 'DESC')->take(2)->get();


        return View::make('index', array(
            'posts'  => $posts,
            'counter'  => $counter,
            'pages' => $pages,
            'news_all'  => $news_all,
        ));

}
}