<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">

   <form action="" method="post">
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