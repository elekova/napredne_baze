<?php

require_once __DIR__ . '/../model/service.class.php';

class MycrewController
{
	//radi!!!
	public function index()
	{
		if(!isset($_SESSION['username'])){
			header( 'Location: index.php?rt=login' );
		}
		$title = "Welcome to MY CREW!";


		require_once __DIR__ . '/../view/mycrew_index.php';
	}
};
?>
