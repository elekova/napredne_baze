<?php

require_once __DIR__ . '/../model/service.class.php';

class MovieController
{
    function index()
    {
        $title = "Movies!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id = $person['id_person'];
        $liked_movies = $service->getLikedMovies($id);

        $all_movies = $service->getAllMovies();
         $all_movies_like = array();

        foreach($all_movies as $b){
           $all_movies_like[] = $service->doILikeMovie( $id, $b->id_movie);
        }

        require_once __DIR__ . '/../view/movie_index.php';
    }

    function insert()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
		    if( isset($_POST['title']) && $_POST['title'] !== '' && isset($_POST['director'])
            && $_POST['director'] !== '' && isset($_POST['year']) && $_POST['year'] !== ''
            && isset($_POST['genre']) && $_POST['genre'] !== ''){
				$service->addMovie($_POST['title'], $_POST['director'], $_POST['year'],  $_POST['genre']);
			}

		}
        $title = 'Added successfully!';
		require_once __DIR__ . '/../view/uspjesno_dodano.php';

    }

    function like()
    {
        if( isset($_POST['like'])){
			$service= new Service();
            $id_movie = $_POST['like'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

		    $service->likeMovie( $id, $id_movie);
		}
		$this->index();
    }

    function unlike()
    {
        if (isset($_POST['unlike'])) {
            $service = new Service();
            $id_movie = $_POST['unlike'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

            $service->unlikeMovie($id, $id_movie);
        }
        $this->index();
    }
}


?>
