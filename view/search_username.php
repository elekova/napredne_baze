<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>


<?php
if( $person['gender'] === 'female'){
    ?>
    <br>
    <img src="view/female.jpg" class = gender alt="Gender: female">
    <?php
} else {
    ?>
    <br>
    <img src="view/male.jpg"class = gender alt="Gender: male">
    <?php
}
?>

 <?php
    echo '<br>';
    echo "username: " . $person['username'];
    echo '<br>';
    echo "name: " . $person['name'];
    echo '<br>';
    echo "surname: " . $person['surname'];
    echo '<br>';
    echo "date od birth: " . $person['date_of_birth'];
    echo '<br>';
    echo "gender: " . $person['gender'];
    echo '<br>';
    echo "email: " . $person['email'];
    echo '<br>';
    echo "city: " . $person['city'];
    echo '<br>';
    echo "region: " . $person['region'];
 ?>



    <h3>Common interests:</h3>
    <h2>Books:</h2>
        <?php
            foreach( $common_books as $book){
                echo $book->title . '<br>';
                echo $book->author . '<br>';
                echo $book->year . '<br>';
            }
        ?>
    <h2>Movies:</h2>
        <?php
            foreach( $common_movies as $movie){
                echo $movie->title . '<br>';
                echo $movie->director . '<br>';
                echo $movie->genre . '<br>';
                echo $movie->year . '<br>';
                echo '<br>';
            }
        ?>
    <h2>Sports:</h2>
    <h2>Clubs:</h2>
    <h2>Bands:</h2>



<?php require_once __DIR__ . '/_footer.php'; ?>