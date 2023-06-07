<?php require_once __DIR__ . '/_header.php'; ?>

<?php
foreach( $clubs as $c ){
   echo $c->name . '<br>';
   echo $c->city . '<br>';
   echo $c->country . '<br>';
   echo '<br>';
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>