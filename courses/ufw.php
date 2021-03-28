<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
  ?>
  <script language="Javascript">
    document.location.replace("../login.php");
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
              <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="../courses.php">Cours</a></li>
              <li class="breadcrumb-item active" aria-current="page">Configuration d'un Firewall UFW</li>
            </ol>
          </nav>
      </div>
      <h1>Configuration d'un Firewall UFW</h1>
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
            UFW est un nouvel outil de configuration simplifié en ligne de commande de Netfilter, qui donne une alternative à l'outil iptables. UFW devrait à terme permettre une configuration automatique du pare-feu lors de l'installation de programmes en ayant besoin.
            </br>
            </br>
            Uncomplicated Firewall est pré-installé sous Ubuntu
            </br>
            </br>
            Activer / Désactiver UFW :
            </br>
            </br>
            </br>
            </br>
            L'outil UFW n'est pas activé par défaut, il vous faut donc avoir les droits administrateurs en ligne de commande.
            </br>
            </br>
            Vérifier le statut actuel :
            </br>
            </br>
            <kbd>sudo ufw status</kbd>
            </br>
            </br>
            État : actif ou inactif
            </br>
            </br>
            </br>
            </br>
            Activer UFW : (Appliquer les règles définies)      
            </br>
            </br>
            <kbd>sudo ufw enable</kbd>
            </br>
            </br>
            </br>
            </br>
            Désactiver UFW : (Appliquer les règles définies)      
            </br>
            </br>
            <kbd>sudo ufw disable</kbd>
            </br>
            </br>
            Afficher l'état actuel des règles :    
            </br>
            </br>
            Une unique commande permet de jeter un œil sur la totalité des instructions indiquées à UFW :
            </br>
            </br>
            <kbd>sudo ufw status verbose</kbd>
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
            Description du contenu :
            </br>
            </br>
            <kbd>Journalisation : on (low)</kbd>
            </br>
            </br>
            Indique que la journalisation est activée, vous pouvez retrouver toutes les interactions du pare-feu dans le fichier /var/log/ufw.log . Vous pouvez activer ou désactiver cette journalisation.
            </br>
            </br>
            <kbd>Default: deny (incoming), allow (outgoing), disabled (routed)</kbd>
            </br>
            </br>
            Concerne les règles par défaut de UFW :
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
            Liste toutes les règles que vous avez indiquées au pare-feu. (V6) correspond aux règles adaptées pour l'IPv6, celles qui n'ont pas cette précision sont adaptées pour l'IPv4. 
            </br>
            </br>
            </br>
            </br>
            Gestion des règles par défaut :
            </br>
            </br>
            Lorsque UFW est activé, par défaut le trafic entrant est refusé et le trafic sortant est autorisé. C'est en général le réglage à privilégier, cependant vous pouvez tout de même modifier ces règles.
            </br>
            </br>
            Autoriser le trafic entrant suivant les règles par défaut :
            </br>
            </br>
            <kbd>sudo ufw default allow</kbd>
            </br>
            </br>
            Refuser le trafic entrant suivant les règles par défaut :
            </br>
            </br>
            <kbd>sudo ufw default deny</kbd>
            </br>
            </br>
            Autoriser le trafic sortant suivant les règles par défaut :
            </br>
            </br>
            <kbd>sudo ufw default allow outgoing</kbd>
            </br>
            </br>
            Refuser le trafic sortant suivant les règles par défaut :
            </br>
            </br>
            <kbd>sudo ufw default deny outgoing</kbd>
            </br>
            </br>
            </br>
            </br>
            Règles simples :
            </br>
            </br>
            La syntaxe des règles
            </br>
            </br>
            Voici quelques exemples pour comprendre la syntaxe des règles de configuration
            </br>
            </br>
            - Ouverture du port 53 en TCP et UDP :
            </br>
            </br>
            <kbd>sudo ufw allow 53</kbd>
            </br>
            </br>
            - Ouverture du port 25 en TCP uniquement :
            </br>
            </br>
            <kbd>sudo ufw allow 25/tcp</kbd>
            </br>
            </br>
            </br>
            </br>
            Utilisation des services :
            </br>
            </br>
            UFW regarde dans sa liste de services connus pour appliquer les règles standards associées à ces services (apache2, smtp, imaps, etc..). Ces règles sont automatiquement converties en ports.
            </br>
            </br>
            Pour avoir la liste des services :
            </br>
            </br>
            <kbd>less /etc/services</kbd>
            </br>
            </br>
            Exemple : Autoriser le service SMTP :
            </br>
            </br>
            <kbd>sudo ufw allow smtp</kbd>
            </br>
            </br>
            2° exemple : Autoriser le port de Gnome-Dictionary (2628/tcp) :
            </br>
            </br>
            <kbd>sudo ufw allow out 2628/tcp</kbd>
            </br>
            </br>
            3° exemple : Autoriser le protocole pop3 sécurisé (réception du courrier de Gmail et autres messageries utilisant ce protocole sécurisé) :
            </br>
            </br>
            <kbd>sudo ufw allow out pop3s</kbd>
            </br>
            </br>
            </br>
            </br>
            Utilisation avancée :
            </br>
            </br>
            Règles complexes :
            </br>
            </br>
            L'écriture de règles plus complexes est également possible :
            </br>
            </br>
            - Refuser le protocole (proto) TCP à (to) tout le monde (any) sur le port (port) 80 :
            </br>
            </br>
            <kbd>sudo ufw deny proto tcp to any port 80</kbd>
            </br>
            </br>
            - Refuser à (to) l'adresse 192.168.0.1 de recevoir sur le port (port) 25 les données provenant (from) du réseau de classe A et utilisant le protocole (proto) TCP :
            </br>
            </br>
            <kbd>sudo ufw deny proto tcp from 10.0.0.0/8 to 192.168.0.1 port 25</kbd>
            </br>
            </br>
            - Refuser les données utilisant le protocole (proto) UDP provenant (from) de 1.2.3.4 sur le port (port) 514 :
            </br>
            </br>
            <kbd>sudo ufw deny proto udp from 1.2.3.4 to any port 514</kbd>
            </br>
            </br>
            - Refuser à l'adresse 192.168.0.5 de recevoir toutes données provenant du serveur web de la machine hébergeant le pare-feu :
            </br>
            </br>
            <kbd>sudo ufw deny out from 192.168.0.5 to any port 80</kbd>
         </div>
      </div>

        
    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>