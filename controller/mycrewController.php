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

	function update()
	{
		if( isset($_SESSION['username'])){
			$service= new Service();
			if( isset($_POST['name']) && $_POST['name'] !== ''){
				$service->updateName($_SESSION['username'], $_POST['name']);
			}
			if( isset($_POST['surname']) && $_POST['surname'] !== ''){
				//poziv funkcije 
			}
			if( isset($_POST['email']) && $_POST['email'] !== ''){
				//poziv funkcije 
			}
			if( isset($_POST['date']) && $_POST['date'] !== ''){
				$service->updateDate($_SESSION['username'], $_POST['date']);
			}
			if( isset($_POST['city'])){
				//poziv funkcije
			}
			if( isset($_POST['region'])){
				//poziv funkcije 
			}
		}

		$this->index();
	}

};
?>
