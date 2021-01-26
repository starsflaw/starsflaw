<?php
require('db/connexionDB.php');                  // Fichier PHP contenant la connexion à la BDD
session_start();                                // On démarre la session
if(isset($_SESSION['nickname']))                // S'il y a un utilisateur connecté => redirection vers la page d'accueil
{ 
    ?>
    <script language="Javascript">
        document.location.replace("index.php");
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
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Mot de passe oublié</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    <h1 style="color:white">Mot de passe oublié ?</h1>
                    </br>
                </div>
            </div>
        </div>
        <?php // Formulaire pour la réinitialisation du mot de passe ?>
        <form action="password.php" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="email" style="color:rgba(55,150,255)">Votre adresse mail (obligatoire)</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($mail)){ echo $email; }?>" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        <button type="submit" class="btn btn-primary" id="forgotten" name="forgotten">Envoyer</button>
                    </div>
                </div>
            </div>
            <?php
            // Vérification du formulaire pour la réinitialisation du mot de passe
            if(isset($_POST['forgotten']))
            {
                $email = htmlspecialchars(strtolower(trim($_POST['email']))); // On récupère le mail
                $valid = 1;
                // Si le mail est vide => message d'erreur
                if(empty($email))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: red;"> Veuillez mettre votre adresse mail </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                // Si toutes les conditions sont remplies alors on fait le traitement
                if($valid == 1)
                {
                    // Requête préparée avec marqueurs nominatifs : Sélectionner le champ email de la table user lorsque email = $email
                    // $data_psswd est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                    $result2 = $db->prepare('SELECT email FROM user WHERE email = :email');
                    $result2->execute(array('email' => $email));
                    $data_psswd = $result2->fetch();

                    /* S'il existe une adresse email dans la base de données correspondant à l'adresse email rentrée,
                    alors on envoie un email avec un lien pour réinitialiser le mot de passe */
                    if($email == $data_psswd['email'])
                    {
                        $token = bin2hex(random_bytes(12));

                        // Requête préparée avec marqueurs nominatifs : Mettre à jour le champ token de la table user lorsque email = $email
                        $req = $db->prepare('UPDATE user SET token = :token WHERE email = :email');
                        $req->execute(array('token' => $token, 'email' => $email));

                        // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, nickname, email de la table user lorsque email = $email
                        // $data_email est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                        $result3 = $db->prepare('SELECT id, nickname, email FROM user WHERE email = :email');
                        $result3->execute(array('email' => $email));
                        $data_email = $result3->fetch();

                        // Création d'un email

                        $mail_to = $data_email['email'];

                        //=====Création du header de l'email.
                        $header = 'From: no-reply@gmail.com' . "\r\n" .'Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
                        //=======

                        // LIEN A MODIFIER QUAND ON AURA LE DOMAINE 
                        //=====Ajout du message au format HTML          
                        $content = 'Bonjour ' . $data_email['nickname'] . ',
                        Veuillez réinitialiser votre mot de passe en cliquant sur le lien : http://localhost/starsflaw/resetPassword.php?id=' . $data_email['id'] . '&token=' . $token;		
                        mail($mail_to, 'Réinitialisation de votre mot de passe', $content, $header);

                        // Une fois le mail envoyé => message de confirmation d'envoi
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="group col-sm-0">
                                    <strong style="color: rgba(0,176,0);"> Une demande de réinitialisation de mot de passe vous a bien été envoyé par mail</strong>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    // Si l'adresse email rentrée ne correspond à aucune adresse email de la base => message d'erreur
                    else
                    {
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="group col-sm-0">
                                    <strong style="color: red;"> Aucun compte associé a cet identifiant </strong>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </form>
    </body>
</html>