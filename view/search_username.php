<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>
<?php require_once __DIR__ . '/../model/service.class.php';?>


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
    if( $isFollowing ){
        ?>
        <form action="index.php?rt=follow/unfollow" method="post">
            <button class = "red" type="submit" name="unfollow" value="<?php echo $person['username']; ?>">Unfollow</button>
        </form>
        <br>
        <?php
    } else {
        ?>
        <form action="index.php?rt=follow/follow" method="post">
            <button type="submit" name="follow" value="<?php echo $person['username']; ?>">Follow</button>
        </form>
        <br>
        <?php
    }
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
    <?php
        foreach( $common_sports as $sport){
            echo $sport->type . '<br>';
            echo '<br>';
        }
    ?>
    <h2>Clubs:</h2>
    <?php
        foreach( $common_clubs as $club){
            echo $club->name . '<br>';
            echo $club->city . '<br>';
            $service = new Service();
            $sport = $service->getSportById($club->id_sport);
            echo $sport->type;
            echo '<br>';
        }
    ?>

    <h2>Bands:</h2>
    <?php
        foreach( $common_bands as $band){
            echo $band->name . '<br>';
            echo $band->country . '<br>';
            echo $band->genre . '<br>';
            echo '<br>';
        }
    ?>



<?php require_once __DIR__ . '/_footer.php'; ?>
