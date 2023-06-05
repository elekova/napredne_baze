<?php require_once __DIR__ . '/_header.php'; ?>
	<body>
		<form method="post" action="index.php?rt=login/loginCheck">
			<label>Username:</label>
			<input type="text" name="username" />
			<br/> <br>
			<label>Password: </label>
			<input type="password" name="password" />
			<br/>
			<br>
			<button type="submit" name="gumb" value="login">Log in!</button>
		</form>
<?php require_once __DIR__ . '/_footer.php'; ?>
