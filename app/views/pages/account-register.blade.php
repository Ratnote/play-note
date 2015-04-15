@extends('layouts.main')

@section('content')

	<div class = 'col-xs-8 no-padding complete-field'>

		<div class = 'form-header'>Registration<hr></div>

		@if (Session::has('global'))
			{{ Session::get('global') }}
		@endif

		<form class = 'register-form' action = '{{ URL::route('account-register-post')}}' method = 'post'>

			<div class = 'form-label'>Username:</div>			
			@if ($errors->has('username'))
				<div class = 'error'>{{ $errors->first('username') }}</div>
			@endif
			<input class = 'form-input-group' name = 'username' type = 'text' {{ (Input::old('username')) ? 'value = "'.e(Input::old('username')).'"' : '' }}></br>
			<div class = 'form-label'>Email:</div>
			@if ($errors->has('email'))
				<div class = 'error'>{{ $errors->first('email') }}</div>
			@endif
			<input class = 'form-input-group' name = 'email' type = 'text' {{ (Input::old('email')) ? 'value = "'.e(Input::old('email')).'"' : '' }}></br>
			<div class = 'form-label'>Password:</div>
			@if ($errors->has('password'))
				<div class = 'error'>{{ $errors->first('password') }}</div>
			@endif
			<input class = 'form-input-group' name = 'password' type = 'password'></br>
			<div class = 'form-label'>Password again:</div>			
			@if ($errors->has('password-again'))
				<div class = 'error'>{{ $errors->first('password-again') }}</div>
			@endif
			<input class = 'form-input-group' name= 'password-again' type = 'password'></br>
			<button class = 'btn btn-danger buttons'>Register</button>
			{{ Form::token() }}
		</form>

		<div class = 'errors-block'>
		</div>

	</div>

@stop