<?php

Class Post extends Eloquent {
    protected $fillable = array('title', 'slug', 'body', 'tag1', 'tag2', 'tag3', 'url', 'img', 'type', 'user_id','approved');

    public function user() {
        return $this->belongsTo('User');
    }
    public function comment() {
        return $this->hasMany('Comment');
    }
    public function favorite() {
    	return $this->hasMany('Favorite');
    }
    public function like() {
    	return $this->hasMany('Like');
    }

}