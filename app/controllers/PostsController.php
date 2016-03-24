<?php
 
class PostsController extends BaseController {
	public function getAdd() {
		return View::make('posts/add');
	}

    public function postAdd() {
        $data = Input::all();

        $validation = Validator::make($data, Post::getValidationRules());
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        if (Auth::check() || Auth::user()->isAdmin()) {
            $data['user_id'] = Auth::user()->id;
        }

        if(Input::hasFile('photo')){
            $file = Input::file('photo');
            $fileName = str_random(6).'.'.$file->getClientOriginalExtension();
            $thumbName = 'thumbs/'.$fileName;
            $image = Image::make($file->getRealPath())->fit(300, 240)->save('uploads/'.$thumbName);
            $originalImage = Image::make($file->getRealPath())->fit(840, 680)->save('uploads/'.$fileName);
        }

        $post = new Post();
        $post->group = Input::get('group');
        $post->name = Input::get('name');
        $post->post_prev_text = Input::get('post_prev_text');
        $post->thumbnail = $thumbName;
        $post->photo = $fileName;
        $post->description = Input::get('description');
        $post->user_id = Auth::user()->id;
        $post->save();


        return Redirect::to(action('PostsController@getView', array($post->id)));
    }


    public function getView($postId) {
        $posts = Post::find($postId);

        $comments = DB::table('comments')
                        ->select('comments.title','comments.created_at','comments.comment','users.username')
                        ->join('users','users.id','=','user_id')
                        ->where('post_id','=',$postId)
                        ->get();

        $anyvar = array();
		$anyvar['comments'] = array();
        $anyvar['posts_date'] = $posts->posts_date;
        $anyvar['post_id'] = $postId;
        $anyvar['name'] = $posts->name;
        $anyvar['group'] = $posts->group;
        $anyvar['description'] = $posts->description;
        $anyvar['views'] = $posts->views;
        $anyvar['photo'] = URL::to("/uploads/" . $posts->photo);

        if(!empty($comments)){
        	foreach ($comments as  $comment) {
		        $current_comment = array(
		            'name' => $comment->username,
		            'title' => $comment->title,
		            'comment' => $comment->comment,
		            'date' => $comment->created_at,
		        );
		        $anyvar['comments'][] = $current_comment;
	        }
        }

        $comments_counter = DB::table('comments')->where('post_id', '=', $postId)->count();

        // Увеличим счетчик просмотров записи
        $posts->views++;
        $posts->save();

        // get PREVIOUS post id
        $previous = Post::where('id', '<', $postId)->max('id');

        // get NEXT post id
        $next = Post::where('id', '>', $postId)->min('id');

//        echo '<pre>';
//        die(var_dump($previous));
//        echo '</pre>';

        // Если такой записи нет, то вернем пользователю ошибку 404 - Не найдено
        if (!$posts) {
            App::abort(404);
        }

        return View::make('posts/view', array('post' => $anyvar,
            'previous' => $previous,
            'next' => $next,
            'comments_counter' => $comments_counter));
    }

}