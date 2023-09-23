<?php
require_once "connectdb.php";
session_start();
$id=$_GET['nb'];


    $query = "UPDATE partenariat SET etat = 'accepter' WHERE id=$id ;";
    $x=$conn->query($query);
   if($x){
   header('location:bienvenuemrq.php');
    echo '<script type="text/javascript"> alert("CONTRAT EST ACCEPTEE") </script>';

    
   }
else{
    header('location:bienvenuemrq.php');
    echo '<script type="text/javascript"> alert("CONTRAT ERREUR") </script>';
}



?>