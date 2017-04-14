<?php
	class Autoload{
		function __construct(){
			$rootPath = dirname(dirname(dirname(__FILE__)));
			spl_autoload_register([$this,'autoload']);
			require_once($rootPath.'\app\Router.php');
		}

		function autoload($class){
			$rootPath = dirname(dirname(dirname(__FILE__)));
			$fileName = end(explode('\\', $class));
			$filePath = $rootPath.'\\'.strtolower(str_replace($fileName, '', $class)).$fileName.'.php';
			if( file_exists($filePath) )
				require_once($filePath);
			else
				die("$class does not exsits");
		}
	}
?>