<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Searched movie</h2>
<table>
        <tr>
            <td>Name</td>
            <td>City</td>
            <td>Country</td>
        </tr>
    <?php foreach ($sport_clubs as $s) { ?>
        <tr>
            <td><?php echo $s->name; ?></td>
            <td><?php echo $s->city; ?></td>
            <td><?php echo $s->country; ?></td>
        </tr>
    <?php } ?>
</table>


<?php require_once __DIR__ . '/_footer.php'; ?>