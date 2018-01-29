<?php
use sFire\Routing\Router;

Router :: module('App') -> group(function($route) {

	#Error documents
	$route -> viewable(false) -> controller('Error') -> group(function($route) {

		$route -> any('403', '403') -> action('403');
		$route -> any('404', '404') -> action('404');
	});

	#Home
	$route -> get('', 'home.index') -> controller('Home') -> action('index');
});
?>