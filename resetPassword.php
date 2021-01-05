<?php
    session_start();
    include('db/connexionDB.php');
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
        <title>Réinitialisation mot de passe</title>
    </head>
    <body>
        <?php require_once('menu.php'); ?>
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
                    <h1>Réinitialisation du mot de passe</h1>
                </div>
            </div>
        </div>
        <?php
        $id = (int)$_GET['id'];
        $token_password = (String)htmlspecialchars($_GET['token_password']);
        $valid = 1;
        if(!isset($id))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }
        if(!isset($token_password))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }
        if($valid == 1)
        {
            $result2 = $db->query("SELECT id, token_password FROM user WHERE id = '$id' AND token_password = '$token_password'");
            $data_token = $result2->fetch();
            if($id == $data_token['id'] AND $token_password == $data_token['token_password'])
            {
                ?>
                <!-- Formulaire -->
                <form action="resetPassword.php?id=<?php echo $_GET['id'].'&token_password='.$_GET['token_password']; ?>" method="POST">
                    <div class="container">
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <label for="password">Votre nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <label for="password2">Confirmer ce nouveau mot de passe (obligatoire)</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <button type="submit" class="btn btn-primary" id="register" name="register">Valider</button>
                            </div>
                        </div>
                    </div>
                    <!-- Vérification -->
                    <?php
                        if(isset($_POST['register']))
                        {
                            $password = trim($_POST['password']); // On récupère le mot de passe 
                            $password2 = trim($_POST['password2']); //  On récupère la confirmation du mot de passe
                            $valid2 = 1;
                            // Si le mail est vide alors on ne traite pas
                            // Vérification du mot de passe
                            if(empty($password))
                            {
                                $valid2 = 0;
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-1.5">
                                            <strong style="color: red;"> Le mot de passe ne peut pas être vide !</strong>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(empty($password2))
                            {
                                $valid2 = 0;
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-1.5">
                                            <strong style="color: red;"> Veuillez confirmer votre mot de passe !</strong>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if($password !== $password2)
                            {
                                $valid2 = 0;
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-1.5">
                                            <strong style="color: red;"> La confirmation du mot de passe ne correspond pas !</strong>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if($valid2 == 1)
                            {
                                $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 18]); 
                                $req = $db->prepare('UPDATE user SET token_password = 0, confirmation_token_password =:confirmation_token_password, password =:password WHERE id = :id');
                                $req->execute(array('confirmation_token_password' => date('Y-m-d H:i:s'),'password' => $hash, 'id' => $data_token['id']));

                                $result4 = $db->query("SELECT nickname FROM user WHERE id = '$id'");
					            $data_log = $result4->fetch();
                                $_SESSION['nickname'] = $data_log['nickname'];
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
                <?php
            }
            else
            {
                $valid = 0;
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="group col-sm-1.5">
                            <strong style="color: red;"> Le lien est erroné </strong>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </body>
</html>