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
</div>

<div class="form-container">
    <form method="post" action="index.php?rt=mycrew/update">
    <h3>Update your profile:</h3>
            <input type="text" name="name" placeholder="enter new name">
            <input type="text" name="surname" placeholder="enter new surname">
            <input type="text" name="email" placeholder="enter new email">
            <input type="text" name="city" placeholder="enter new city">
            <input type="text" name="region" placeholder="enter new region">
            <p>enter new date</p>
            <input type="date" name="date">
        <br>
        <br>
        <button type="submit" name="save">Save changes!</button>
    </form>
</div> 
</div>
<?php require_once __DIR__ . '/_footer.php'; ?>
