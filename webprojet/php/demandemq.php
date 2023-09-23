<?php
require_once "connectdb.php";
session_start();

$query = "INSERT INTO supprimer (id,etat) VALUES ($_SESSION[id],'marque');";
$x=$conn->query($query);

header('location:profilemrq.php');
echo '<script type="text/javascript"> alert("DEMANDE ENVOYER") </script>';
?>