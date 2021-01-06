<?php
  include('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
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
    <link rel="stylesheet" href="style.css">
    <title>S'inscrire</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
  </head>

  <body>
    <?php require_once('menu.php'); ?>
    <div class="container">
      <div class="form-row justify-content-center">
        <div class="form-group col-sm-0">
          </br>
          </br>
          </br>
          <h1>Inscription</h1>
        </div>
      </div>
    </div>

    <!-- Formulaire d'inscription -->
    <form action="register.php" method="POST">
      <div class="container">
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="nickname">Votre nom ou votre pseudo (obligatoire)</label>
            <input type="text" class="form-control" id="nickname" name="nickname" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="email">Votre adresse mail (obligatoire)</label>
            <input type="email" class="form-control" id="email" name="email"required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="password">Votre mot de passe (obligatoire)</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <label for="password2">Confirmer ce nouveau mot de passe (obligatoire)</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-sm-5">
            <button type="submit" class="btn btn-primary" id="register" name="register">Valider</button>
          </div>
        </div>
      </div>
    
      <!-- Vérification -->
      <?php
      if(isset($_POST['register']))
      {
        $nickname = htmlspecialchars(trim($_POST['nickname'])); // On récupère le nom/pseudo
        $email = htmlspecialchars(strtolower(trim($_POST['email']))); // On récupère le mail
        $password = trim($_POST['password']); // On récupère le mot de passe 
        $password2 = trim($_POST['password2']); //  On récupère la confirmation du mot de passe
        $valid = 1;
        // Vérification du nom
        if(empty($nickname))
        {
          $valid = 0;
          echo "Le nom d'utilisateur ne peut pas être vide";
        }
        else
        {
          // On vérifit que le nom/pseudo est disponible
          $req_nickname = $db->prepare('SELECT nickname FROM user WHERE nickname =?');
          $req_nickname->execute([$nickname]);
          $data = $req_nickname->fetch();
          if($data)
          {
            $valid = 0;
            ?>
            <div class="container">
              <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                  <strong style="color: red;"> Ce nom/pseudo est déjà pris </strong>
                </div>
              </div>
            </div>
            <?php
          }
        }
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
        else
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
        // Vérification du mot de passe
        if(empty($password))
        {
          $valid = 0;
          echo "Le mot de passe ne peut pas être vide";
        }
        if($password !== $password2)
        {
          $valid = 0;
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="group col-sm-1.5">
                <strong style="color: red;"> La confirmation du mot de passe ne correspond pas </strong>
              </div>
            </div>
          </div>
          <?php
        }
        
        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid == 1)
        {
          $dateRegister = date('Y-m-d H:i:s');
          $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 16]); 
          // bin2hex(random_bytes($length))
          $token = bin2hex(random_bytes(12));
          $token_password = 0;
          // On insert nos données dans la table utilisateur
          $req = $db->prepare('INSERT INTO user (nickname, email, password, dateRegister, token, token_password)
          VALUES(:nickname, :email, :password, :dateRegister, :token, :token_password)');
          $req->execute(array(
          'nickname' => $nickname,
          'email' => $email,
          'password' => $hash,
          'dateRegister' => $dateRegister,
          'token' => $token,
          'token_password' => $token_password,
          ));

          $result2 = $db->query("SELECT * FROM user WHERE email= '$email'");
          $data_email = $result2->fetch();
          
          $mail_to = $data_email['email'];

          //=====Création du header de l'email.
          $header = 'From: no-reply@gmail.com' . "\r\n" .'Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
          //=======

          // LIEN A MODIFIER QUAND ON AURA LE DOMAINE 
          //=====Ajout du message au format HTML          
          $content = 'Bonjour ' . $data_email['nickname'] . ',
          Veuillez confirmer votre compte en cliquant sur le lien : http://localhost/projet/conf.php?id=' . $data_email['id'] . '&token=' . $token;		
          mail($mail_to, 'Confirmation de votre compte', $content, $header);

          $_SESSION['nickname'] = $data_email['nickname'];
          ?>
          echo '<script language="Javascript">
          <!--
          document.location.replace("index.php");
          // -->
          </script>';
          <?php
        }
      }
      ?>
    </form>   
  </body>
</html>