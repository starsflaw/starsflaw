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
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item"><a href="../course">Courses</a></li>
              <li class="breadcrumb-item active" aria-current="page">DirBuster on a vulnerable website</li>
            </ol>
          </nav>
      </div>
      <h1>DirBuster on a vulnerable website</h1>
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
            DirBuster is a multi threaded java application developed by OWASP to brute force directories and files names on web/application servers to find hidden pages and     
            directories within it. So, DirBuster’s purpose is to find these potential vulnerabilities. 
            </br>
            In this article we will learn how to execute a brute force scan in a website to find hidden directories and files using DirBuster. 
            </br>
            </br>
            1 – Start DirBuster
            </br>
            </br>
            We can start DirBuster on Kali Linux by searching it and typing DirBuster in the search menu then find it in the list of apps. Then click on its icon and the application
            will start. Other method is to start it on our terminal by typing dirbuster.
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
            2 – Set target URL
            </br>
            </br>
            Once DirBuster launched , we need to provide a URL or IP address of the website from which we want more information thanks to brute force method. Furthemore, this URL   
            needs to specify the port in which we want to specify the scan. 80 is the primary port used by the world wide web (www) system, but not always the one used. To specify the port 80 in the URL target we
            need to add "double point and the number of the port at the end of the URL". The number of threads that will be used to execute the brute forcing depends totally on the 
            hardware of your computer. 
            </br>
            </br>
            3 – Select list of possible directories and files
            </br>
            </br>
            DirBuster needs a list of words to start a brute force scan. Fortunately, DirBuster has already its own couple of important and useful lists that can be used for our attack. 
            </br>
            To select one, we just need to click on the Browser button at the middle right and selected the wordlist file in /usr/share/dirbuster/wordlists that we want to use for the 
            brute force scan . In our case we select the directory-list-2.3-medium.txt file among many others. That’s the most used because it’s directories/files that were found on at
            least 2 different hosts.
            </br>
            </br> 
            Then we start the scan by pressing the Start button in the GUI and DirBuster will attempt to find hidden pages/directories and directories within the providen url. 
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
            4 – Brute force scan
            </br>
            </br>
            After pressing the scan button and waiting for some minutes, we have many results, id est, Results – List View (list of found directories) ; Results – tree view. 
            </br>
            </br>
            Now when the scan is running you can leave it to finish, you can stop or pause it. 
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