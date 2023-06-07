<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../model/service.class.php'; ?>

<h2>Current user: <?php echo $currentUser; ?> is followed by:</h2>
<br>

<?php

foreach ($usersList as $temp) {
    echo '<br>';
    if( $temp['gender'] === 'female'){
        ?>
        <br>
        <img src="view/female.jpg" class = gender alt="Gender: female">
        <br>
        <?php
    } else {
        ?>
        <br>
        <img src="view/male.jpg" class = gender alt="Gender: male">
        <br>
        <?php
    }    
    foreach ($temp as $key => $value) {
        if( $key != 'password' && $key !=='id_person'){
            echo $key . ': ' . $value . '<br>';
        }
    }
    $service = new Service();
    if( $service->doIFollowUser( $currentUser, $temp['username']) === true ){
        ?>
        <form action="index.php?rt=follow/unfollow" method="post">
            <button class = "red" type="submit" name="unfollow" value="<?php echo $temp['username']; ?>">Unfollow</button>
        </form>
        <br>
        <?php
    } else {
        ?>
        <form action="index.php?rt=follow/follow" method="post">
            <button type="submit" name="follow" value="<?php echo $temp['username']; ?>">Follow</button>
        </form>
        <br>
        <?php
    }

    
}

/*
for ($i = 0; $i < count($usersList); ++$i) {
    echo '<br>';
    if ($usersList[$i]['gender'] === 'female') {
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
    echo $usersList[$i]['username'] . '<br>';
    echo $usersList[$i]['name'] . '<br>';
    echo $usersList[$i]['surname'] . '<br>';
    echo $usersList[$i]['email'] . '<br>';
    echo $usersList[$i]['gender'] . '<br>';
    echo $usersList[$i]['city'] . '<br>';
    echo $usersList[$i]['region'] . '<br>';
    echo $usersList[$i]['date_of_birth'] . '<br>';

    if ($followed_users[$i] == true) {
        ?>
        <form action="index.php?rt=follow/unfollow" method="post">
            <button type="submit" name="unfollow" value="<?php echo $usersList[$i]['username']; ?>">Unfollow</button>
        </form>
        <br>
        <?php
    } else {
        ?>
        <form action="index.php?rt=follow/follow" method="post">
            <button type="submit" name="follow" value="<?php echo $usersList[$i]['username']; ?>">Follow</button>
        </form>
        <br>
        <?php
    }
}
*/

?>

<?php require_once __DIR__ . '/_footer.php'; ?>