<?php
session_start();
include 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="register.php" method="post">
     	<h2>REGISTER</h2>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" required><br>

     	<button type="submit" name="register">Register</button>
		<p>
            Already have a account? <a href="index.php">Login</a>
        </p>
     </form>
</body>
<?php
if (isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_check = "SELECT * FROM logs WHERE username='$username'";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user)
    {
        if ($user['username'] == $username)
        {
            echo "Username already exists";
        }
    }
    else
    {
        $query = "INSERT INTO logs (username, password) VALUES('$username','$password')";
        mysqli_query($conn,$query);
        $_SESSION['username'] = $username;
        $_SESSION['sucess'] = "You are now logged in";
        header('Location: home.php');
    }
    
}
?>
</html>


















 <!-- Login: username: Eliot Password: xssattack -->
