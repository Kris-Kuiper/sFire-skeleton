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
use sFire\MVC\ViewModel;

class ControllerHome extends Controller {

	public function actionIndex() {
		new ViewModel('home.index');
	}
}
?>