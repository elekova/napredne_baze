<?php require_once __DIR__ . '/_header.php'; ?>

<h2>Searched book:</h2>
<table>
    <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
    </tr>
    <?php foreach ($books as $b) { ?>
        <tr>
            <td><?php echo $b->title; ?></td>
            <td><?php echo $b->author; ?></td>
            <td><?php echo $b->year; ?></td>
        </tr>
    <?php } ?>
</table>


<?php require_once __DIR__ . '/_footer.php'; ?>