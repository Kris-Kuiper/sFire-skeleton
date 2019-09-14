<?php
/**
 * sFire Framework
 *
 * @link      https://sfire.nl
 * @copyright Copyright (c) 2014-2019 sFire Framework.
 * @license   https://sfire.nl/license BSD 3-CLAUSE LICENSE
 */

use sFire\Routing\Router;


#Group routes
Router :: module('App') -> group(function($route) {

	#Add default error pages
	$route -> controller('Error') -> group(function($route) {

		$route -> error(401, 'error.401') -> action('401');
		$route -> error(403, 'error.403') -> action('403');
		$route -> error(404, 'error.404') -> action('404');
	});

	#Home
	$route -> get('', 'home.index') -> controller('Home') -> action('index');
});
?>