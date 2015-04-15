<?php 

Class Like extends Eloquent {
	protected $fillable = ['user_id', 'post_id','value'];

	public function post () {
		return $this->hasMany('Post');
	}
}