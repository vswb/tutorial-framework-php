<?php
	/**
	* Router
	*/
	class Router
	{
		private $routers = [];

		function __construct()
		{
			# code...
		}

		private function getRequestURL(){
			$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
			$url = str_replace('/www/my-framework/public', '', $url);
			$url = $url === '' || empty($url) ? '/' : $url;
			return $url;
		}

		private function getRequestMethod(){
			$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
			return $method;
		}

		private function addRouter($method,$url,$action){
			$this->routers[] = [$method,$url,$action];
		}

		public function get($url,$action){
			$this->addRouter('GET',$url,$action);
		}

		public function post($url,$action){
			$this->addRouter('POST',$url,$action);
		}

		public function any($url,$action){
			$this->addRouter('GET|POST',$url,$action);
		}

		public function map(){

			$requestURL = $this->getRequestURL();
			$requestMethod = $this->getRequestMethod();
			$routers = $this->routers;
			
			foreach( $routers as $route ){
				list($method,$url,$action) = $route;
				if( strpos($method, $requestMethod) !== FALSE ){
					if( strcmp(strtolower($url), strtolower($requestURL)) === 0 ){
						if( is_callable($action) ){
							$action();
							return;
						}
					}else{
						continue;
					}
				}else{
					continue;
				}
			}
			return;
		}

		function run(){
			$this->map();
		}
	}
?>