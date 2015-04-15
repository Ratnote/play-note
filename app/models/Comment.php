<?php

Class Comment extends Eloquent {
	protected $fillable = array('post_id', 'content', 'user_id');

	public function postComment() {
		return $this->belongsTo('Post');
	}
	public function user() {
		return $this->belongsTo('User');
	}
}