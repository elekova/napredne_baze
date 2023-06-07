<?php require_once __DIR__ . '/_header.php'; ?>

<?php if (!empty($liked_bands)) { ?>
<h2>
    <img src="view/band.jpg" alt="icon" class=icon />
	Liked bands of <?php echo $currentUser; ?>
</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Country</th>
        <th>Genre</th>
        <th></th>
    </tr>
    <?php foreach ($liked_bands as $b) : ?>
        <tr>
            <td><?php echo $b->name; ?></td>
            <td><?php echo $b->country; ?></td>
            <td><?php echo $b->genre; ?></td>
            <td>
                <form action="index.php?rt=band/unlike" method="post">
                    <button class="red" type="submit" name="unlike" value="<?php echo $b->id_band; ?>">Unlike</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php }
else { ?>
   <h2>
    <img src="view/band.jpg" alt="icon" class=icon />
	<?php echo $currentUser; ?> has no liked band
   </h2>
<?php 
} ?>


<h2>
    <img src="view/band.jpg" alt="icon" class=icon />
	All bands
</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Country</th>
        <th>Genre</th>
        <th></th>
    </tr>
    <?php
    for ($i = 0; $i < count($all_bands); ++$i) { ?>
        <tr>
            <td><?php echo $all_bands[$i]->name; ?></td>
            <td><?php echo $all_bands[$i]->country; ?></td>
            <td><?php echo $all_bands[$i]->genre; ?></td>

            <?php if ($all_bands_like[$i] == true) {
            ?>
                <td>
                    <form action="index.php?rt=band/unlike" method="post">
                        <button class="red" type="submit" name="unlike" value="<?php echo $b->id_band; ?>">Unlike</button>
                    </form>
                </td>
            <?php
        } else {
            ?>
                <td>
                    <form action="index.php?rt=band/like" method="post">
                        <button type="submit" name="like" value="<?php echo $all_bands[$i]->id_band; ?>">Like</button>
                    </form>
                </td>
            <?php
        }
    } ?>
</table>

<div class="form-container">

    <form action="index.php?rt=band/insert" method="post">
    <h2>
        <img src="view/band.jpg" alt="icon" class=icon />
	    Add new band
    </h2>
        <?php
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<span class="error-msg">' . $error . '</span>';
            };
        };
        ?>
        <input type="text" name="name" required placeholder="Enter title">
        <input type="text" name="country" required placeholder="Enter country">
        <input type="text" name="genre" required placeholder="Enter genre">
        <br></br>
        <button type="submit" name="add band" value="Add band">Add band</button>
    </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>

