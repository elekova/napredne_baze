<?php require_once __DIR__ . '/_header.php'; ?>

<form action="index.php?rt=search/username" method="post">
      <p>Search user by username</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="username" required placeholder="enter username">
      <br></br>
      <button type="submit" name="search_username" value="search_username">Search user!</button>
      <br></br>
</form>

<form action="index.php?rt=search/book" method="post">
      <p>Search book by title and author</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="title" required  placeholder="enter title">
      <input type="text" name="author" required placeholder="enter author">
      <br></br>
      <button type="submit" name="search_book" value="search_book">Search book!</button>
      <br></br>
</form>

<form action="index.php?rt=search/movie" method="post">
      <p>Search movie</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="title" required placeholder="enter title">
      <input type="text" name="director" required placeholder="enter director">
      <input type="text" name="genre" required placeholder="enter genre">
      <input type="text" name="year" required placeholder="enter year">
      <br></br>
      <button type="submit" name="search_movie" value="search_movie">Search movie!</button>
      <br></br>
</form>

<form action="index.php?rt=search/sport" method="post">
      <p>Search sport by type</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="type" required placeholder="enter type">
      <br></br>
      <button type="submit" name="search_sport" value="search_sport">Search sport!</button>
      <br></br>
</form>

<form action="index.php?rt=search/club" method="post">
      <p>Search club</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="name" required placeholder="enter name">
      <input type="text" name="city" required placeholder="enter city">
      <input type="text" name="country" required placeholder="enter country">
      <br></br>
      <button type="submit" name="search_club" value="search_club">Search club!</button>
      <br></br>
</form>

<form action="index.php?rt=search/band" method="post">
      <p>Search band</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="name" required placeholder="enter name">
      <input type="text" name="country" required placeholder="enter country">
      <input type="text" name="genre" required placeholder="enter genre">
      <br></br>
      <button type="submit" name="search_band" value="search_band">Search band!</button>
      <br></br>
</form>



<?php require_once __DIR__ . '/_footer.php'; ?>
