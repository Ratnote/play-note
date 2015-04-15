<?php

class HomeController extends BaseController {

public function __construct(){
    parent::__construct();

}

	public function getHome()
	{
		$posts = Post::where('draft', '=', 0)->where('approved', '=', 'Yes')->orderBy('id', 'desc')->get();
		return View::make('pages.home')->with('posts', $posts);
	}
	public function getDope()
	{
		$posts = Post::where('type', '=', 'Dope')->where('approved', '=', 'Yes')->orderBy('id', 'desc')->get();
		return View::make('pages.dope')->with('posts', $posts);
	}
		public function getFriday()
	{
		$posts = Post::where('type', '=', 'Friday Night')->where('approved', '=', 'Yes')->orderBy('id', 'desc')->get();
		return View::make('pages.friday')->with('posts', $posts);
	}
		public function getDepression()
	{
		$posts = Post::where('type', '=', 'Depression')->where('approved', '=', 'Yes')->orderBy('id', 'desc')->get();
		return View::make('pages.depression')->with('posts', $posts);
	}
		public function getSuit()
	{
		$posts = Post::where('type', '=', 'Suit n Tie')->where('approved', '=', 'Yes')->orderBy('id', 'desc')->get();
		return View::make('pages.suit')->with('posts', $posts);
	}
}
