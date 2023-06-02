<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Crew</title>
    
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color:rgb(100, 209, 209); box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
            <h1 style="color: white; font-family: 'Lucida Handwriting', cursive;">My Crew</h1>


             <div style="text-align: right;">
                <?php echo $_SESSION['username']; ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Log out">
                </form>
             </div> 
     </div>
    <img src="earth.png" alt="slikica" style="height: 150px; width: 150px; float: left;">
    <div style="display: flex; justify-content: space-around; padding: 10px; font-size=20px;">
        <nav>
		<ul>
			<li><a href="index.php?rt=following">Following</a></li>
			<li><a href="index.php?rt=followers">Followers</a></li>
        </ul>
	</nav>
   
    </div>