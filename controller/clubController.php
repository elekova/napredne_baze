<?php

require_once __DIR__ . '/../model/service.class.php';

class ClubController
{
    function index()
    {
        $title = "Clubs!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id = $person['id_person'];
        $liked_clubs = $service->getLikedClubs($id);

        $all_clubs = $service->getAllClubs();
        $all_clubs_like = array();

        foreach($all_clubs as $b){
           $all_clubs_like[] = $service->doILikeClub( $id, $b->id_club);
        }

        require_once __DIR__ . '/../view/club_index.php';
    }

    function insert()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
		    if( isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['city'])
            && $_POST['city'] !== '' && isset($_POST['country']) && $_POST['country'] !== ''
            && isset($_POST['sport']) && $_POST['sport'] !== ''){
                $id_sporta = $service->getSportByType($_POST['sport']);
				$service->addClub($_POST['name'], $_POST['city'], $_POST['country'],  $id_sporta->id_sport);
			}

		}
        $title = 'Added successfully!';
		require_once __DIR__ . '/../view/uspjesno_dodano.php';

    }

    function like()
    {
        if( isset($_POST['like'])){
			$service= new Service();
            $id_club = $_POST['like'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

		    $service->likeClub( $id, $id_club);
		}
		$this->index();
    }

    function unlike()
    {
        if (isset($_POST['unlike'])) {
            $service = new Service();
            $id_club = $_POST['unlike'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

            $service->unlikeClub($id, $id_club);
        }
        $this->index();
    }
}


?>
