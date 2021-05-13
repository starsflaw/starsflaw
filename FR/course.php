<?php
include('db/connexionDB.php');          // Fichier PHP contenant la connexion à la BDD
session_start();                        // On démarre la session
?>

<!DOCTYPE html>
<html lang="fr">
  <?php // En-tête de la page ?>
  <head>
    <?php // Balises meta responsive ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">

    <?php // Bootstrap CSS ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php // Nouvelle librairie pour exploiter les fonctions Ajax ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <?php // jQuery et Bootstrap JS ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <?php // Feuille de style ?>
    <link rel="stylesheet" href="style.css">

    <?php // Titre principal et icône de la page ?>
    <title>Cours</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
  </head>

  <?php // Corps de la page ?>
  <body style="background-color: rgba(45,54,69)">
    <?php 
    // Inclusion de la barre de navigation
    require_once('menu.php'); 
    ?>
    <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);"> 
      </br>
      </br> 
      </br>
      <h1>Cours</h1>
      </br>
      </br>
    </div>

    <?php // Barre de recherche ?>
    <form action="course" method="GET">
      <div class="container">
          <div class="form-row justify-content-center">
              <div class="form-group col-sm-50">
                </br>
                <input type="search" class="form-control" id="search" name="search" style="border:2px solid white;background-color:rgba(61,72,92);color:white;margin-top:25px" placeholder="Rechercher">
              </div>
              <div class="form-group col-sm-0">
                </br>
                <input type="image" name="submit" src=images/search.png alt="Submit" style="width: 20px;text-align:center;margin-top:33px"/>
              </div>
          </div>
        </div>
      </div>

      <?php // Cartes de cours
      if(isset($_GET['search']) AND !empty($_GET['search']))
      {
        $search = htmlspecialchars($_GET['search']);
        $result2 = $db->prepare('SELECT id FROM courses WHERE description LIKE :search ORDER BY id ASC');
        $result2->execute(array('search' => '%'.$search.'%'));
        $counter = 0;
        while($data_courses = $result2->fetch())
        {
          if($data_courses['id'] == 1)
          {
            include('menu-courses/prerequisite.php');
            $counter++; 
          }
          if($data_courses['id'] == 2)
          {
            include('menu-courses/vsftpd.php');
            $counter++;
          }
          if($data_courses['id'] == 3)
          {
            include('menu-courses/sqlmap.php');
            $counter++;
          }
          if($data_courses['id'] == 4)
          {
            include('menu-courses/sqldvwa.php');
            $counter++;
          }
          if($data_courses['id'] == 5)
          {
            include('menu-courses/tomcat.php');
            $counter++;
          }
          if($data_courses['id'] == 6)
          {
            include('menu-courses/ssh.php');
            $counter++;
          }
          if($data_courses['id'] == 7)
          {
            include('menu-courses/challenge1.php');
            $counter++;
          }
          if($data_courses['id'] == 8)
          {
            include('menu-courses/challenge2.php');
            $counter++;
          }
          if($data_courses['id'] == 9)
          {
            include('menu-courses/ufw.php');
            $counter++;
          }
          if($data_courses['id'] == 10)
          {
            include('menu-courses/unrealircd.php');
            $counter++;
          }
        }
        if($counter == 0)
        {
          ?>
          <div class="container" style="margin-top: 80px">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <strong style="color: white;"> Aucun résultat </strong>
                </div>
            </div>
          </div>
          <?php
        }
      }
      else
      {
        include('menu-courses/prerequisite.php');
        include('menu-courses/vsftpd.php');
        include('menu-courses/sqlmap.php');
        include('menu-courses/sqldvwa.php');
        include('menu-courses/tomcat.php');
        include('menu-courses/ssh.php');
        include('menu-courses/ufw.php');
        include('menu-courses/unrealircd.php');
        include('menu-courses/challenge1.php');
        include('menu-courses/challenge2.php');
      }
      ?>
    </form>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footer.php'); 
  ?>
</html>