<?php require_once __DIR__ . '/_header.php'; ?>


<h2>
		<img src="view/band.jpg" alt="icon" class=icon />
		Searched band
</h2>
<table>
     <tr>
            <td>Name</td>
            <td>Country</td>
            <td>Genre</td>
     </tr>
    <?php foreach ($bands as $b) { ?>
        <tr>
            <td><?php echo $b->name; ?></td>
            <td><?php echo $b->country; ?></td>
            <td><?php echo $b->genre; ?></td>
        </tr>
    <?php } ?>
</table>


<?php require_once __DIR__ . '/_footer.php'; ?>