
	<div class = 'container navbar-fixed-top nav-top'>
			<a href = '{{ URL::route('home') }}'><div class = 'hip-note navbar-left'>Play-Note</div></a>

	     <ul class="nav navbar-nav top-navigation">
        <li><a class = 'top-navigation-news' href="{{ URL::route('home') }}">HOME</a></li>
        <li><a class = 'top-navigation-music' href="{{ URL::route('friday') }}">Friday Night</a></li>
        <li><a class = 'top-navigation-interviews' href="{{ URL::route('dope') }}">Dope</a></li>
         <li><a class = 'top-navigation-depression' href="{{ URL::route('depression') }}" >Depression</a></li>
         <li><a class = 'top-navigation-suit' href="{{ URL::route('suit') }}" >Suit n Tie</a></li>
        </ul>

        @if(Auth::check())

        <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text hello">Hello, {{ Auth::user()->username}}!</p>
        <li><a class = 'top-navigation-upload' href="{{ URL::route('playlist-upload-get') }}" >Upload Playlist</a></li>
        <li><a class = 'top-navigation-profile' href="{{ URL::route('user-profile-get') }}" >My Profile</a></li>
        <li><a class = 'top-navigation-logout' href="{{ URL::route('account-logout-get') }}">Log out</a></li>
        </div>

        @else

	<ul class="nav navbar-nav navbar-right">
        <li><a class = 'top-navigation-login' href="{{ URL::route('account-login-get') }}" >LOGIN</a></li>
        <li><a class = 'top-navigation-register' href="{{ URL::route('account-register-get') }}">REGISTER</a></li>
        </div>
        @endif

<div class = 'space'></div>