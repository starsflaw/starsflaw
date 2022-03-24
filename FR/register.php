<?php
require('db/connexionDB.php');                  // Fichier PHP contenant la connexion à la BDD
session_start();                                // On démarre la session
if(isset($_SESSION['nickname']))                // S'il y a un utilisateur connecté => redirection vers la page d'accueil
{ 
  ?>
  <script language="Javascript">
    document.location.replace("index");
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
    <title>S'inscrire</title>
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
          <h1 style="color:white">Inscription</h1>
        </div>
      </div>
    </div>

    <?php // Formulaire d'inscription ?>
    <form action="register" method="POST">
      <div class="container">
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="nickname" style="color:rgba(55,150,255)">Votre pseudo (obligatoire)</label>
            <input type="text" class="form-control" id="nickname" name="nickname" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="email" style="color:rgba(55,150,255)">Votre adresse e-mail (obligatoire)</label>
            <input type="email" class="form-control" id="email" name="email" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="password" style="color:rgba(55,150,255)">Votre mot de passe (obligatoire)</label>
            <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="password2" style="color:rgba(55,150,255)">Confirmer ce nouveau mot de passe (obligatoire)</label>
            <input type="password" class="form-control" id="password2" name="password2" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label style="color:rgba(55,150,255)" for="captcha">Please enter 3 black symbols</label> 
            <img src="captcha.php" alt="captcha image" style="margin:0 0 0 3px;border:2px solid #2d3645;border-radius:10px;">
				    <input type="text" name="captcha" id="captcha" class="form-control" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white;margin:0 0 -10px 0;" required><br>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-0">
            <input class="form-check-input" type="checkbox" id="check" name="check">
            <label class="form-check-label" for="defaultCheck1" style="color:white; font-size:12px">
              J’ai lu et j’accepte <a target="_blank" href="terms-of-service">les conditions générales d'utilisation</a> </br>ainsi que <a target="_blank" href="confidentiality">la politique de confidentialité</a>
            </label>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-0">
            <button type="submit" class="btn btn-primary" id="register" name="register">S'inscrire</button>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-0">
            <p style="color:white">Vous avez déjà un compte ? <a href="login" style="color: rgba(55,150,255);">Connectez-vous</a> </p>
          </div>
        </div>
      </div>
    
      <?php
      // Vérification du formulaire d'inscription
      if(isset($_POST['register']))
      {
        $nickname = htmlspecialchars(trim($_POST['nickname'])); // On récupère le pseudonyme
        $email = htmlspecialchars(strtolower(trim($_POST['email']))); // On récupère le mail
        $password = trim($_POST['password']); // On récupère le mot de passe 
        $password2 = trim($_POST['password2']); //  On récupère la confirmation du mot de passe
        $valid = 1;
        // Vérification du pseudo
        // Si pas de pseudo => message d'erreur
        if(empty($nickname))
        {
          $valid = 0;
          echo "Le nom d'utilisateur ne peut pas être vide";
        }
        else
        {
          // On vérifie que le pseudo est disponible
          // Requête préparée avec marqueurs nominatifs : Sélectionner le champ nickname de la table user lorsque nickname = $nickname
          // $data est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
          $req_pseudo = $db->prepare('SELECT nickname FROM user WHERE nickname = :nickname');
          $req_pseudo->execute(array('nickname' => $nickname));
          $data = $req_pseudo->fetch();

          // Si data n'est pas vide => message d'erreur
          if($data)
          {
            $valid = 0;
            ?>
            <div class="container">
              <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                  <strong style="color: red;"> Ce pseudo est déjà pris </strong>
                  </br>
                  </br>
                  </br>
                  </br>
                </div>
              </div>
            </div>
            <?php
          }
        }
        // Vérification du mail
        // Si pas de mail => message d'erreur
        if(empty($email))
        {
          $valid = 0;
          echo "Le mail ne peut pas être vide";
        }
        // On vérifie que le mail est dans le bon format
        elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email))
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-1.5">
                <strong style="color: red;"> L'adresse e-mail n'est pas valide </strong>
                </br>
                </br>
                </br>
                </br>
              </div>
            </div>
          </div>
          <?php
        }
        else
        {
          // On vérifie que le mail est disponible
          // Requête préparée avec marqueurs nominatifs : Sélectionner le champ email de la table user lorsque email = $email
          // $data est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
          $req_email = $db->prepare('SELECT email FROM user WHERE email = :email');
          $req_email->execute(array('email' => $email));
          $data = $req_email->fetch();

          // Si data n'est pas vide => message d'erreur
          if($data)
          {
            $valid = 0;
            ?>
            <div class="container">
              <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                  <strong style="color: red;"> Cette adresse e-mail est déjà prise </strong>
                  </br>
                  </br>
                  </br>
                  </br>
                </div>
              </div>
            </div>
            <?php
          }
        }
        // Vérification du mot de passe
        // Si pas de mot de passe => message d'erreur
        if(empty($password))
        {
          $valid = 0;
          echo "Le mot de passe ne peut pas être vide";
        }
        // Si la taille du mot de passe < à 8 caractères ou ne comprend pas de majuscules, de minuscules, de chiffres ou de caractères spéciaux => message d'erreur
        if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $password))
        {
          $valid = 1;
        }
        else
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-1.5">
                <strong style="color: red;"> Le mot de passe doit contenir majuscules, minuscules, chiffres et caractères spéciaux et doit faire au moins 8 caractères</strong>
                </br>
                </br>
                </br>
                </br>
              </div>
            </div>
          </div>
          <?php
        }
        // Si mot de passe différent de confirmation de mot de passe => message d'erreur
        if($password !== $password2)
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-1.5">
                <strong style="color: red;"> La confirmation du mot de passe ne correspond pas </strong>
                </br>
                </br>
                </br>
                </br>
              </div>
            </div>
          </div>
          <?php
        }

        if($_SESSION["captcha"] !== $_POST["captcha"])
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-1.5">
                <strong style="color: red;"> Captcha n'est pas valide </strong>
                </br>
                </br>
                </br>
                </br>
              </div>
            </div>
          </div>
          <?php
        }
        
        if(empty($_POST['check']))
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-0">
                <strong style="color: red"> Vous ne pouvez pas créer de compte sans accepter les conditions générales d'utilisation et la politique de confidentialité </strong>
                </br>
                </br>
                </br>
                </br>
              </div>
            </div>
          </div>
          <?php
        }
        
        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid == 1)
        {
          $dateRegister = date('Y-m-d H:i:s');
          $hashpwd = password_hash($password, PASSWORD_DEFAULT, ['cost' => 8]); 
          $hashnickname = password_hash($nickname, PASSWORD_DEFAULT, ['cost' => 8]); 
          $token = bin2hex(random_bytes(12));
          // Requête préparée avec marqueurs nominatifs : On insert les données nickname, email, password, dateRegister et token dans les champs de la table user
          $req = $db->prepare('INSERT INTO user (nickname, email, password, dateRegister, token)
          VALUES(:nickname, :email, :password, :dateRegister, :token)');
          $req->execute(array(
          'nickname' => $hashnickname,
          //'nickname' => $nickname,
          'email' => $email,
          'password' => $hashpwd,
          'dateRegister' => $dateRegister,
          'token' => $token,
          ));

          // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, nickname et email de la table user lorsque email = $email
          // $data_email est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
          $result2 = $db->prepare('SELECT id, nickname, email FROM user WHERE email = :email');
          $result2->execute(array('email' => $email));
          $data_email = $result2->fetch();

          // Création d'un email
          
          $mail_to = $data_email['email'];

          //=====Création du header de l'email.
          $header = 'From: no-reply@gmail.com' . "\r\n" .'Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
          //=======

          // LIEN A MODIFIER QUAND ON AURA LE DOMAINE 
          //=====Ajout du message au format HTML          
          $content = 'Bonjour ' . $data_email['nickname'] . ',
          Veuillez confirmer votre compte en cliquant sur le lien : http://localhost/starsflaw/confAccount.php?id=' . $data_email['id'] . '&token=' . $token;		
          mail($mail_to, 'Confirmation de votre compte', $content, $header);

          // Une fois le mail envoyé => message de confirmation d'envoi
          ?>
          <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <strong style="color: rgba(0,176,0);"> Un e-mail de confirmation vous a été envoyé à votre adresse <?php echo $data_email['email'];?></strong>
                    </br>
                    </br>
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