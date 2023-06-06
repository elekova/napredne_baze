<?php

require_once __DIR__ . '/../model/service.class.php';


class BookController
{
    function index()
    {
        $title = "Books!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);
        
        $id = $person['id_person'];
        $liked_books = $service->getLikedBooks($id);

        $all_books = $service->getAllBooks();
        $all_books_like = array();
        foreach($all_books as $b){
           $all_books_like[] = $service->doILikeBook( $id, $b->id_book);
        }
        require_once __DIR__ . '/../view/book_index.php';
    }

    function insert()
    {
        if( isset($_SESSION['username'])){
			$service= new Service();
		    if( isset($_POST['title']) && $_POST['title'] !== '' && isset($_POST['author']) 
            && $_POST['author'] !== '' && isset($_POST['year']) && $_POST['year'] !== ''){
				$service->addBook($_POST['title'], $_POST['author'], $_POST['year']);
			}
		}
        $title = 'Added successfully!';
		require_once __DIR__ . '/../view/uspjesno_dodano.php';
        
    }

    function like()
    {
        if( isset($_POST['like'])){
			$service= new Service();
            $id_book = $_POST['like'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

		    $service->likeBook( $id, $id_book);
		}
		$this->index();
    }

    function unlike()
    {
        if (isset($_POST['unlike'])) {
            $service = new Service();
            $id_book = $_POST['unlike'];
            $person = $service->getPersonByUsername($_SESSION['username']);
            $id = $person['id_person'];

            $service->unlikeBook($id, $id_book);
        }
        $this->index();
    }

}

?>

