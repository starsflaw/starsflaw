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
        <title>Modifier mon pseudo</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon pseudo</li>
                    </ol>
                </nav>
            </div> 
            <h1>Modifier mon pseudo</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <!-- Formulaire pseudo -->
        <form action="modifyName.php" method="POST">
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="staticEmail" style="color:rgba(55,150,255)">Pseudo actuel</label>
                    <p style="color: white"><?php echo $data2['nickname']; ?></p>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="nickname" style="color:rgba(55,150,255)">Nouveau pseudo</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    <button type="submit" class="btn btn-primary" id="modify" name="modify">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- Vérification pseudo -->
        <?php
        if(isset($_POST['modify']))
        {
            $nickname = htmlspecialchars(trim($_POST['nickname'])); // On récupère le pseudo
            $valid = 1;
            // Vérification du nom
            if(empty($nickname))
            {
                $valid = 0;
                echo "Le nom d'utilisateur ne peut pas être vide";
            }
            else
            {
                if($nickname != $data2['nickname'])
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
            }

            if($valid == 1)
            {              
                $req = $db->prepare('UPDATE user SET nickname =:nickname WHERE id = :id');
                $req->execute(array('nickname' => $nickname, 'id' => $data2['id']));
                $id = $data2['id'];
                $result3 = $db->query("SELECT nickname FROM user WHERE id= '$id'");
                $data_name = $result3->fetch();
                $_SESSION['nickname'] = $data_name['nickname'];
                ?>
                <script language="Javascript">
                document.location.replace("profil.php");
                </script>
                <?php
            }
        }
        ?>
        </form>   
    </body>
</html>