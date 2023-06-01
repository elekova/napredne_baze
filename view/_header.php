<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Crew</title>
    
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #ccc; box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
            <h1 style="color: white; font-family: 'Lucida Handwriting', cursive;">My Crew</h1>

            <div style="text-align: right;">
                <?php echo $_SESSION['username']; ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Log out">
                </form>
            </div>
     </div>
    <div style="display: flex; justify-content: space-around; padding: 10px; font-size=20px;">
        <img src="slikica.png" alt="slikica" style="height: 150px; width: 150px;">
        <a href="index.php?rt=users/showfriendsquacks" <?php echo $_GET['rt'] == 'users/showfriendsquacks' ? 'class="active"' : ''; ?>>Following</a>
        <a href="index.php?rt=users/showfollowers" <?php echo $_GET['rt'] == 'users/showfollowers' ? 'class="active"' : ''; ?>>Followers</a>
   
    </div>