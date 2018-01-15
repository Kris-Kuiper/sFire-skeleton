<?php
namespace App\Controllers;

use sFire\MVC\Controller;
use sFire\HTTP\Response;
use sFire\MVC\ViewModel;

class Controller403 extends Controller {

	public function actionIndex() {
		
		Response :: setStatus(403);

		new ViewModel('error.403');
	}
}
?>