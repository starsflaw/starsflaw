<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'fonctions.php';
$connect= connexion();
var_dump($_POST);
  if (isset ($_POST["identification"]))  
      $prof = $_POST['prof'];
      $pas = $_POST['mdp'];
      $login = $_POST['mail'];
      var_dump("a");
      
      
$req = "SELECT * FROM users WHERE email ='".$login."' and mdp ='".$pas."' and profession = '".$prof."'";     
if ($result = mysqli_query($connect,$req)) {
    $row = $result->fetch_assoc(); 
    $prof = $row["profession"];
    printf("Select a retourné %d lignes.\n", mysqli_num_rows($result)); 
    if(mysqli_num_rows($result)==0){
        header('location:login.php'); 
    }

    
   
    if($prof == 'directeur'){
        header('location:consultesalarie.php'); 
        
        
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["directeur"]=[$prof,$login,$pas];
header('location:consultesalarie.php'); 
        
    }elseif ($prof == 'salarie'){
         header('location:gestionProfil.php');
    } mysqli_free_result($result);
}


  
?> 

