@extends('layouts.main')

@section('content')
	
		<div class = 'col-xs-8 no-padding'>
	<div class = 'col-xs-12 no-padding login-wrapper'>

		<div class = 'post-header'>{{ $post->title }}<div class = 'sub-title'> <span class="glyphicon glyphicon-user" style="color:#E3DFE8; font-size: 13px;"></span> &nbsp;{{ $post->user->username }} &nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-time" style="color:#E3DFE8; font-size: 13px;"></span> {{ $post->created_at->format('Y-m-d') }} </div></div>
		<div class = 'playlist-frame'><iframe width="760" height="450" src="https://www.youtube.com/embed/videoseries?list={{ $post->url }}" frameborder="0" allowfullscreen></iframe></div>
		@if (Auth::check())
		@if (is_null($favorites))
			<form action = '{{ URL::route('add-to-playlist') }}' class = 'post-buttons' method = "POST">
			<button type = 'submit' class="button add post-buttons" >Add to favorites</button>
			<input class="button add" name = 'post_id' type = 'hidden' value = '{{ $post->id }}'>
			{{ Form::token() }}
			</form>
		@else 
			<form action = '{{ URL::route('delete-from-playlist', $post->slug) }}' class = 'post-buttons' method = 'POST'>
			{{ Form::token() }}
			<button type = 'submit' class="button delete post-buttons" >Delete from favorites</button>
			{{ Form::token() }}
			</form>
		@endif			
		</form>
		@endif
		@if (Auth::check())
		@if (is_null($user_likes))
		<form  action = '{{ URL::route('add-like') }}' class = 'post-buttons' method = 'POST' id = 'push_button'>
		<input class="button add post-buttons post-buttons" name = 'post_id' type = 'hidden' value = '{{ $post->id }}' id = 'post_id'>
		<button type = 'submit' class="button like " >Like</button>
		{{ Form::token() }}
		</form>
		@else
		<form action = '{{ URL::route('remove-like', $post->slug) }}' class = 'post-buttons' method = 'POST'>
		<input class="button add post-buttons" name = 'post_id' type = 'hidden' value = '{{ $post->id }}'>
		<button type = 'submit' class="button like" >Disslike</button>
		{{ Form::token() }}
		</form>
		@endif
		@endif
		<div class = 'post-buttons ammount'>Likes:&nbsp; <span>{{ $likes->count()}}</span></div>
	</div>
	<div class = 'col-xs-12 description-wrapper'>
	<div style = 'text-align:center;' class = 'post-body'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $post->body }}</div>
	</div>


	<div class = 'col-xs-12 description-wrapper-comment'>
		<div class = 'post-body'>
			@if (!$comments->count())
				There is no comments yet :(
				@else 
					@foreach ($comments as $comment)
					<div class = 'comments'>
							<div class = 'user-comment'><span class="glyphicon glyphicon-user user" style="color:grey; font-size: 25px;"></span>
						<strong>{{ $comment->user->username }}</strong> : {{ $comment->content }}</div>
						<br>
					</div>
					@endforeach
					@endif
					@if (Auth::check())
					<form class = 'comment-form' method = "POST" action = '{{URL::route('comment-post')}}'>
				<input type = 'text' name = 'content' class = 'post-comment-input' placeholder = 'Leave a message..'>
				<button type = 'submit' class = 'btn btn-danger'><span class="glyphicon glyphicon-arrow-right" style="color:white; font-size: 20px;"></span></button>
				<input type = 'hidden' name = 'post_id' value = '{{ $post->slug }}'>
				{{ Form::token() }}
			</form>
					@else
					<div class = 'post-body warning'>Please log in to leave a message!</div>
					@endif
		</div>
	</div>

</div>
@stop