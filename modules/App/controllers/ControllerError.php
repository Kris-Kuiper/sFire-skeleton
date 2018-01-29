<?php
namespace App\Controllers;

use sFire\MVC\Controller;
use sFire\HTTP\Response;
use sFire\MVC\ViewModel;

class ControllerError extends Controller {


	/**
	 * 404 error page
	 */
	public function action404() {
		
		Response :: setStatus(404);
		new ViewModel('error.404');
	}


	/**
	 * 403 error page
	 */
	public function action403() {
		
		Response :: setStatus(403);
		new ViewModel('error.403');
	}
}
?>