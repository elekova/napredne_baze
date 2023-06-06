<?php require_once __DIR__ . '/_header.php'; ?>
	<body>
	<div class = container>
		<form method="post" action="index.php?rt=login/loginCheck">
			<label><b>Username: </b></label>
			<input type="text" name="username" placeholder="Enter Username"/>
			<br/> <br>
			<label><b>Password: </b></label>
			<input type="password" name="password" placeholder="Enter Password"/>
			<br/>
			<br>
			<button type="submit" name="gumb" value="login">Log in!</button>
		</form>
	</div>
<?php require_once __DIR__ . '/_footer.php'; ?>
