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
			
			$this->router->any('/{id}',function(){
				echo 'Day la trang home';
			});

			$this->router->post('/user',function(){
				echo 'Day la trang user';
			});

			$this->router->get('/news/{category}/{page}',function($cat,$page){
				echo 'cat: '.$cat.'<br/>';
				echo 'page: '.$page.'<br/>';
			});

			$this->router->any('/product',function(){
				echo 'Day la trang product';
			});

			$this->router->any('*',function(){
				echo '404 notfound';
			});
		}

		public function run(){
			$this->router->run();
		}
	}
?>