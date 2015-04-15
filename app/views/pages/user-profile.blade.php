@extends('layouts.main')

@section ('content')

<div class = 'col-xs-8 no-padding login-wrapper'>

	<div class = 'form-header'>My profile<hr></div><br>
	@if ($posts->count())
			<div class = 'my-profile-playlists'>
					@if($posts->count())
						@foreach($posts as $post )
						@if ($post->approved == 'No')
								<a href = '{{ URL::route('show-post', $post->slug) }}'	><div  class = 'favorite-playlists'><span style = 'border:2px solid #F0E6EE;background-color:#D4839A; margin:5px;'> <span class="glyphicon glyphicon-minus" style="color:white; font-size: 25px;"></span>&nbsp;{{ $post->title }}</span></div></a><br><br>
									@elseif ($post->approved == 'Waiting')
								<a href = '{{ URL::route('show-post', $post->slug) }}'	>	<div  class = 'favorite-playlists'><span style = 'border:2px solid #F0E6EE;background-color:#83D0D4; margin:5px;'> <span class="glyphicon glyphicon-time" style="color:white; font-size: 25px;"></span>&nbsp;{{ $post->title }}</span></div></a><br><br>
									@elseif ($post->approved == 'Yes')
								<a href = '{{ URL::route('show-post', $post->slug) }}'	>	<div  class = 'favorite-playlists'><span style = 'border:2px solid #F0E6EE;background-color:#79FC93; margin:5px;'> <span class="glyphicon glyphicon-ok" style="color:white; font-size: 25px;"></span>&nbsp;{{ $post->title }}</span></div></a><br><br>
									@endif
						@endforeach
					@endif
					</table>
			</div>
			@else 
				<div class = 'playlists-error'>You have no playlists uploaded</div>
			@endif
			<div class = 'space'></div>
			<div class = 'form-header'>Favorites</div><br><br>
			@if ($favorites->count())
				@foreach ($favorites as $favorite)
				<form method = 'POST' action = '{{ URL::route('delete-favorite-profile-post') }}' class = 'post-buttons'>
						<div class = 'favorite-playlists'>
							<span>
								<div class = 'bundymas'>
									<a href = '{{ URL::action('show-post', $favorite->post->slug) }}'>{{ $favorite->post->title }}</a>
										<button class = 'remove-button' type = 'submit'>
											<span class="glyphicon glyphicon-remove" style="color:black; font-size: 25px;"></span>
										</button>
									<input type = 'hidden' value = '{{ $favorite->id }}' value = 'id' name = 'id'>
									</a>
								</div>
							</span>
						</div>
				{{ Form::token() }}
				</form>
				@endforeach
			@else
			<div class = 'playlists-error'>You have no favorite playlists </div>
			@endif

			<div class = 'space'></div>
	</div>
@stop