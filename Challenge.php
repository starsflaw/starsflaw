<?php
include('db/connexionDB.php');          // Fichier PHP contenant la connexion à la BDD
session_start();                        // On démarre la session
include "lang_config.php"               // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
  <?php // En-tête de la page ?>
  <head>
    <?php include "header.php" ?>
    <?php // Nouvelle librairie pour exploiter les fonctions Ajax ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title><?php echo $menu['challenges'] ?></title>
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
      <h1><?php echo $menu['challenges'] ?></h1>
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

      <?php // Cartes de Challenges
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
            include('menu-courses/challenge1.php');
            $counter++;
          }
          if($data_courses['id'] == 2)
          {
            include('menu-courses/challenge2.php');
            $counter++;
          }
          if($data_courses['id'] == 3)
          {
            include('menu-courses/challenge3.php');
            $counter++;
          }
          if($data_courses['id'] == 4)
          {
            include('menu-courses/challenge4.php');
            $counter++;
          }
          if($data_courses['id'] == 5)
          {
            include('menu-courses/challenge5.php');
            $counter++;
          }
          if($data_courses['id'] == 6)
          {
            include('menu-courses/challenge6.php');
            $counter++; 
          }
          if($data_courses['id'] == 7)
          {
            include('menu-courses/challenge7.php');
            $counter++;
          }
          if($data_courses['id'] == 8)
          {
	    include('menu-courses/challenge8.php');
            $counter++;
          }
        }
        if($counter == 0)
        {
          ?>
          <div class="container" style="margin-top: 80px">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <strong style="color: white;"> <?php echo $Challenges['result'] ?> </strong>
                </div>
            </div>
          </div>
          <?php
        }
      }
      else
      {
        include('menu-courses/challenge1.php');
        include('menu-courses/challenge2.php');
        include('menu-courses/challenge3.php');
        include('menu-courses/challenge4.php');
        include('menu-courses/challenge5.php');
        include('menu-courses/challenge6.php');
        include('menu-courses/challenge7.php');
        include('menu-courses/challenge8.php');
      }
      ?>
    </form>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footer.php'); 
  ?>
</html>