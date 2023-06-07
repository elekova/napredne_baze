<?php require_once __DIR__ . '/_header.php'; ?>

<?php
//zapravo ispisuje klubove
foreach( $sport_clubs as $s ){
    echo '<br>';
    echo $s->name . '<br>';
    echo $s->city . '<br>';
    echo $s->country . '<br>';
    echo '<br>';
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>