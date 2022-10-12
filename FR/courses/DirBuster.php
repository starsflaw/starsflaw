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
    <title>DirBuster</title>
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
              <li class="breadcrumb-item active" aria-current="page">DirBuster sur un site Web vulnérable
</li>
            </ol>
          </nav>
      </div>
      <h1>DirBuster sur un site Web vulnérable</h1>
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
            DirBuster est une application Java multithread développée par OWASP pour forcer brutalement les répertoires et les noms de fichiers sur les serveurs Web/d'applications afin de trouver 
            des pages et des répertoires cachés. Ainsi, le but de DirBuster est de trouver ces  potentielles vulnérabilités.
            </br>
            Dans cet article, nous allons apprendre comment exécuter une analyse par force brute sur un site Web pour trouver des répertoires et des fichiers cachés à l'aide de DirBuster.
            </br>
            </br>
            1 – Démarrer DirBuster
            </br>
            </br>
            Nous pouvons démarrer DirBuster sur Kali Linux en le recherchant et tapant DirBuster dans le menu de recherche, puis en le trouvant dans la liste des applications. Cliquez 
            ensuite sur son icône et l'application se lancera. Une autre méthode consiste à le démarrer sur notre terminal en tapant dirbuster.
            </br>
            </br>
           </p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/dirbuster_text1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

     <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            </br>
            2 – Définir l'URL cible
            </br>
            </br>
            Une fois DirBuster lancé, nous devons fournir une URL ou une adresse IP du site Web à partir duquel nous voulons plus d'informations grâce à la méthode de la force brute. De plus, cette URL 
            doit spécifier le port dans lequel nous voulons spécifier l'analyse. 80 est le port principal utilisé par le système World Wide Web (www), mais pas toujours celui utilisé. Pour spécifier le 
            port 80 dans l'URL cible, nous devons ajouter "double point et le numéro du port à la fin de l'URL". Le nombre de threads qui seront utilisés pour exécuter le forçage brut dépend totalement 
            du matériel de votre ordinateur.
            </br>
            </br>
            3 – Sélectionner la liste des répertoires et fichiers possibles
            </br>
            </br>
            DirBuster a besoin d'une liste de mots pour démarrer une analyse par force brute. Heureusement, DirBuster a déjà ses propres listes importantes et utiles qui peuvent être utilisées pour notre attaque.  
            </br>
            Pour en sélectionner un, il suffit de cliquer sur le bouton Navigateur au milieu à droite et de sélectionner le fichier de liste de mots dans /usr/share/dirbuster/wordlists que nous voulons utiliser 
            pour l'analyse par force brute . Dans notre cas, nous sélectionnons le fichier directory-list-2.3-medium.txt parmi beaucoup d'autres. C'est le plus utilisé car ce sont des répertoires/fichiers qui 
            ont été trouvés sur au moins 2 hébergeurs différents.
            </br>
            </br> 
            Ensuite, nous commençons l'analyse en appuyant sur le bouton Démarrer dans l'interface graphique et DirBuster tentera de trouver des pages/répertoires cachés et des répertoires dans l'URL fournie. 
            </br>
            </br> 
         </div>
      </div>
 
       <div class="row justify-content-center">
         <div class="group col-sm-0">      
         <img src="../images/dirbuster_text2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

      <div class="row justify-content-center">
      <div class="group col-sm-8">
        <p style="font-size: 18px; color: white"> 
            </br>
            </br>
            4 – Analyse par force brute
            </br>
            </br>
            Après avoir appuyé sur le bouton d'analyse et attendu quelques minutes, nous avons de nombreux résultats, id est, Results – List View (liste des répertoires trouvés) ; Résultats – arborescence. 
            </br>
            </br>
            Maintenant, lorsque l'analyse est en cours, vous pouvez la laisser se terminer, vous pouvez l'arrêter ou la mettre en pause.  
            </br>
            </br>
        </div>
      </div>

     <div class="row justify-content-center">
       <div class="group col-sm-0">      
       <img src="../images/dirbuster_text3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
       </div>
     </div>
           
           </br>
           </br>
 
     <div class="row justify-content-center">
       <div class="group col-sm-0">      
       <img src="../images/dirbuster_text4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
       </div>
      </div>
          
    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>