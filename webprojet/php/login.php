<?php
require_once "connectdb.php";
session_start();
$Email = $_POST['Email'];
$Password = sha1($_POST['Password']);


    $x = $conn->prepare("select * from utilisateur where Email =?" ) ;
    $x->bind_param("s",$Email);
    $x->execute();
    $x_result = $x->get_result();
    if($x_result->num_rows > 0){
        $data = $x_result->fetch_assoc();
        if($data['Password']=== $Password){
            
            $_SESSION['Email'] = $Email;
            $_SESSION['Name'] = $data['Name'];
            $_SESSION['id']= $data['id'];
            if($data['etat']=='influenceur'){
                header('location:../php/bienvenueinf.php');
            }elseif($data['etat']=='marque') {
                header('location:../php/bienvenuemrq.php');
            }elseif($data['etat']=='admin') {
                header('location:../php/dashbord.php');
            }
           
        }else{
            echo '<script type="text/javascript"> alert("Email or Password  invalid") </script>';
            header('location:../html/login.html');
        }

    }else{
        echo '<script type="text/javascript"> alert("Email or Password  invalid") </script>';
        header('location:../html/login.html');
    }






?>