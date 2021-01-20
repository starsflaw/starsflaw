<?php
  require('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
  session_start();
  if(!isset($_SESSION['nickname']))
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Modifier mon mot de passe</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body style="background-color: rgba(61,72,92)">
        <?php require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        $result2 = $db->query("SELECT id, nickname FROM user WHERE nickname = '$nickname'");
        $data2 = $result2->fetch();
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="profil.php"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon mot de passe</li>
                    </ol>
                </nav>
            </div> 
            <h1>Modifier mon mot de passe</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <!-- Formulaire mot de passe -->
        <form action="modifyPassword.php" method="POST">
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Mot de passe actuel</label>
                    <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password2" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Confirmer nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password3" name="password3" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    <button type="submit" class="btn btn-primary" id="modify" name="modify">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- Vérification mot de passe -->
        <?php
        if(isset($_POST['modify']))
        {
            $password = trim($_POST['password']); // On récupère le mot de passe actuel
            $password2 = trim($_POST['password2']); // On récupère le nouveau mot de passe 
            $password3 = trim($_POST['password3']); //  On récupère la confirmation du nouveau mot de passe
            $valid = 1;
            // Vérification du mot de passe
            if(empty($password) OR empty($password2) OR empty($password3))
            {
                $valid = 0;
                echo "Le mot de passe ne peut pas être vide";
            }
            if($password2 !== $password3)
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
            
            if($valid == 1)
            {
                $result3 = $db->query("SELECT password FROM user WHERE nickname = '$nickname'");
                $data_psswd = $result3->fetch();
                if(password_verify($password, $data_psswd['password']))
                {
                    $hash = password_hash($password2, PASSWORD_DEFAULT, ['cost' => 18]); 
                    $req = $db->prepare('UPDATE user SET password =:password WHERE id = :id');
                    $req->execute(array('password' => $hash, 'id' => $data2['id']));
                    ?>
                    <script language="Javascript">
                    document.location.replace("profil.php");
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: red;"> Votre mot de passe est incorrect </strong>
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