<?php require_once __DIR__ . '/_header.php'; ?>

<?php if (!empty($liked_books)) { ?>
<h2>
    <img src="view/book.jpg" alt="icon" class=icon />
	Liked books
</h2>
<table>
	<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Year</th>
		<th></th>
	</tr>
	<?php foreach ($liked_books as $b) : ?>
		<tr>
			<td><?php echo $b->title; ?></td>
			<td><?php echo $b->author; ?></td>
			<td><?php echo $b->year; ?></td>
			<td>
				<form action="index.php?rt=book/unlike" method="post">
					<button class="red" type="submit" name="unlike" value="<?php echo $b->id_book; ?>">Unlike</button>
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php }
else { ?>
   <h2>
		<img src="view/book.jpg" alt="icon" class=icon />
		<?php echo $currentUser; ?> has no liked book
	</h2>
<?php 
} ?>

<h2>
    <img src="view/book.jpg" alt="icon" class=icon />
	All books
</h2>
<table>
<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Year</th>
		<th></th>
</tr>
<?php

for( $i = 0; $i < count($all_books); ++$i ){ ?>
	<tr>
			<td><?php echo $all_books[$i]->title; ?></td>
			<td><?php echo $all_books[$i]->author; ?></td>
			<td><?php echo $all_books[$i]->year; ?></td>

	<?php if( $all_books_like[$i] == true ){
      ?>
	  <td>
         <form action="index.php?rt=book/unlike" method="post">
         <button class = "red" type="submit" name="unlike" value="<?php echo $b->id_book; ?>">Unlike</button>
		 </form>
		</td>
		</tr>
      <br>
      <?php
   } else{
      ?>
	  <td>
      <form action="index.php?rt=book/like" method="post">
      <button type="submit" name="like" value="<?php echo $all_books[$i]->id_book; ?>">Like</button>
	  </form>
	  </td>
	  </tr>
   <br>
   <?php
   }

}
?>
</table>

<div>

   <form action="index.php?rt=book/insert" method="post">
    <h2>
    <img src="view/book.jpg" alt="icon" class=icon />
	Add new book
	</h2>

      <input type="text" name="title" required placeholder="enter book title">
      <input type="text" name="author" required placeholder="enter author">
      <input type="text" name="year" required placeholder="enter year">
      <br></br>
      <button type="submit" name="add book" value="Add book">Add Book</button>
   </form>

</div>


<?php require_once __DIR__ . '/_footer.php'; ?>
