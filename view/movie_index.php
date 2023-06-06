<?php require_once __DIR__ . '/_header.php'; ?>

    <h2>Liked movies of <?php echo $currentUser; ?></h2>
    <table>
    <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Year</th>
        <th>Genre</th>
        <th></th>
    </tr>
    <?php foreach ($liked_movies as $b) : ?>
        <tr>
            <td><?php echo $b->title; ?></td>
            <td><?php echo $b->director; ?></td>
            <td><?php echo $b->year; ?></td>
            <td><?php echo $b->genre; ?></td>
            <td>
                <form action="index.php?rt=movie/unlike" method="post">
                    <button class="red" type="submit" name="unlike" value="<?php echo $b->id_movie; ?>">Unlike</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>All movies:</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Year</th>
        <th>Genre</th>
        <th></th>
    </tr>
    <?php for ($i = 0; $i < count($all_movies); ++$i) : ?>
        <tr>
            <td><?php echo $all_movies[$i]->title; ?></td>
            <td><?php echo $all_movies[$i]->director; ?></td>
            <td><?php echo $all_movies[$i]->year; ?></td>
            <td><?php echo $all_movies[$i]->genre; ?></td>
            <?php if ($all_movies_like[$i] == true) : ?>
                <td>
                    <form action="index.php?rt=movie/unlike" method="post">
                        <button class="red" type="submit" name="unlike" value="<?php echo $all_movies[$i]->id_movie; ?>">Unlike</button>
                    </form>
                </td>
            <?php else : ?>
                <td>
                    <form action="index.php?rt=movie/like" method="post">
                        <button type="submit" name="like" value="<?php echo $all_movies[$i]->id_movie; ?>">Like</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endfor; ?>
</table>

<div class="form-container">
    <form action="index.php?rt=movie/insert" method="post">
    <h3>Add new movie</h3>
    <?php
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
        };
    };
    ?>
    <input type="text" name="title" required placeholder="enter movie title">
    <input type="text" name="director" required placeholder="enter director">
    <input type="text" name="year" required placeholder="enter year">
    <input type="text" name="genre" required placeholder="enter genre">

    </select>
    <br></br>
    <button type="submit" name="add movie" value="Add movie">Add Movie</button>
</form>
</div>



<?php require_once __DIR__ . '/_footer.php'; ?>
