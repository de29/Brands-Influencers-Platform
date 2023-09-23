<?php
session_start();
require_once "connectdb.php";
if(isset($_POST['envoyer'])){
    
$destination = $_GET['value'];

$source = $_SESSION['id'];
$msg = $_POST['msg'];
}

if(!empty($msg)){
$stmt =$conn->prepare("INSERT INTO message (source,destination,msg) VALUES (?,?,?);  ");
$stmt ->bind_param("iis",$source,$_GET['value'],$msg);
$stmt->execute();
$show = $stmt->get_result();

if($show){
    echo '<script type="text/javascript"> alert("MESSAGE ENVOYER") </script>';
    header("location:messagemarque.php?value=$_GET[value]");
}else{
    echo '<script type="text/javascript"> alert("MESSAGE NON ENVOYER") </script>';
        header("location:messagemarque.php?value=$_GET[value]");
}
}else {
    echo '<script type="text/javascript"> alert("MESSAGE VIDE") </script>';
    header("location:messagemarque.php?value=$_GET[value]");
}

?>