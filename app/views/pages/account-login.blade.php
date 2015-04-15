@extends('layouts.main')

@section('content')

	<div class = 'col-xs-8 no-padding login-wrapper'>

	<div class = 'form-header'>Log In<hr></div>
	@if (Session::has('global'))
		<div class = 'login-errors'>{{ Session::get('global') }}</div>
	@endif
		<form class = 'register-form' action = '{{ URL::route('account-login-post') }}' method = 'post'>
			<div class = 'form-label'>Username:</div>			
			@if ($errors->has('username'))
				<div class = 'error'>{{ $errors->first('username') }}</div>
			@endif
			<input class = 'form-input-group' name = 'username' type = 'text' {{ (Input::old('username')) ? 'value = "'.e(Input::old('username')).'"' : '' }}></br>
			<div class = 'form-label'>Password:</div>
			@if ($errors->has('password'))
				<div class = 'error'>{{ $errors->first('password') }}</div>
			@endif
			<input class = 'form-input-group' name = 'password' type = 'password'></br>
			<input type = 'checkbox' id = 'checkbox' name = 'remember'><label class = 'checkbox-label' for = 'checkbox'>Remember me?</label><br>
			<button class = 'btn btn-danger buttons'>Log In</button>
			{{ Form::token() }}
		</form>
	</div>

@stop