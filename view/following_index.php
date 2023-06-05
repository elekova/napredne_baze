<?php require_once __DIR__ . '/_header.php'; ?>

<p>Current user: <?php echo $currentUser; ?> is following:<p>
<br>

<?php
foreach ($usersList as $temp) {
    echo '<br>';
    if( $temp['gender'] === 'female'){
        ?>
        <br>
        <img src="view/female.jpg" alt="Gender: female">
        <br>
        <?php
    } else {
        ?>
        <br>
        <img src="view/male.jpg" alt="Gender: male">
        <br>
        <?php
    }
    foreach ($temp as $key => $value) {
        if( $key !=='password' && $key !=='id_person'){
            echo $key . ': ' . $value . '<br>';
        }
        
    }
    ?>
    <form action="index.php?rt=follow/unfollow" method="post">
        <button type="submit" name="unfollow" value="<?php echo $temp['username']; ?>">Unfollow</button>
    </form>
    <br>
    <?php
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>