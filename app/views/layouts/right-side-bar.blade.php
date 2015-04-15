<div class = 'col-xs-3 pull-right no-padding'>

		<div class = 'col-xs-12 recent-posts'>
			<div class = 'recent-posts-topic'>Recent playlists</div>
			@foreach ($query as $post)
				
					<div class = 'recent-post-elem'><a href = '{{ URL::action('show-post', $post->slug) }}'>{{ $post->title  }} </a><div class = 'timestamp'>{{ $post->created_at->diffForHumans() }}</div></div><br>
				
			@endforeach
		</div>
	</div>
	
</div>