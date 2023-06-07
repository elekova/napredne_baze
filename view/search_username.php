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
   <ul>
    <li>username: <?php echo $person['username']; ?></li>
    <li>name: <?php echo $person['name']; ?></li>
   <li>surname: <?php echo $person['surname']; ?></li>
    <li>date of birth: <?php echo $person['date_of_birth']; ?></li>
    <li>gender: <?php echo $person['gender']; ?></li>
    <li>email: <?php echo $person['email']; ?></li>
    <li>city: <?php echo $person['city']; ?></li>
    <li>region: <?php echo $person['region']; ?></li>
    </ul>
    <?php if( $isFollowing ){
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



    <h1>Common interests:</h1>

<table>
    <?php
    if (!empty($common_books)){ ?>
        <h2>Common books:</h2>
        <tr>
            <th>Title</th>
		    <th>Author</th>
		    <th>Year</th>
        </tr>
    <?php foreach ($common_books as $book) {
    ?>
        <tr>
            <td><?php echo $book->title; ?></td>
            <td><?php echo $book->author; ?></td>
            <td><?php echo $book->year; ?></td>
        </tr>
        <?php
    }
    }
    ?>
</table>

<table>
        <?php
        if (!empty($common_movies)){ ?>
            <h2>Common movies:</h2>
            <tr>
            <th>Title</th>
		    <th>Director</th>
		    <th>Genre</th>
            <th>Year</th>
            </tr>
        <?php
        foreach ($common_movies as $movie) {
            ?>
            <tr>
            <td><?php echo $movie->title; ?></td>
            <td><?php echo $movie->director; ?></td>
            <td><?php echo $movie->genre; ?></td>
            <td><?php echo $movie->year; ?></td>
            </tr>
            <?php
        }
        }
    ?>
</table>
    
<table> 
    <?php
    if (!empty($common_sports)) { ?>
        <h2>Common sports:</h2>
        <tr>
            <th>Type</th>
        </tr>
    <?php
    foreach ($common_sports as $sport) {
        ?>
        <tr>
            <td><?php echo $sport->type; ?></td>
        </tr>
        <?php
    }
}
?>
</table>

 <table>
    <?php
if (!empty($common_clubs)) { ?>
    <h2>Common clubs:</h2>
     <tr>
            <th>Name</th>
		    <th>City</th>
      </tr>
      <?php
    foreach ($common_clubs as $club) {
        ?>
        <tr>
            <td><?php echo $club->name; ?></td>
            <td><?php echo $club->city; ?></td>
            <?php
            $service = new Service();
            $sport = $service->getSportById($club->id_sport);
            ?>
            <td><?php echo $sport->type; ?></td>
        </tr>
        <?php
    }
}
?>
</table>


<table>
    <?php
    if (!empty($common_bands)) { ?>
        <h2>Common bands:</h2>
         <tr>
            <th>Name</th>
		    <th>Country</th>
            <th>Genre</th>
      </tr>
      <?php
        foreach ($common_bands as $band) {
            ?>
            <tr>
                <td><?php echo $band->name; ?></td>
                <td><?php echo $band->country; ?></td>
                <td><?php echo $band->genre; ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>




<?php require_once __DIR__ . '/_footer.php'; ?>
