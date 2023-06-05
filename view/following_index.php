<?php require_once __DIR__ . '/_header.php'; ?>

<p>Current user: <?php echo $currentUser; ?> is following:<p>

<br>

<?php


foreach($usersList as $person){
    echo '<br>';
    echo $person['username'];
    echo '<br>';
    echo $person['name'];
    echo '<br>';
    echo $person['surname'];
    echo '<br>';
    echo $person['date_of_birth'];
    echo '<br>';
    echo $person['gender'];
    echo '<br>';
    echo $person['email'];
    echo '<br>';
    echo $person['city'];
    echo '<br>';
    echo $person['region'];
}
 ?>



<?php require_once __DIR__ . '/_footer.php'; ?>
