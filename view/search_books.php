<?php require_once __DIR__ . '/_header.php'; ?>

<?php
foreach( $books as $b ){
   echo $b->title . '<br>';
   echo $b->author . '<br>';
   echo $b->year . '<br>';
   echo '<br>';
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>