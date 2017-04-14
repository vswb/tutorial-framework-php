<?php
	require_once(dirname(__FILE__).'/Router.php');
	/**
	* App
	*/
	class App
	{
		private $router;

		function __construct()
		{
			$this->router = new Router;
			
			$this->router->any('/',function(){
				echo 'Day la trang home';
			});

			$this->router->post('/user',function(){
				echo 'Day la trang user';
			});

			$this->router->get('/news',function(){
				echo 'Day la trang news';
			});

			$this->router->any('/product',function(){
				echo 'Day la trang product';
			});
		}

		public function run(){
			$this->router->run();
		}
	}
?>