<?php

$sname= "db";
$unmae= "root";
$password= "rootpassword";

$db_name = "logs";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "connection failed!";
}
?>