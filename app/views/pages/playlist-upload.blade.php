@extends('layouts.main')

@section('content')

	<div class = 'col-xs-8 no-padding upload-playlist-wrapper'>

		<div class = 'form-header'>Upload Playlist<hr></div>

		@if (Session::has('global'))
			<div class = 'succ-upload'>{{ Session::get('global') }}</div><br>
		@endif

		<form accept-charset="UTF-8" enctype="multipart/form-data" class = 'register-form' action = '{{ URL::route('playlist-upload-post')}}' method = 'post'>

			<div class = 'form-label'>Playlist name:</div>			
			@if ($errors->has('playlist-name'))
				<div class = 'error'>{{ $errors->first('playlist-name') }}</div>
			@endif
			<input class = 'form-input-group' name = 'playlist-name' type = 'text' {{ (Input::old('playlist-name')) ? 'value = "'.e(Input::old('playlist-name')).'"' : '' }}></br>
			<div class = 'form-label'>Playlist URL</div>
			@if ($errors->has('URL'))
				<div class = 'error'>{{ $errors->first('URL') }}</div>
			@endif
			<input class = 'form-input-group' name = 'URL' type = 'text' {{ (Input::old('URL')) ? 'value = "'.e(Input::old('URL')).'"' : '' }}></br>
			<div class = 'form-label'>Type:</div>
			@if ($errors->has('type'))
				<div class = 'error'>{{ $errors->first('type') }}</div>
			@endif
			<select class = 'form-input-group' name = 'type'>
				  <option value="Friday Night">Friday Night</option>
				  <option value="Dope">Dope</option>
				  <option value="Depression">Depression</option>
				  <option value="Suit n Tie">Suit n Tie</option>
			</select><br>
			<div class = 'form-label'>Select image for playlist:</div>
   			<input class = 'image-upload' type="file" name="image" id="fileToUpload">
			<div class = 'form-label'>Description:</div>
			@if ($errors->has('body'))
				<div class = 'error'>{{ $errors->first('body') }}</div>
			@endif
			<textarea style="width: 300px; height: 150px" class = 'form-input-group' name = 'body' type = 'text' {{ (Input::old('body')) ? 'value = "'.e(Input::old('body')).'"' : '' }}></textarea></br>
			<div class = 'form-label'>#Tag1</div>			
			@if ($errors->has('tag1'))
				<div class = 'error'>{{ $errors->first('tag1') }}</div>
			@endif
			<input class = 'form-input-group' name= 'tag1' type = 'text' {{ (Input::old('tag1')) ? 'value = "'.e(Input::old('tag1')).'"' : '' }}></br>
			<div class = 'form-label'>#Tag2</div>			
			@if ($errors->has('tag2'))
				<div class = 'error'>{{ $errors->first('tag2') }}</div>
			@endif
			<input class = 'form-input-group' name= 'tag2' type = 'text' {{ (Input::old('tag2')) ? 'value = "'.e(Input::old('tag2')).'"' : '' }}></br>
			<div class = 'form-label'>#Tag3</div>			
			@if ($errors->has('tag3'))
				<div class = 'error'>{{ $errors->first('tag3') }}</div>
			@endif
			<input class = 'form-input-group' name= 'tag3' type = 'text' {{ (Input::old('tag3')) ? 'value = "'.e(Input::old('tag3')).'"' : '' }}></br>
			<button class = 'btn btn-danger buttons submit-button'>Upload Playlist</button>




			{{ Form::token() }}
		</form>
	</div>

@stop