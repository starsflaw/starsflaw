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
  <body style="background-color: rgba(61,72,92)">
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

    <!-- BUG RESPONSIVE A CORRIGER -->
    <?php // Cartes de cours ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="group col-sm-100">
          <div class="poster">
            </br>
            </br>
            <a href="courses/vsftpd.php" style="text-decoration:none">
              <div class="card mb-3" style="width: 60rem">
                <div class="row no-gutters">
                  <div class="col-lg-4">
                    <img src="images/metasploit.jpg" class="img-fluid" width="150" height="150">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h6 class="card-subtitle mb-2 text-muted">Vulnérabilité de ports</h6>
                      <h5 class="card-title" style="color: black">VSFTPD</h5>
                      <p class="card-text" style="color: black">Découvrez comment obtenir un shell avec les droits root sur un hôte-cible en utilisant Nmap et Metasploitable.</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-100">
          <div class="poster">
            <a href="courses/sqlmap.php" style="text-decoration:none">
              <div class="card mb-3" style="width: 60rem">
                <div class="row no-gutters">
                  <div class="col-lg-4">
                    <img src="images/sqlmap.png" class="img-fluid" width="150" height="150">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h6 class="card-subtitle mb-2 text-muted">Vulnérabilité web</h6>
                      <h5 class="card-title" style="color: black">Faille SQL</h5>
                      <p class="card-text" style="color: black">Découvrez comment récupérer les informations d'une base de données d'un site non sécurisé avec SQLMAP.</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-100">
          <div class="poster">
            <a href="courses/tomcat.php" style="text-decoration:none">
              <div class="card mb-3" style="width: 60rem">
                <div class="row no-gutters">
                  <div class="col-lg-4">
                    <img src="images/tomcat.png" class="img-fluid" width="150" height="150">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h6 class="card-subtitle mb-2 text-muted">Vulnérabilité de ports</h6>
                      <h5 class="card-title" style="color: black">Tomcat-Apache </h5>
                      <p class="card-text" style="color: black">Découvrez comment obtenir un shell avec les droits root sur un hôte-cible en utilisant Tomcat-Apache</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footer.php'); 
  ?>
</html>