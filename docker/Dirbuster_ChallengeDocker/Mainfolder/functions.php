<?php
function connexion(){
$connect = mysqli_connect("localhost", "root", "", "gestion"
        . "");
 if($connect == false)
 echo "echec de connexion" . mysqli_connect_error(). "<br />";
return $connect;

}   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ajoutUsers($nom, $prenom,$mail, $mdp1, $profession){
    $req ="insert into users (nom,prenom,email,mdp,profession) values (?,?,?,?,?)";
//Préparation de la requête
    $connect =mysqli_connect("localhost","root","","gestion");;
//liaison des paramètres 

$stmt = $connect->prepare($req);

$stmt->bind_param("sssss", $val1, $val2, $val3, $val4, $val5);

$val1 = $nom;
$val2 = $prenom;
$val3 = $mail;
$val4 = $mdp1;
$val5 = $profession;    
if ($val5 == 'on'){
    $val5= 'Salarié';
}
else
    $val5= 'Directeur';


/* Exécute la requête */
$stmt->execute();
if($stmt == false) echo "echec de l'exécution de la requête.<br />".mysqli_stmt_error() ;
else
    if(isset($_POST["mdp"])){
$mdp = $_POST["mdp"];
if (!preg_match("#^[A-Z][0-9A-Za-z]{6,}[0-9]$#", $_POST["mdp"])) {
    
        header('location:erreur.php');
        
}
}
else echo "Vous êtes bien enregisté !  <br />";
    
mysqli_stmt_close($stmt);
}

function ajoutCommentaire($nom, $prenom,$mail, $commentaire){
    $req ="insert into commentaire (nom,prenom,email,commentaire) values ("."'"."$nom"."'".","."'"."$prenom"."'".","."'"."$mail"."'".","."'"."$commentaire"."'".")";
    //var_dump($req); 
//Préparation de la requête
    $connect = connexion();
//liaison des paramètres 
    
$connect->query($req);

} 

function suppcomm($id){
    $req ="DELETE FROM commentaire WHERE id = "."'"."$id"."'"."";
    //var_dump($req); 
//Préparation de la requête
    $connect = connexion();
//liaison des paramètres 
    
$connect->query($req);

}
function vaild($status){
    $req ="INSERT INTO conges_demande WHERE status = "."'"."$status"."'"."";
    //var_dump($req); 
//Préparation de la requête
    $connect = connexion();
//liaison des paramètres 
    
$connect->query($req);

}


function nonvaild($status){
    $req ="INSERT INTO conges_demande WHERE status = "."'"."$status"."'"."";
    //var_dump($req); 
//Préparation de la requête
    $connect = connexion();
//liaison des paramètres 
    
$connect->query($req);

}


function addUsers($nom, $prenom,$mail, $mdp, $ville, $profession, $contrat, $postes,$phone){
    $req ="insert into users (nom,prenom,email,mdp,,adresse,ville,profession,contrat,postes,telephone) values (?,?,?,?,?,?,?,?,?,?)";
//Préparation de la requête
    $connect =mysqli_connect("localhost","root","","gestion");
//liaison des paramètres 

$stmt = $connect->prepare($req);

$stmt->bind_param("sssssss", $val1, $val2, $val3, $val4, $val5, $val6, $val7,$val8, $val9,$val10);

$val1 = $nom;
$val2 = $prenom;
$val3 = $mail;
$val4 = $mdp= mysqli_real_escape_string($connect, rand(10000000, 99999999)) ;
$val5 = $adresse;
$val6= $ville;
$val7= $profession;
$val8= $contrat;
$val9= $postes;
$val10= $phone;
if ($val7 == 'on'){
    $val7= 'Salarié';
}
else
    $val7= 'Directeur';

if($val8=='on'){
    
    $val8='CDI';
}
else
    $val8='CDD';


if($val9=='on'){
    $val9 = 'Administration';
}
else 
    $val9 ='¨Professeurs';

/* Exécute la requête */
$stmt->execute();
if($stmt == false) echo "echec de l'exécution de la requête.<br />".mysqli_stmt_error() ;
else echo "Vous avez bien enregistré un salarié !  <br />";
    
mysqli_stmt_close($stmt);
}

function askCong($nom, $prenom,$mail, $cong,$date1, $date2, $date3, $nbr){
    $req ="insert into conges_demandes (nom,prenom,user_id,type,date_demande,date_debut,date_fin,nombre) values (?,?,?,?,?,?,?,?)";
//Préparation de la requête
    $connect =mysqli_connect("localhost","root","","gestion");
//liaison des paramètres 

$stmt = $connect->prepare($req);

$stmt->bind_param("ssssssss", $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8);

$val1 = $nom;
$val2 = $prenom;
$val3 = $mail;
$val4 = $cong;
$val5 = $date1;
$val6= $date2;
$val7= $date3;
$val8= $nbr;
if ($val4 == 'on'){
    $val4= 'RTT';
}
else
    $val4= 'Conges payes';


/* Exécute la requête */
$stmt->execute();
if($stmt == false) echo "echec de l'exécution de la requête.<br />".mysqli_stmt_error() ;
else echo "Vous avez bien enregistré votre demande de congés!  <br />";
    
mysqli_stmt_close($stmt);
}

 ?> 

