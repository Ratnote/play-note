<?php

Class CommentController extends BaseController {

	public function __construct()
	{
    parent::__construct();
	}

	public function postComment () {
		$validator = Validator::make(Input::all(), array('content' => 'required'));
		if ($validator->passes()) {
			$comment = New Comment;
		$comment->content = Input::get('content'); 
		$comment->post_id = Input::get('post_id');
		$comment->user_id = Auth::user()->id;
		$comment->save();
		return Redirect::back();
	} else {
		return Redirect::back();
	}
	}
}