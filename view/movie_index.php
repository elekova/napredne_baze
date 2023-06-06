<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">


    <h2>Current user: <?php echo $currentUser; ?> liked movies:</h2>
    <br>

    <?php
    foreach( $liked_movies as $b ){
       echo $b->title . '<br>';
       echo $b->director . '<br>';
       echo $b->year . '<br>';
       echo $b->genre . '<br>';
       ?>
       <form action="index.php?rt=movie/unlike" method="post">
          <button type="submit" name="unlike" value="<?php echo $b->id_movie; ?>">Unlike</button>
       </form>
       <br>
       <?php
    }
    ?>
    <h2>All movies:</h2>
    <br>
    <?php
    for( $i = 0; $i < count($all_movies); ++$i ){
       echo $all_movies[$i]->title . '<br>';
       echo $all_movies[$i]->director . '<br>';
       echo $all_movies[$i]->year . '<br>';
       echo $all_movies[$i]->genre . '<br>';
       if( $all_movies_like[$i] == true ){
          ?>
          <form action="index.php?rt=movie/unlike" method="post">
             <button type="submit" name="unlike" value="<?php echo $all_movies[$i]->id_movie; ?>">Unlike</button>
          </form>
          <br>
          <?php
       } else{
          ?>
       <form action="index.php?rt=movie/like" method="post">
          <button type="submit" name="like" value="<?php echo $all_movies[$i]->id_movie; ?>">Like</button>
       </form>
       <br>
       <?php
       }

    }

    ?>




   <form action="index.php?rt=movie/insert" method="post">
      <h3>Add new movie</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="title" required placeholder="enter movie title">
      <input type="text" name="director" required placeholder="enter director">
      <input type="text" name="year" required placeholder="enter year">
      <input type="text" name="genre" required placeholder="enter genre">

      </select>
      <input type="submit" name="add movie" value="add movie" class="form-btn">
   </form>

</div>



<?php require_once __DIR__ . '/_footer.php'; ?>
