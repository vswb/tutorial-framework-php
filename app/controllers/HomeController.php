<?php
	namespace app\controllers;

	/**
	* HomeController
	*/
	class HomeController
	{
		
		function __construct()
		{
			// echo 'Home Controller';
		}

		public function index($list,$page){
			echo $list.'<br/>';
			echo $page.'<br/>';
			echo 'home index';
		}
	}
?>