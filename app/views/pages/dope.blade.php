@extends ('layouts.main')

@section ('content')
	<div class = 'col-xs-9 no-padding'>
		@if($posts->count())

			@foreach($posts as $post )
<div class = 'col-xs-5 small-post onhover'>
				<a href = '{{ URL::action('show-post', $post->slug) }}'><div class = 'playlist-name'>{{ $post->title }}</div></a>
			<img class = 'post-image' src = 'img/{{ $post->img }}'>	
		 	<span class="text-content"><span>
		 		<div class="glyphicon glyphicon-user" style="color:white; font-size: 15px;"></div>
		 		 {{ $post->user->username }} on {{ $post->created_at->format('Y-m-d') }}
		 		<br>
		 		<br>
		 		Type: {{ $post->type }}
		 		<br>
		 		<br>
		 		<div style = 'font-size:13px;' class = 'post-body-new'>{{Markdown::parse(Str::limit($post->body, 40)) }}<br><br>
		 		<div class = 'tag'>#{{ $post->tag1 }}</div>
		 		<div class = 'tag'>#{{ $post->tag2 }}</div>
		 		<div class = 'tag'>#{{ $post->tag3 }}</div>
		 		</div>
		 	</span></span>
		</div>
			@endforeach
		@endif

	</div>
@stop