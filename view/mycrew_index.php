<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>


<?php
 echo "ovo je pocetna stranica" ?>

<?php
if( $person['gender'] === 'female'){
    ?>
    <br>
    <img src="view/female.jpg" alt="Gender: female">
    <?php
} else {
    ?>
    <br>
    <img src="view/male.jpg" alt="Gender: male">
    <?php
}
?>

 <?php
    echo '<br>';
    echo $person['username'];
    echo '<br>';
    echo $person['name'];
    echo '<br>';
    echo $person['surname'];
    echo '<br>';
    echo $person['email'];
    echo '<br>';
    echo $person['gender'];
    echo '<br>';
    echo $person['city'];
 ?>

<?php require_once __DIR__ . '/_footer.php'; ?>
