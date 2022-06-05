<?php
session_start();
include "db_connect.php";
include "flag.php";
if (isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>HOME</title>
     </head>
     <body>
          <div class="block">
               <header class="header">
                    <a href="#" class="Menu"><?php echo $_SESSION['username']; ?></a>
                    <nav class="header-menu">
                         <a href="#">Home</a>
                         <a href="logout.php">Logout</a>
                         <a href="rating.php">Ratings</a>
                    </nav>
               </header>
          </div>
          <div class="block">
               <p>
               <?php
               $sql = "SELECT username FROM logs";
               $result = mysqli_query($conn, $sql);
               echo "<br>";
               echo "<table border='1'>";
               while ($row = mysqli_fetch_assoc($result))
               {
                    echo "<tr>";
                    foreach($row as $value)
                    {
                         echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
               }
               echo "</table>";
               ?>
               </P>
          </div>
                lklk;::::
     </body>













     <style>
.header{
    width: 100%;
    margin-left: 0;
    margin-right: 0;
    height: 70px;
    font-size: 25px;
    line-height: 70px;
    background-color: #333333;
    position: fixed;
    top: 0;
    left: 0;

}

.header .Menu{
     color: #FFFFFF;
     float: left;
     font-family: 'Montserrat', sans-serif;
     margin-left: 30px;
}

.header .header-menu{
     float: right;
     margin-right: 30px;
}

.header .header-menu a{
     margin-right: 15px;
     color: #FFFFFF;
}

.header .header-menu a:hover {
     color: #3498db
}

.banner-image{
     background-size:cover;
     margin-left: 0;
     margin-right: 0;
     margin-bottom: 0;
     height: 1350px;

}

.text{
     position: absolute;
     width: 100%;
     text-align: center;
     font-size: 40px;
     color: white;
     top: 50%;
}

     </style>
</html>


<?php
}else{
     header("Location: index.php");
     exit();
}
?>