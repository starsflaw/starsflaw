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
    <title>UFW</title>
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
              <li class="breadcrumb-item active" aria-current="page">Configuration of a UFW Firewall</li>
            </ol>
          </nav>
      </div>
      <h1>Configuration of a UFW Firewall</h1>
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
            UFW is a new simplified command line configuration tool from Netfilter, which provides an alternative to the iptables tool. UFW should eventually allow automatic configuration of the firewall when installing programs that need it.
            </br>
            </br>
            Uncomplicated Firewall is pre-installed on Ubuntu
            </br>
            </br>
            Enable / Disable UFW:
            </br>
            </br>
            </br>
            </br>
            The UFW tool is not enabled by default, so you must have command line administrator rights.
            </br>
            </br>
            Check current status:
            </br>
            </br>
            <kbd> sudo ufw status </kbd>
            </br>
            </br>
            State: active or inactive
            </br>
            </br>
            </br>
            </br>
            Enable UFW: (Apply defined rules)
            </br>
            </br>
            <kbd> sudo ufw enable </kbd>
            </br>
            </br>
            </br>
            </br>
            Disable UFW: (Apply defined rules)
            </br>
            </br>
            <kbd> sudo ufw disable </kbd>
            </br>
            </br>
            View current rule status:
            </br>
            </br>
            A single command allows you to take a look at all the instructions given to UFW:
            </br>
            </br>
            <kbd> sudo ufw status verbose </kbd>
            </br>
            </br>
          </p>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/ufw1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            Description of content:
            </br>
            </br>
            <kbd> Logging: on (low) </kbd>
            </br>
            </br>
            Indicates that logging is enabled, you can find all the interactions of the firewall in the /var/log/ufw.log file. You can enable or disable this logging.
            </br>
            </br>
            <kbd> Default: deny (incoming), allow (outgoing), disabled (routed) </kbd>
            </br>
            </br>
            Concerns UFW default rules:
         </div>
      </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ufw2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>


        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            List all the rules that you have given to the firewall. (V6) corresponds to the rules adapted for IPv6, those which do not have this precision are adapted for IPv4.
            </br>
            </br>
            </br>
            </br>
            Default rule management:
            </br>
            </br>
            When UFW is enabled, by default inbound traffic is denied and outbound traffic is allowed. This is usually the preferred setting, however you can still change these rules.
            </br>
            </br>
            Allow inbound traffic following the default rules:
            </br>
            </br>
            <kbd> sudo ufw default allow </kbd>
            </br>
            </br>
            Deny incoming traffic according to the default rules:
            </br>
            </br>
            <kbd> sudo ufw default deny </kbd>
            </br>
            </br>
            Allow outgoing traffic following the default rules:
            </br>
            </br>
            <kbd> sudo ufw default allow outgoing </kbd>
            </br>
            </br>
            Deny outgoing traffic according to the default rules:
            </br>
            </br>
            <kbd> sudo ufw default deny outgoing </kbd>
            </br>
            </br>
            </br>
            </br>
            Simple rules:
            </br>
            </br>
            The syntax of the rules
            </br>
            </br>
            Here are some examples to understand the syntax of the configuration rules
            </br>
            </br>
            - Opening of port 53 in TCP and UDP:
            </br>
            </br>
            <kbd> sudo ufw allow 53 </kbd>
            </br>
            </br>
            - Opening of port 25 in TCP only:
            </br>
            </br>
            <kbd> sudo ufw allow 25 / tcp </kbd>
            </br>
            </br>
            </br>
            </br>
            Use of services:
            </br>
            </br>
            UFW looks in its list of services known to apply the standard rules associated with these services (apache2, smtp, imaps, etc.). These rules are automatically converted to ports.
            </br>
            </br>
            To have the list of services:
            </br>
            </br>
            <kbd> less / etc / services </kbd>
            </br>
            </br>
            Example: Authorize the SMTP service:
            </br>
            </br>
            <kbd> sudo ufw allow smtp </kbd>
            </br>
            </br>
            2nd example: Authorize the port of Gnome-Dictionary (2628 / tcp):
            </br>
            </br>
            <kbd> sudo ufw allow out 2628 / tcp </kbd>
            </br>
            </br>
            3 ° example: Authorize the secure pop3 protocol (receipt of mail from Gmail and other messaging services using this secure protocol):
            </br>
            </br>
            <kbd> sudo ufw allow out pop3s </kbd>
            </br>
            </br>
            </br>
            </br>
            Advanced use:
            </br>
            </br>
            Complex rules:
            </br>
            </br>
            Writing more complex rules is also possible:
            </br>
            </br>
            - Deny the (proto) TCP protocol to (to) everyone (any) on port (port) 80:
            </br>
            </br>
            <kbd> sudo ufw deny proto tcp to any port 80 </kbd>
            </br>
            </br>
            - Refuse at (to) the address 192.168.0.1 to receive on port (port) 25 the data coming (from) of the class A network and using the (proto) TCP protocol:
            </br>
            </br>
            <kbd> sudo ufw deny proto tcp from 10.0.0.0/8 to 192.168.0.1 port 25 </kbd>
            </br>
            </br>
            - Deny data using the (proto) UDP protocol coming (from) from 1.2.3.4 on port (port) 514:
            </br>
            </br>
            <kbd> sudo ufw deny proto udp from 1.2.3.4 to any port 514 </kbd>
            </br>
            </br>
            - Refuse at the address 192.168.0.5 to receive any data from the web server of the machine hosting the firewall:
            </br>
            </br>
            <kbd> sudo ufw deny out from 192.168.0.5 to any port 80 </kbd>
         </div>
      </div>

        
    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>