<?php

require_once __DIR__ . '/../model/service.class.php';

class SportController
{
    function index()
    {
        $title = "Sports!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id = $person['id_person'];
        $liked_sports = $service->getLikedSports($id);

        $all_sports = $service->getAllSports();
         $all_sports_like = array();

        foreach($all_sports as $b){
           $all_sports_like[] = $service->doILikeSport( $id, $b->id_sport);
        }

        require_once __DIR__ . '/../view/sport_index.php';
    }

    function insert()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
		    if( isset($_POST['type']) && $_POST['type'] !== ''){
				$service->addSport($_POST['type']);
			}

		}
        $title = 'Added successfully!';
		require_once __DIR__ . '/../view/uspjesno_dodano.php';

    }

    function like()
    {
        if( isset($_POST['like'])){
			$service= new Service();
            $id_sport = $_POST['like'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

		    $service->likeSport( $id, $id_sport);
		}
		$this->index();
    }

    function unlike()
    {
        if (isset($_POST['unlike'])) {
            $service = new Service();
            $id_sport = $_POST['unlike'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

            $service->unlikeSport($id, $id_sport);
        }
        $this->index();
    }
}


?>
