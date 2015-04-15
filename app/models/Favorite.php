<?php

Class Favorite extends Eloquent {
	protected $fillable = ['user_id', 'post_id'];

	public function user () {
		return $this->belongsTo('User');
	}
	public function post () {
		return $this->belongsTo('Post');
	} 
}