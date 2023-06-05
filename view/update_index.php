<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../app/database/db.class.php'; ?>

<?php
if( isset($_POST['edit']) ){
    ?>
    <form method="post" action="mycrew_index.php">
        <p>New username:</p>
            <input type="text" name="username">
        <p>New name:</p>
        <button type="submit" name="save">Save changes!</button>
    </form>
    <?php
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>