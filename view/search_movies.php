<?php require_once __DIR__ . '/_header.php'; ?>

<?php
foreach( $movies as $m ){
   echo $m->title . '<br>';
   echo $m->director . '<br>';
   echo $m->genre . '<br>';
   echo $m->year . '<br>';
   echo '<br>';
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>