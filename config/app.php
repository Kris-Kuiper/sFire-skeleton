<?php
/**
 * sFire Framework
 *
 * @link      https://sfire.nl
 * @copyright Copyright (c) 2014-2018 sFire Framework.
 * @license   https://sfire.nl/license BSD 3-CLAUSE LICENSE
 */
 
use sFire\Application\Application;
use sFire\Session\Session;


//Salt
Application :: add('salt', null);


//Set encoding
Application :: add('encoding', 'utf-8');


//Load modules
Application :: add('modules', ['App']);


//Autoloading PSR-4 classes
Application :: add('psr4', []);


//Autoloading PSR-0 classes
Application :: add('psr0', []);


//Determine file extensions
Application :: add('extensions', [
	
	'translation' 	=> '.lg',
	'view' 			=> '.tpl',
	'cache'			=> '.ch'
]);


//Determine prefixes
Application :: add('prefix', [
	
	'controller' 	=> 'Controller',
	'helper' 		=> 'Helper',
	'model' 		=> 'Model',
	'entity' 		=> 'Entity',
	'validator' 	=> 'Validator',
	'mapper' 		=> 'Mapper',
	'dbtable' 		=> 'DBTable',
	'schedule' 		=> 'Schedule',
	'action'		=> 'action'
]);


//Determine module directories
Application :: add('directory', [

	'config' 		=> 'config' 		. DIRECTORY_SEPARATOR,
	'controller' 	=> 'controllers' 	. DIRECTORY_SEPARATOR,
	'model'		 	=> 'models' 		. DIRECTORY_SEPARATOR,
	'entity'	 	=> 'models' 		. DIRECTORY_SEPARATOR . 'entity' . DIRECTORY_SEPARATOR,
	'mapper'	 	=> 'models' 		. DIRECTORY_SEPARATOR . 'mapper' . DIRECTORY_SEPARATOR,
	'dbtable'	 	=> 'models' 		. DIRECTORY_SEPARATOR . 'dbtable' . DIRECTORY_SEPARATOR,
	'helper' 		=> 'helpers' 		. DIRECTORY_SEPARATOR,
	'translation' 	=> 'translations' 	. DIRECTORY_SEPARATOR,
	'validator' 	=> 'validators' 	. DIRECTORY_SEPARATOR,
	'view' 			=> 'views' 			. DIRECTORY_SEPARATOR
]);


//Debug options
Application :: add('debug', [
	
	'display' 	=> [

		//Whenever to show the error on screen
		'enabled' 	=> true,

		//An array with IP addresses to white list to show the error
		'ip'		=> []
	],

	'write' 	=> [
		
		//Whenever to enable or disable to log the error to file
		'enabled' 	=> true,

		//Log rotating in hour, day, week, month or year
		'rotate'	=> 'day' 
	]
]);


//Cache options
Application :: add('cache', [

	//Probability sweep through cache folder deleting old/expired files.
	'probability' => 5
]);


//Token options
Application :: add('token', [

	//Amount of saved tokens per session
	'amount' => 25
]);


//Service providers
Application :: add('services', [
	
	'session' => function() {

		$session = new Session();
		$session -> setDriver('Plain');

		return $session;
	}
]);
?>