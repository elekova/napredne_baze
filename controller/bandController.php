<?php

require_once __DIR__ . '/../model/service.class.php';

class BandController
{
    function index()
    {
        $title = "Bands!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id = $person['id_person'];
        $liked_bands = $service->getLikedbands($id);

        $all_bands = $service->getAllBands();
         $all_bands_like = array();

        foreach($all_bands as $b){
           $all_bands_like[] = $service->doILikeBand( $id, $b->id_band);
        }

        require_once __DIR__ . '/../view/band_index.php';
    }

    function insert()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
		    if( isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['country'])
            && $_POST['country'] !== ''
            && isset($_POST['genre']) && $_POST['genre'] !== ''){
				$service->addBand($_POST['name'], $_POST['country'],  $_POST['genre']);
			}

		}
        $title = 'Added successfully!';
		require_once __DIR__ . '/../view/uspjesno_dodano.php';

    }

    function like()
    {
        if( isset($_POST['like'])){
			$service= new Service();
            $id_band = $_POST['like'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

		    $service->likeBand( $id, $id_band);
		}
		$this->index();
    }

    function unlike()
    {
        if (isset($_POST['unlike'])) {
            $service = new Service();
            $id_band = $_POST['unlike'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

            $service->unlikeBand($id, $id_band);
        }
        $this->index();
    }
}


?>
