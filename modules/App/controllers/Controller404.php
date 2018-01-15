<?php
namespace App\Controllers;

use sFire\MVC\Controller;
use sFire\HTTP\Response;
use sFire\MVC\ViewModel;

class Controller404 extends Controller {

	public function actionIndex() {
		
		Response :: setStatus(404);

		new ViewModel('error.404');
	}
}
?>