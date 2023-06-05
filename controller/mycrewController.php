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
		$person = $service->getPersonByUsername($_SESSION['username']);

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
				$service->updateSurname($_SESSION['username'], $_POST['surname']);
			}
			if( isset($_POST['email']) && $_POST['email'] !== ''){
				$service->updateEmail($_SESSION['username'], $_POST['email']);
			}
			if( isset($_POST['date']) && $_POST['date'] !== ''){
				$service->updateDate($_SESSION['username'], $_POST['date']);
			}
			if( isset($_POST['city']) && $_POST['city'] !== ''){
				$service->updateCity($_SESSION['username'], $_POST['city']);
			}
			if( isset($_POST['region']) && $_POST['region'] !== ''){
				$service->updateRegion($_SESSION['username'], $_POST['region']);
			}
		}
		$this->index();
	}

};
?>
