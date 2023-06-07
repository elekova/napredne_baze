<?php

require_once __DIR__ . '/../model/service.class.php';

class searchController
{
    function index()
    {
        $title = "Search!";

        require_once __DIR__ . '/../view/search_index.php';
    }
    function username()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
            if( isset($_POST['username']) && $_POST['username'] !== ''){
				$person = $service->getPersonByUsername($_POST['username']);

                $personFollowing = $service->getPersonByUsername($_SESSION['username']);
                $idFollowing = strval($personFollowing['id_person']);

                if( $person === null ){
                    $title = "No results!";
                    require_once __DIR__ . '/../view/no_search_result.php';
                    exit();
                } else{
                    $title = "Search result!";
                    $isFollowing = false;
                    $following = $service->getFollowing( $idFollowing );
                    foreach( $following as $follow){
                        if( $follow == $person['id_person']){
                            $isFollowing = true;
                            break;
                        } else {
                            $isFollowing = false;
                        }
                    }
                    
                    $common_books = $service->getCommonBooks( $personFollowing['id_person'] , $person['id_person']);
                    $common_movies = $service->getCommonMovies( $personFollowing['id_person'] , $person['id_person']);
                    $common_sports;
                    $common_clubs;
                    $common_bands;
                
                    require_once __DIR__ . '/../view/search_username.php';
                }
			}
            /*
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
            */
		}
    }

        function book()
        {
            if( isset($_SESSION['username']))
            {
                $service= new Service();
                if( (isset($_POST['title']) && $_POST['title'] !== '') && (isset($_POST['author']) && $_POST['author'] !== '')){
                    $books = $service->getSearchedBooks($_POST['title'], $_POST['author']);

                    if( empty($books) ){
                        $title = "No results!";
                        require_once __DIR__ . '/../view/no_search_result.php';
                        exit();
                    } else{
                        $title = "Search result!";
                    
                        require_once __DIR__ . '/../view/search_books.php';
                        }
                    }

            }
        }

        function club()
        {
            if( isset($_SESSION['username']))
            {
                $service= new Service();
                if( (isset($_POST['name']) && $_POST['name'] !== '') && (isset($_POST['city']) && $_POST['city'] !== '') && (isset($_POST['country']) && $_POST['country'] !== '')){
                    $clubs = $service->getSearchedClubs($_POST['name'], $_POST['city'], $_POST['country']);

                    if( empty($clubs) ){
                        $title = "No results!";
                        require_once __DIR__ . '/../view/no_search_result.php';
                        exit();
                    } else{
                        $title = "Search result!";
                    
                        require_once __DIR__ . '/../view/search_club.php';
                        }
                    }

            }
        }
    
}