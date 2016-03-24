<?php

class PortfolioController extends BaseController {

    public function getPortfolio($page = 1) {
        if ((int)$page != $page || $page < 1) {
            $page = 1;
        }
        $per_page = 2048;
        $skip = ((int)$page - 1) * (int)$per_page;

        $posts = Post::with('author')->orderBy('created_at', 'DESC')->skip($skip)->take($per_page)->get();
        $counter = Post::count();

        $pages = intval($counter / $per_page) + 1;

        return View::make('portfolio', array(
            'posts'  => $posts,
            'counter'  => $counter,
            'pages' => $pages,
        ));

    }
}