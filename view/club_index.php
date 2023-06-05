<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">

   <form action="" method="post">
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
      <input type="submit" name="add club" value="add club" class="form-btn">
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>