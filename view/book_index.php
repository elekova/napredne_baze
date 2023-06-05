<?php require_once __DIR__ . '/_header.php'; ?>

<div class="form-container">

   <form action="" method="post">
      <h3>Add new book</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="title" required placeholder="enter book title">
      <input type="text" name="author" required placeholder="enter author">
      <input type="text" name="year" required placeholder="enter year">
      </select>
      <input type="submit" name="add book" value="add book" class="form-btn">
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>