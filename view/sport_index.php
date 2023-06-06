<?php require_once __DIR__ . '/_header.php'; ?>


    <h2>Liked sports of <?php echo $currentUser; ?>:</h2>
    <table>
    <tr>
        <th>Type</th>
        <th></th>
    </tr>
    <?php foreach ($liked_sports as $b) : ?>
        <tr>
            <td><?php echo $b->type; ?></td>
            <td>
                <form action="index.php?rt=sport/unlike" method="post">
                    <button class="red" type="submit" name="unlike" value="<?php echo $b->id_sport; ?>">Unlike</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>All sports:</h2>
<table>
    <tr>
        <th>Type</th>
        <th></th>
    </tr>
    <?php for ($i = 0; $i < count($all_sports); ++$i) : ?>
        <tr>
            <td><?php echo $all_sports[$i]->type; ?></td>
            <td>
                <?php if ($all_sports_like[$i] == true) : ?>
                    <form action="index.php?rt=sport/unlike" method="post">
                        <button class="red" type="submit" name="unlike" value="<?php echo $all_sports[$i]->id_sport; ?>">Unlike</button>
                    </form>
                <?php else : ?>
                    <form action="index.php?rt=sport/like" method="post">
                        <button type="submit" name="like" value="<?php echo $all_sports[$i]->id_sport; ?>">Like</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endfor; ?>
</table>

<div class="form-container">
   <form action="index.php?rt=sport/insert" method="post">
      <h3>Add new sport</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="type" required placeholder="enter sport name">
      </select>
      <br></br>
      <button type="submit" name="add sport" value="Add sport">Add Sport</button>
   </form>

</div>


<?php require_once __DIR__ . '/_footer.php'; ?>
