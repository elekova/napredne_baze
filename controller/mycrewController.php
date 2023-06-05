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

		$service= new Service();
		$person = $service->getPersonByName($_SESSION['username']);

		require_once __DIR__ . '/../view/mycrew_index.php';
	}

	function getData()
	{

	}

};
?>
