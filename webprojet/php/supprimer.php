<?php
require_once "connectdb.php";
session_start();

$query = "DELETE  FROM utilisateur WHERE id=$_GET[nb];";
$x=$conn->query($query);
$query = "SELECT * FROM supprimer WHERE id=$_GET[nb];";
$info=$conn->query($query);
$data1 = $info->fetch_assoc();
if($data1['etat']=='marque'){
    $query = "DELETE  FROM marque WHERE id=$_GET[nb];";
    $x=$conn->query($query);
    echo '<script type="text/javascript"> alert("COMPTE EST SUPPRIMEE DE LA MARQUE") </script>';
}elseif($data1['etat']=='influenceur'){
    $query = "DELETE  FROM influenceur WHERE id=$_GET[nb];";
    $x=$conn->query($query);
    echo '<script type="text/javascript"> alert("COMPTE EST SUPPRIMEE DE INFLUENCEUR") </script>';
}else{
    echo '<script type="text/javascript"> alert("COMPTE NON SUPPRIMER") </script>';
}
echo '<script type="text/javascript"> alert("COMPTE SUPPRIMER") </script>';
header('location:dashbord.php');

?>