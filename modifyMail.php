<?php
  require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
  session_start();                              // On démarre la session
  if(!isset($_SESSION['nickname']))             // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
  { 
    ?>
    <script language="Javascript">
    document.location.replace("register.php");
    </script>
    <?php
  }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php // Balises meta responsive ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <?php // Bootstrap CSS ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <?php // jQuery and Bootstrap JS ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <?php // Feuille de style ?>
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Modifier mon adresse e-mail</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body style="background-color: rgba(61,72,92)">
        <?php require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        $result2 = $db->prepare('SELECT id, nickname, email FROM user WHERE nickname = :nickname');
        $result2->execute(array('nickname' => $nickname));
        $data2 = $result2->fetch();
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="profil.php"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon adresse e-mail</li>
                    </ol>
                </nav>
            </div> 
            <h1>Modifier mon adresse e-mail</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <!-- Formulaire mail -->
        <form action="modifyMail.php" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="staticEmail" style="color:rgba(55,150,255)">Adresse e-mail actuelle</label>
                        <p style="color: white"><?php echo $data2['email']; ?></p>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="email" style="color:rgba(55,150,255)">Nouvelle adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        <button type="submit" class="btn btn-primary" id="modify" name="modify">Enregistrer</button>
                    </div>
                </div>
            </div>
            <!-- Vérification mail -->
            <?php
            if(isset($_POST['modify']))
            {
                // $nickname = htmlspecialchars(trim($_POST['nickname'])); // On récupère le nom/pseudo
                $email = htmlspecialchars(strtolower(trim($_POST['email']))); // On récupère le mail
                $valid = 1;
                // Vérification du mail
                if(empty($email))
                {
                    $valid = 0;
                    echo "Le mail ne peut pas être vide";
                }
                // On vérifit que le mail est dans le bon format
                elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-1.5">
                                <strong style="color: red;"> Le mail n'est pas valide </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                elseif($email != $data2['email'])
                {
                    // On vérifit que le mail est disponible
                    $req_email = $db->prepare('SELECT email FROM user WHERE email =?');
                    $req_email->execute([$email]);
                    $data = $req_email->fetch();
                    if($data)
                    {
                        $valid = 0;
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="group col-sm-1.5">
                                    <strong style="color: red;"> Cet email est déjà pris </strong>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                if($valid == 1)
                {              
                    $idUser = $data2['id'];
                    $result3 = $db->prepare('SELECT nickname, id FROM user WHERE id = :id');
                    $result3->execute(array('id' => $idUser));
                    $data_email = $result3->fetch();
                    
                    $mail_to = $email;
                    $token = bin2hex(random_bytes(12));
                    $req = $db->prepare('UPDATE user SET token =:token, validation =:validation WHERE id = :id');
                    $req->execute(array('token' => $token, 'validation' => $email, 'id' => $idUser));

                    //=====Création du header de l'email.
                    $header = 'From: no-reply@gmail.com' . "\r\n" .'Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
                    //=======

                    // LIEN A MODIFIER QUAND ON AURA LE DOMAINE 
                    //=====Ajout du message au format HTML          
                    $content = 'Bonjour ' . $data_email['nickname'] . ',
                    Veuillez confirmer votre nouvelle adresse mail en cliquant sur le lien : http://localhost/starsflaw/confMail.php?id=' . $data_email['id'] . '&token=' . $token;		
                    mail($mail_to, 'Confirmation de votre nouvelle adresse mail', $content, $header);            
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: rgba(0,176,0);"> Un mail de confirmation vous a été envoyé à votre nouvelle adresse </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </form>   
    </body>
</html>