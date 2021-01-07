<?php
  include('../db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>VSFTPD</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
  </head>

  <body>
    <?php require_once('menuCourses.php'); ?>
    
    <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
      <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="../courses.php">Cours</a></li>
              <li class="breadcrumb-item active" aria-current="page">Exploitez une vulnérabilité de ports : VSFTPD</li>
            </ol>
          </nav>
      </div> 
         
      <h1>Exploitez une vulnérabilité de ports : VSFTPD</h1>
      </br>
      </br>
    </div>
    </br>
    </br>
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="group col-sm-0">
            <iframe width="560" height="315" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);" src="https://www.youtube.com/embed/wWbjUSlbk5Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
      </div> 
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify">
            </br>
            Dans ce cours nous allons apprendre à installer une Backdoor sur Metasploitable2 utilisant l’application VSFTPD. 
            Nous allons exploiter VSFTPD v2.3.4 avec Metasploit.
            Cet exploit particulier pour VSFTPD est assez facile à exploiter et fait un premier excellent départ sur notre hôte-cible Metasploitable 2.
            </br>
            </br>
            Au lieu de recourir directement à Metasploit pour exploiter cette vulnérabilité, nous allons commencer à examiner de quelle façon cette application est vulnérable de manière exacte.
            </br>
            </br>
            Pour cela nous allons le tester dans un environnement contrôlé, puis l’exploiter sur la machine Metasploitable 2. Cela vous aidera à obtenir une meilleure compréhension du processus d’exploitation et surtout de voir réellement ce qui se passe et comment cela se passe. 
            </br>
            </br>
            L’objectif final de l’exploitation des vulnérabilités est d’obtenir un shell avec les droit root ou administrateur sur l’hôte-cible et d’effectuer l’exploitation-post sur la machine.  
            </br>
            </br>
            Le niveau de privilège acquis se situe habituellement dans le cadre de l’application exploitée. Par exemple, si VSFTPD v2.3.4 est en cours d’exécution, nous pourrions exécuter un shellcode en arrière-plan.  
            </br>
            </br>
            D’abord, nous allons utiliser Nmap, qui est un des outils les plus répandus, open source, et surtout disponible sur Windows, Mac OS et Linux. Commencez par ouvrir un Terminal sur votre Kali.
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0">
          <p style="font-size: 18px;">
            <kbd>nmap -options &lt;ip&gt;</kbd>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px;">
            </br>
            On peut également taper directement <kbd>nmap &lt;ip&gt;</kbd> sans options. Nmap réalisera par défaut un scan SYN du protocole TCP. 
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/vsftpd.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px;">
            </br>
            </br>
            On remarque que le port 21 est ouvert avec la version vsftpd 2.3.4. Le Framework Metasploit contient un exploit spécifique pour exploiter la vulnérabilité de l’application VSFTPD de cette version. 
            </br>
            </br>
            Nous allons alors démarrer Metasploit avec la commande <kbd>msfconsole</kbd>. 
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            <samp>
              <kbd> msf> search vsftpd </kbd>
              </br>
              <kbd> msf> use 0 </kbd>
              </br>
              <kbd> msf> show options </kbd>
              </br>
            </samp>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px;">
          Il faut maintenant préciser l’addresse IP de notre hôte-cible :
          </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            <samp>
              <kbd> msf> set RHOST &lt;IP_CIBLE&gt; </kbd>
              </br>
              <kbd> msf> set RHOST 192.168.1.14 (par exemple) </kbd>
              </br>
              <kbd> msf> run </kbd>
              </br>
            </samp>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            </br>
            <img src="../images/vsftpd2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            <img src="../images/vsftpd3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px;">
          Nous avons donc exploité une vulnérabilité de l’application VSFTPD v2.3.4 avec Metasploit. 
          Le service VSFTPD v2.3.4 est en cours d’exécution en tant que root, ce qui nous a donné un shell-root sur notre terminal. 
          </br>
          </br>
          </br>
          </br>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>