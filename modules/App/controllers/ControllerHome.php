<?php
namespace App\Controllers;

use sFire\MVC\Controller;
use sFire\MVC\ViewModel;

class ControllerHome extends Controller {

	public function actionIndex() {
		new ViewModel('home.index');
	}
}
?>