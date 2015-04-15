<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function __construct()
	{
        $query = Post::where('draft', '=', 0)->orderBy('id', 'DESC')->get();

        View::share(array('query'=> $query/*, 'summ'=> $summ ,'max' => $first, 'min' => $second, 'third' => $count*/));
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
