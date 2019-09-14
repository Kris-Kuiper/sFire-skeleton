<?php
/**
 * sFire Framework
 *
 * @link      https://sfire.nl
 * @copyright Copyright (c) 2014-2019 sFire Framework.
 * @license   https://sfire.nl/license BSD 3-CLAUSE LICENSE
 */
 
namespace App\Controllers;

use sFire\MVC\Controller;
use sFire\HTTP\Response;
use sFire\MVC\ViewModel;

class ControllerError extends Controller {


	/**
	 * 401 error page
	 */
	public function action401() {
		
		Response :: setStatus(401);
		new ViewModel('error.401');
	}


	/**
	 * 403 error page
	 */
	public function action403() {
		
		Response :: setStatus(403);
		new ViewModel('error.403');
	}


	/**
	 * 404 error page
	 */
	public function action404() {
		
		Response :: setStatus(404);
		new ViewModel('error.404');
	}
}
?>