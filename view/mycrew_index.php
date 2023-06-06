<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>


<div class="container">
<div class="user-info">
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
</div>

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
