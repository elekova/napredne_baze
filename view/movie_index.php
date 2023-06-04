<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">

   <form action="" method="post">
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