<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>


<div class="container">
<div class="user-info">
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
</div>
<?php
/*
<br>
<form method="post" action="view/update_index.php">
    <button type="submit" name="edit">Edit profile!</button>
</form>
*/
?>
<div class="form">
<p>Update your profile:</p>
    <form method="post" action="index.php?rt=mycrew/update">
        <p>New name:</p>
            <input type="text" name="name">
        <p>New surname:</p>
            <input type="text" name="surname">
        <p>New email:</p>
            <input type="text" name="email">
        <p>New date:</p>
            <input type="date" name="date">
        <p>New city:</p>
            <input type="text" name="city">
        <p>New region:</p>
            <input type="text" name="region">
        <br>
        <br>
        <button type="submit" name="save">Save changes!</button>
    </form>
</div>
</div>
<?php require_once __DIR__ . '/_footer.php'; ?>
