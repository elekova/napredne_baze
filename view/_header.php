<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Crew</title>
    <link rel="stylesheet" href="style.css">

<style>
.navbar {
    overflow: hidden;
    background-color: rgb(1, 42, 1);
    font-family: Arial;
  }
  
  /* Links inside the navbar */
  .navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  
  /* The dropdown container */
  .dropdown {
    float: left;
    overflow: hidden;
  }
  
  /* Dropdown button */
  .dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit; /* Important for vertical align on mobile phones */
    margin: 0; /* Important for vertical align on mobile phones */
  }
  
  /* Add a red background color to navbar links on hover */
  .navbar a:hover, .dropdown:hover .dropbtn {
    background-color: rgb(73, 69, 69);
  }
  
  /* Dropdown content (hidden by default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: rgb(0, 122, 0);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  /* Links inside the dropdown */
  .dropdown-content a {
    float: none;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  /* Add a grey background color to dropdown links on hover */
  .dropdown-content a:hover {
    background-color: rgb(73, 69, 69);
  }
  
  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

</style>

    
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color:rgb(112, 250, 100); box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
            <h1 style="color: white; font-family: 'Lucida Handwriting', cursive;">My Crew</h1>
       
 
          <div style="text-align: right;">
                <?php echo $_SESSION['username']; ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Log out">
                </form>
          </div> 

     </div>

     <div class="navbar">
            <a href="index.html">My profile</a>
            <div class="dropdown">
              <button class="dropbtn">Find interests
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="book_index.php">Books</a>
                <a href="movie_index.php">Movies</a>
                <a href="sport_index.php">Sports</a>
                <a href="club_index.php">Clubs</a>
                <a href="band_index.php">Bands</a>
              </div>
            </div> 
     </div>

    <img src="earth.png" alt="slikica" style="height: 150px; width: 150px; float: left;">
        <div style="display: flex; justify-content: space-around; padding: 10px; font-size=20px;">
		    <a href="index.php?rt=following">Following</a>
		    <a href="index.php?rt=followers">Followers</a>
        </div>