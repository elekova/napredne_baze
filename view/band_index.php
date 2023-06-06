<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Liked bands of <?php echo $currentUser; ?>:</h2>
<br>

<?php
foreach( $liked_bands as $b ){
   echo $b->name . '<br>';
   echo $b->country . '<br>';
   echo $b->genre . '<br>';
   ?>
   <form action="index.php?rt=band/unlike" method="post">
      <button class = "red" type="submit" name="unlike" value="<?php echo $b->id_band; ?>">Unlike</button>
   </form>
   <br>
   <?php
}
?>
<h2>All bands:</h2>
<br>
<?php
for( $i = 0; $i < count($all_bands); ++$i ){
   echo $all_bands[$i]->name . '<br>';
   echo $all_bands[$i]->country . '<br>';
   echo $all_bands[$i]->genre . '<br>';
   if( $all_bands_like[$i] == true ){
      ?>
      <form action="index.php?rt=band/unlike" method="post">
         <button class = "red" type="submit" name="unlike" value="<?php echo $all_bands[$i]->id_band; ?>">Unlike</button>
      </form>
      <br>
      <?php
   } else{
      ?>
   <form action="index.php?rt=band/like" method="post">
      <button type="submit" name="like" value="<?php echo $all_bands[$i]->id_band; ?>">Like</button>
   </form>
   <br>
   <?php
   }

}

?>


<div class="form-container">

   <form action="index.php?rt=band/insert" method="post">
      <h3>Add new band</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="name" required placeholder="enter title">
      <input type="text" name="country" required placeholder="enter country">
      <input type="text" name="genre" required placeholder="enter genre">
      </select>
      <br></br>
      <button type="submit" name="add band" value="Add band">Add band</button>
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>
