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
        $liked_books = $service->getLikedBooks($id);

        $all_books = $service->getAllBooks();

        require_once __DIR__ . '/../view/book_index.php';
    }
}


?>