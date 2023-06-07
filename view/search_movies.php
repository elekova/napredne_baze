<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Searched movie</h2>
<table>
        <tr>
            <td>Title</td>
            <td>Director</td>
            <td>Genre</td>
            <td>Year</td>
        </tr>
    <?php foreach ($movies as $m) { ?>
        <tr>
            <td><?php echo $m->title; ?></td>
            <td><?php echo $m->director; ?></td>
            <td><?php echo $m->genre; ?></td>
            <td><?php echo $m->year; ?></td>
        </tr>
    <?php } ?>
</table>


<?php require_once __DIR__ . '/_footer.php'; ?>