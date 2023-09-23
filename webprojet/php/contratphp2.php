<?php
require_once "connectdb.php";
session_start();

$Name = $_POST['Name'];
$Email= $_POST['Email'];
$ville = $_POST['ville'];
$Namemrq = $_POST['Namemrq'];
$Emailmrq= $_POST['Emailmrq'];
$villemrq= $_POST['villemrq'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$montant = $_POST['montant'];
$methodpm = $_POST['methodpm'];
if(isset($_POST['confirmer'])){
$query = "SELECT * FROM utilisateur WHERE Name='$Name' AND Email='$Email' ;";
$x=$conn->query($query);
if($x->num_rows >0){
$query = "SELECT * FROM utilisateur WHERE Name='$Namemrq' AND Email='$Emailmrq' ;";
$x=$conn->query($query);
if($x->num_rows >0){

$insert=$conn->prepare("INSERT INTO partenariat (marque,influenceur,etat,date_debut,date_fin,montant,methodpm) VALUES (?,?,'en cours',?,?,?,?); ");
$insert ->bind_param("ssssis",$Namemrq,$Name,$date_debut,$date_fin,$montant,$methodpm);
$insert->execute();
if($insert){
    echo '<script type="text/javascript"> alert("Contrat EST AJOUTEE SUCCUSSFULLY") </script>';
    header('location:../html/bienvenueinf.html');
}else{
    echo '<script type="text/javascript"> alert("Contrat Ne pas AJOUTEE SUCCUSSFULLY") </script>';
    header('location:../html/contrat.html');
}
}
}
}




?>