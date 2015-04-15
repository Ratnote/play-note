<?php

Class UserController extends BaseController {


	public function __construct(){
    parent::__construct();

}

/*
| POST
*/

	public function postAccountRegister() {



		$validator = Validator::make(Input::all(), array(
			'username' 	=> 'required|unique:users|min:4|max:20',
			'email' 	=> 'required|unique:users|email',
			'password'	=> 'required|min:6|max:30',
			'password-again' => 'required|same:password'));

		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::route('account-register-get')->with('global', 'Your account has been successfully created. You can log in now.');
		}	else {
			return Redirect::route('account-register-get')->withErrors($validator)->withInput();
		}

	}

	public function postAccountLogIn() {

		$validator = Validator::make(Input::all(), array(
			'username' => 'required',
			'password' => 'required'));

	if ($validator->passes()) {

		$remember = (Input::has('remember')) ? true:false;

		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'));

			if (Auth::attempt($userdata,$remember)) {
				return Redirect::intended('/');
			}	else {
				return Redirect::route('account-login-get')->withinput()->with('global', 'Invalid username or password');
			}

		} else {
			return Redirect::route('account-login-get')->withErrors($validator)->withInput();
		}

	}

	public function postPlaylistUpload() {

	$destinationPath = '';
    $filename        = '';

    if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $destinationPath = public_path().'/img/';
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
    }

		$validator = Validator::make(Input::all(), array(
			'playlist-name' => 'required|min:6|max:20',
			'URL' => 'required|Url',
			'type' => 'required',
			'body' => 'required',
			'tag1' => 'required|min:3|max:8',
			'tag2' => 'required|min:3|max:8',
			'tag3' => 'required|min:3|max:8',
			));

		$url = substr(Input::get('URL'), strpos(Input::get('URL'), "=") + 1);

		$slug = str_random(32);
		$current_user = Auth::user()->id;

		if($validator->passes()) {
			$playlist_data = array(
				'title' => Input::get('playlist-name'),
				'body' => Input::get('body'),
				'type' => Input::get('type'),
				'url' => $url,
				'tag1' => Input::get('tag1'),
				'tag2' => Input::get('tag2'),
				'tag3' => Input::get('tag3'),
				'img' =>  $filename,
				'slug' => $slug,
				'user_id' => $current_user,
				'approved' => 'Waiting'
				); 

			Post::create($playlist_data);



			return Redirect::route('playlist-upload-get')->with('global', 'Your playlist has been successfully uploaded. Now you must wait for approvement, it will take up to few hours. You can check status in your profile');
		} else {
			return Redirect::route('playlist-upload-get')->withErrors($validator)->withInput();
		}
	}

	public function postAddPlaylist () {
		$favorite = new Favorite;
		$favorite->user_id = Auth::user()->id;
		$favorite->post_id = Input::get('post_id');
		$favorite->save();
		return Redirect::back();
	}
	public function postDeletePlaylist ($slug){
		$post = Post::where('slug', '=', $slug)->first();
		$current_user = Auth::user()->id;
		DB::table('favorites')->where('user_id', '=', $current_user)->where('post_id', '=', $post->id)->delete();
		return Redirect::back();
	}
	public function postAddLike() {

		$current_user = Auth::user()->id;
			$new_like = New Like;
			$new_like->post_id = Input::get('post_id');
			$new_like->user_id = $current_user;
			$new_like->save();

			return Redirect::back();
	}

	public function postRemoveLike ($slug) {
		$post = Post::where('slug', '=', $slug)->first();
		$current_user = Auth::user()->id;
		DB::table('likes')->where('user_id', '=', $current_user)->where('post_id', '=', $post->id)->delete();
		return Redirect::back();
	}

	public function postRemoveFavoriteProfile () {
		$current_post_id = Input::get('id');
		$current_user = Auth::user()->id;

		DB::table('favorites')->where('user_id', '=', $current_user )->where('id', '=', $current_post_id)->delete();
		return  Redirect::back();
	}

/*
| GET
*/

	public function getAccountRegister() {
		return View::make('pages.account-register');
	}

	public function getAccountLogin() {
		return View::make('pages.account-login');
	}

	public function getAccountLogout() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getPlaylistUpload() {
		return View::make('pages.playlist-upload');
	}

	public function getUserProfile() {
		$admin = Post::where('draft', '=', 0)->where('approved', '=', 'Waiting')->orderBy('id', 'DESC')->get();
		$current_user = Auth::user()->id;
		$post = Post::where('user_id', '=', $current_user)->get();
		$favorite = Favorite::where('user_id', '=', $current_user)->get();
		return View::make('pages.user-profile')->with(array('posts' => $post, 'favorites' => $favorite, 'admins' => $admin));
	}


}