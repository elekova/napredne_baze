<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Current user: <?php echo $currentUser; ?> liked books:</h2>
<br>

<?php
foreach( $liked_books as $b ){
   echo $b->title . '<br>';
   echo $b->author . '<br>';
   echo $b->year . '<br>';
   echo '<br>';
}
?>
<h2>All books:</h2>
<br>
<?php
foreach( $all_books as $b ){
   echo $b->title . '<br>';
   echo $b->author . '<br>';
   echo $b->year . '<br>';
   ?>
   <form action="index.php?rt=book/like" method="post">
   <button type="submit" name="like" value="<?php echo $b->id_book; ?>">Like</button>
   </form>
   <br>
   <?php
}

?>

<div>

   <form action="index.php?rt=book/insert" method="post">
      <h3>Add new book</h3>
      
      <input type="text" name="title" required placeholder="enter book title">
      <input type="text" name="author" required placeholder="enter author">
      <input type="text" name="year" required placeholder="enter year">
      <input type="submit" name="add book" value="Add book" class="form-btn">
   </form>

</div>


<?php require_once __DIR__ . '/_footer.php'; ?>