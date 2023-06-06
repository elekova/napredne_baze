<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../model/service.class.php';?>

<div class="form-container">

    <h2>Liked clubs of <?php echo $currentUser; ?>:</h2>
    <br>

    <?php
    foreach( $liked_clubs as $b ){
       echo $b->name . '<br>';
       echo $b->city . '<br>';
       echo $b->country . '<br>';
       
       $service= new Service();
       $sport = $service->getSportById($b->id_sport);
       echo $sport->type . '<br>';
       ?>
       <form action="index.php?rt=club/unlike" method="post">
          <button class = "red" type="submit" name="unlike" value="<?php echo $b->id_club; ?>">Unlike</button>
      </form>
       <br>
       <?php
    }
    ?>
    <h2>All clubs:</h2>
    <br>
    <?php
    for( $i = 0; $i < count($all_clubs); ++$i ){
       echo $all_clubs[$i]->name . '<br>';
       echo $all_clubs[$i]->city . '<br>';
       echo $all_clubs[$i]->country . '<br>';
       $service= new Service();
       $sport = $service->getSportById($all_clubs[$i]->id_sport);
       echo $sport->type . '<br>';
       if( $all_clubs_like[$i] == true ){
          ?>
          <form action="index.php?rt=club/unlike" method="post">
             <button class = "red" type="submit" name="unlike" value="<?php echo $all_clubs[$i]->id_club; ?>">Unlike</button>
          </form>
          <br>
          <?php
       } else{
          ?>
       <form action="index.php?rt=club/like" method="post">
          <button type="submit" name="like" value="<?php echo $all_clubs[$i]->id_club; ?>">Like</button>
       </form>
       <br>
       <?php
       }

    }

    ?>

   <form action="index.php?rt=club/insert" method="post">
      <h3>Add new club</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="name" required placeholder="enter club name">
      <input type="text" name="city" required placeholder="enter city">
      <input type="text" name="country" required placeholder="enter country">
      <input type="text" name="sport" required placeholder="enter sport">


      </select>
     <br></br>
     <button type="submit" name="add club" value="Add club">Add Club</button>
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>
