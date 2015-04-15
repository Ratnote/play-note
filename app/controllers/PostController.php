<?php

Class PostController extends BaseController {

	public function __construct(){
    parent::__construct();

}

	public function showPost ($slug) {
		

		$post = Post::where('slug', '=', $slug)->first();
		if (Auth::check()) 
		{
			$current_user = Auth::user()->id;
			$favorites = Favorite::where('user_id', '=', $current_user)->where('post_id', '=', $post->id)->first();
			$user_likes = Like::where('user_id', '=', $current_user)->where('post_id', '=', $post->id)->first();
		}else {$favorites = NULL;
			   $user_likes = NULL;}
		$comment = Comment::where('post_id', '=', $slug)->get();
		$likes = Like::where('post_id', '=', $post->id )->get();
		return View::make('pages.show-post')->with(array('post'=> $post, 'comments' => $comment, 'favorites' => $favorites, 'likes' => $likes, 'user_likes' => $user_likes));

	}

	public function showUserPlaylists($user) {
		$post = User::where('username', '=', $user)->firstOrFail();

		return View::make('pages.user-playlists')->with('posts',$post);
	}

}