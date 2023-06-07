<?php require_once __DIR__ . '/_header.php'; ?>
<?php require_once __DIR__ . '/../model/service.class.php';?>

<?php if (!empty($liked_clubs)) { ?>
     <h2>
		<img src="view/club2.png" alt="icon" class=icon />
		Liked clubs
	</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Sport</th>
            <th></th>
        </tr>
        <?php
        foreach ($liked_clubs as $b) {
        ?>
            <tr>
                <td><?php echo $b->name; ?></td>
                <td><?php echo $b->city; ?></td>
                <td><?php echo $b->country; ?></td>
                <td>
                    <?php
                    $service = new Service();
                    $sport = $service->getSportById($b->id_sport);
                    echo $sport->type;
                    ?>
                </td>
                <td>
                    <form action="index.php?rt=club/unlike" method="post">
                        <button class="red" type="submit" name="unlike" value="<?php echo $b->id_club; ?>">Unlike</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php }
else { ?>
     <h2>
		<img src="view/club2.png" alt="icon" class=icon />
		<?php echo $currentUser; ?> has no liked club
	</h2>
<?php 
} ?>

    <h2>
		<img src="view/club2.png" alt="icon" class=icon />
		All clubs
	</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Sport</th>
            <th></th>
        </tr>
        <?php
        for ($i = 0; $i < count($all_clubs); ++$i) {
        ?>
            <tr>
                <td><?php echo $all_clubs[$i]->name; ?></td>
                <td><?php echo $all_clubs[$i]->city; ?></td>
                <td><?php echo $all_clubs[$i]->country; ?></td>
                <td>
                    <?php
                    $service = new Service();
                    $sport = $service->getSportById($all_clubs[$i]->id_sport);
                    echo $sport->type;
                    ?>
                </td>
                <?php if ($all_clubs_like[$i] == true) { ?>
                    <td>
                        <form action="index.php?rt=club/unlike" method="post">
                            <button class="red" type="submit" name="unlike" value="<?php echo $all_clubs[$i]->id_club; ?>">Unlike</button>
                        </form>
                    </td>
                <?php } else { ?>
                    <td>
                        <form action="index.php?rt=club/like" method="post">
                            <button type="submit" name="like" value="<?php echo $all_clubs[$i]->id_club; ?>">Like</button>
                        </form>
                    </td>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
    </table>

<div class="form-container">
   <form action="index.php?rt=club/insert" method="post">
      <h2>
		<img src="view/club2.png" alt="icon" class=icon />
		Add new club
	   </h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
     };
      ?>
      <input type="text" name="name" required placeholder="enter club name">
      <input type="text" name="city" required placeholder="enter city">
      <input type="text" name="country" required placeholder="enter country">
      <input type="text" name="sport" required placeholder="enter sport">


      </select>
     <br></br>
     <button type="submit" name="add club" value="Add club">Add Club</button>
   </form>

</div>

<?php require_once __DIR__ . '/_footer.php'; ?>
