<?php
session_start();
include 'db_connect.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
 
     $uname = $_POST['username'];
     $pass = $_POST['password'];

     if (empty($uname)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
        $sql = "SELECT * FROM logs WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass ){
                $_SESSION['username'] = $row['username'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error= Username or password incorrect");
                exit();
            }
        }else{
            header("Location: index.php?error= Username or password incorrect");
            exit();
        }
    } 
}else{
    header("Location :index.php");
    exit();
}

?>