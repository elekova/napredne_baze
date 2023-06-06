<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Liked books of <?php echo $currentUser; ?>:</h2>
<br>

<?php
foreach( $liked_books as $b ){
   echo $b->title . '<br>';
   echo $b->author . '<br>';
   echo $b->year . '<br>';
   ?>
   <form action="index.php?rt=book/unlike" method="post">
      <button class = "red" type="submit" name="unlike" value="<?php echo $b->id_book; ?>">Unlike</button>
   </form>
   <br>
   <?php
}
?>
<h2>All books:</h2>
<br>
<?php
for( $i = 0; $i < count($all_books); ++$i ){
   echo $all_books[$i]->title . '<br>';
   echo $all_books[$i]->author . '<br>';
   echo $all_books[$i]->year . '<br>';
   if( $all_books_like[$i] == true ){
      ?>
      <form action="index.php?rt=book/unlike" method="post">
         <button class = "red" type="submit" name="unlike" value="<?php echo $b->id_book; ?>">Unlike</button>

      </form>
      <br>
      <?php
   } else{
      ?>
   <form action="index.php?rt=book/like" method="post">
      <button type="submit" name="like" value="<?php echo $all_books[$i]->id_book; ?>">Like</button>
   </form>
   <br>
   <?php
   }

}

?>

<div>

   <form action="index.php?rt=book/insert" method="post">
      <h3>Add new book</h3>

      <input type="text" name="title" required placeholder="enter book title">
      <input type="text" name="author" required placeholder="enter author">
      <input type="text" name="year" required placeholder="enter year">
      <br></br>
      <button type="submit" name="add book" value="Add book">Add Book</button>
   </form>

</div>


<?php require_once __DIR__ . '/_footer.php'; ?>
