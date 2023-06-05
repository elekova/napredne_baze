<?php

@include 'config.php';

class BookController {
	
	public function NewBook () {
	    if(isset($_POST['add book'])){

            $tytle = mysqli_real_escape_string($conn, $_POST['tytle']);
            $author = mysqli_real_escape_string($conn, $_POST['author']);
            $year = mysqli_real_escape_string($conn, $_POST['year']);
			
			$select = " SELECT * FROM book WHERE tytle = '$tytle';
            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($check) > 0){
                $error[] = 'Book is already on the list!';
            }
   
            else {
			    AddBook($tytle, $author, $year);
                header('location:login_form.php');
            }
         }
    }

};
?>

