<?php require_once __DIR__ . '/_header.php'; ?>

<?php
foreach( $bands as $b ){
    echo '<br>';
   echo $b->name . '<br>';
   echo $b->country . '<br>';
   echo $b->genre . '<br>';
   echo '<br>';
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>