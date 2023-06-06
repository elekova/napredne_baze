<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">


    <h2>Current user: <?php echo $currentUser; ?> liked sports:</h2>
    <br>

    <?php
    foreach( $liked_sports as $b ){
       echo $b->type . '<br>';

       ?>
       <form action="index.php?rt=sport/unlike" method="post">
          <button type="submit" name="unlike" value="<?php echo $b->id_sport; ?>">Unlike</button>
       </form>
       <br>
       <?php
    }
    ?>
    <h2>All sports:</h2>
    <br>
    <?php
    for( $i = 0; $i < count($all_sports); ++$i ){
       echo $all_sports[$i]->type . '<br>';

       if( $all_sports_like[$i] == true ){
          ?>
          <form action="index.php?rt=sport/unlike" method="post">
             <button type="submit" name="unlike" value="<?php echo $all_sports[$i]->id_sport; ?>">Unlike</button>
          </form>
          <br>
          <?php
       } else{
          ?>
       <form action="index.php?rt=sport/like" method="post">
          <button type="submit" name="like" value="<?php echo $all_sports[$i]->id_sport; ?>">Like</button>
       </form>
       <br>
       <?php
       }

    }

    ?>

   <form action="index.php?rt=sport/insert" method="post">
      <h3>Add new sport</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="type" required placeholder="enter sport name">
      </select>
      <input type="submit" name="add sport" value="add sport" class="form-btn">
   </form>

</div>


<?php require_once __DIR__ . '/_footer.php'; ?>
