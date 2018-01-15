<?php
/**
 * sFire Framework
 *
 * @link      http://github.com/Kris-Kuiper/sFire-Framework
 * @copyright Copyright (c) 2014-2018 sFire Framework. (https://www.sfire.nl)
 * @license   http://sfire.nl/license GNU AFFERO GENERAL PUBLIC LICENSE
 */

use sFire\Autoloader;
use sFire\Application\Application;
use sFire\Config\Path;
use sFire\Config\Config;
use sFire\Config\Files;
use sFire\Router\Router;
use sFire\Handler\ErrorHandler;
use sFire\Cookie\Cookie;
use sFire\MVC\ViewContainer;

class Bootstrap {


	/**
	 * @var mixed $autoloader
	 */
	private $autoloader;


	/**
	 * Constructor
	 * @param boolean $routing
	 */
	public function __construct($routing = true) {

		$this -> loadAutoloader();
		$this -> loadConfig();
		$this -> loadClasses();
		$this -> loadModules();
		$this -> loadPsr4();
		$this -> loadPsr0();
		$this -> loadHandlers();
		$this -> loadRouter();

		$routing && Router :: execute();
	}


	/**
	 * Register autoloader
	 */
	private function loadAutoloader() {

		$vendor 	= dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR;
		$autoload   = $vendor . 'autoload.php';
		$framework 	= $vendor . 'sfire' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR;
		
		//Composer autoloader
		if(true === file_exists($autoload)) {
			$this -> autoloader = require_once($autoload);
		}
		else {

			//sFire autoloader
			$autoload  = $framework . 'autoload.php';
			$this -> autoloader = require_once($autoload);
		}

		if(null !== $this -> autoloader) {

			$this -> autoloader -> addPsr4('sFire\\', $framework . 'src');
			$this -> autoloader -> register();
		}
	}


	/**
	 * Load application config
	 */
	private function loadConfig() {
		require(dirname((__FILE__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'app.php');
	}


	/**
	 * Load required classes
	 */
	private function loadClasses() {

		new Path();
		new Config();
		new Files();
		new Cookie();
	}


	/**
	 * Load and sets module config settings
	 */
	private function loadModules() {

		foreach(Application :: get('modules', []) as $key => $module) {
				
			$dir 	= Path :: get('modules') . $module;
			$config = $dir . DIRECTORY_SEPARATOR . Files :: get('module-config');
			
			if(true === file_exists($config)) {
				Config :: add($module, require_once($config));
			}

			$this -> autoloader -> addPsr4($module . '\\', $dir);
		}
	}


	/**
	 * Load PSR-4 autoloaders from Application settings
	 */
	private function loadPsr4() {

		foreach(Application :: get('psr4', []) as $prefix => $dir) {
				
			if(true === $this -> autoloader instanceof Composer\Autoload\ClassLoader) {
				$this -> autoloader -> addPsr4($prefix . '\\', $dir);
			}
			else {

				$vendor = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR;
			    $this -> autoloader -> addPsr4($prefix, $vendor . $dir);
		    }
		}
	}

	/**
	 * Load PSR-0 autoloaders from Application settings
	 */
	private function loadPsr0() {

		foreach(Application :: get('psr0', []) as $namespace => $dir) {

			$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR;
			$this -> autoloader -> add($namespace, $dir);
		}
	}


	/**
	 * Load error and exeption handler
	 */
	private function loadHandlers() {
		
		$errorhandler = new ErrorHandler();

		$errorhandler -> setOptions([

			'write' 	=> Application :: get(['debug', 'write', 'enabled'], false), 
			'display' 	=> Application :: get(['debug', 'display', 'enabled'], false), 
			'ip' 		=> Application :: get(['debug', 'display', 'ip'], []), 
			'mode' 		=> Application :: get('mode', ErrorHandler :: DEVELOPMENT),
			'directory'	=> Path :: get('log-error', DIRECTORY_SEPARATOR)
		]);
	}


	/**
	 * Load router for url matching
	 */
	private function loadRouter() {

		Router :: Instance();

		//Check if routes file exists
		if(true === file_exists(Files :: get('routes'))) {
			require_once(Files :: get('routes'));
		}
	}


	/**
	 * Destructor
	 */
	public function __destruct() {
		
		foreach(ViewContainer :: getViews() as $viewmodel) {
			ViewContainer :: output($viewmodel);
		}
	}
}
?>