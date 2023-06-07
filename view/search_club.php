<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Searched club:</h2>
<table>
        <tr>
            <td>Name</td>
            <td>City</td>
            <td>Country</td>
        </tr>
    <?php foreach ($clubs as $c) { ?>
        <tr>
            <td><?php echo $c->name; ?></td>
            <td><?php echo $c->city; ?></td>
            <td><?php echo $c->country; ?></td>
        </tr>
    <?php } ?>
</table>

<?php require_once __DIR__ . '/_footer.php'; ?>