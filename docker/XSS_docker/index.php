<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username"><br>

     	<label>Username</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
		 <p>
            Don't have a account? <a href="register.php">Register</a>
        </p>
     </form>
</body>
</html>


















 <!-- Login: username: Eliot Password: xssattack -->
