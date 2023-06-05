<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">

   <form action="" method="post">
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
      <input type="submit" name="add band" value="add band" class="form-btn">
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>