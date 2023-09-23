<?php
require_once "connectdb.php";
session_start();
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = sha1($_POST['Password']);
$ville = $_POST['ville'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$twitter = $_POST['twitter'];
$tel = $_POST['tel'];

$x = $conn->prepare("select * from utilisateur where Email =?" ) ;
$x->bind_param("s",$_SESSION['Email']);
$x->execute();
$x_result = $x->get_result();
$data = $x_result->fetch_assoc();
$_SESSION['id'] = $data['id'];
  

if(isset($_POST['update'])){
    $stmt = "SELECT * FROM utilisateur WHERE Email = '$Email' ";
      $result =$conn->query($stmt);
      
      if((($result->num_rows) <1)){
    
    $query = "UPDATE influenceur SET Email='$_POST[Email]' where id=$data[id] ";
    $query_run = mysqli_query($conn,$query);
    $query = "UPDATE utilisateur SET Email='$_POST[Email]' where id=$data[id] ";
    $query_run = mysqli_query($conn,$query);
    

    if($query_run){
        echo '<script type="text/javascript"> alert("email UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else {
        echo '<script type="text/javascript"> alert("email IS NOT UPDATED") </script>';
        header('location:profile.php');
    }}else{
        echo '<script type="text/javascript"> alert("email ALREADY EXIST") </script>';
        header('location:profile.php');
    }
}else {
    echo '<script type="text/javascript"> alert("email IS NOT UPDATED") </script>';
header('location:profile.php');
}
if(isset($_POST['update1'])){
    $stmt = "SELECT * FROM utilisateur WHERE Name = '$Name' ";
    $result =$conn->query($stmt);
    
    if((($result->num_rows) <1)){
    $query = "UPDATE influenceur SET Name='$_POST[Name]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);
    $query = "UPDATE utilisateur SET Name='$_POST[Name]' where id=$data[id] ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("name UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{ 
        echo '<script type="text/javascript"> alert("name IS NOT UPDATED") </script>';
        header('location:profile.php');
    }
}else{
        echo '<script type="text/javascript"> alert("name ALREADY EXIST") </script>';
        header('location:profile.php');
    }
} else {
    echo '<script type="text/javascript"> alert("name IS NOT UPDATED") </script>';
header('location:profile.php');
}

if(isset($_POST['update2'])){
    
    $query = "UPDATE influenceur SET Password='$Password' WHERE id=$data[id] ";
    $query_run = mysqli_query($conn,$query);
    $query = "UPDATE utilisateur SET Password='$Password' where id=$data[id] ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("password UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("password DOES NOT UPDATED") </script>';
        header('location:profile.php');
    }
}

          if(isset($_FILES['foto']) AND !empty($_FILES['foto']['name'])){
            $taillemax=2097152;
            $extensionvalide=array('jpg','jpeg','gif','png');
            if($_FILES['foto']['size'] <= $taillemax){
               $extensionUpload=strtolower(substr(strrchr($_FILES['foto']['name'],'.'),1));
                if(in_array($extensionUpload,$extensionvalide))
                {
                   $chemin = "../foto/".$_SESSION['Name'].".".$extensionUpload;
                   $foto= $_SESSION['Name'].".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['foto']['tmp_name'],$chemin);
                   if($resultat)
                   {
                    if(isset($_POST['update3'])){
    
                        $query = "UPDATE influenceur SET foto = '$foto'  WHERE id=$data[id] ";
                        $query_run = mysqli_query($conn,$query);
                    
                        if($query_run){
                            echo '<script type="text/javascript"> alert("Photo UPDATED SUCCUSSFULLY") </script>';
                            header('location:profile.php');
                            
                        }else{
                            echo '<script type="text/javascript"> alert("Photo IS NOT UPDATED") </script>';
                            header('location:profile.php');

                        }
                    }                                                              
                   } else $notice = "erreur ";
                }else {
                    echo '<script type="text/javascript"> alert("votre photo doit avoir le foramt jpg /jpeg") </script>';
                    header('location:profile.php');
                }
            }else{
                echo '<script type="text/javascript"> alert("votre photo depasse la taille limite de 2 Mo") </script>';
                header('location:profile.php');
            }
          }
if(isset($_POST['update4'])){
    
    $query = "UPDATE influenceur SET ville='$_POST[ville]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("ville UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("ville is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}
if(isset($_POST['update5'])){
    
    $query = "UPDATE influenceur SET facebook='$_POST[facebook]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("facebook name UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("facebook name is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}
if(isset($_POST['update6'])){
    
    $query = "UPDATE influenceur SET instagram='$_POST[instagram]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("instagram name UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("instagram name is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}
if(isset($_POST['update7'])){
    
    $query = "UPDATE influenceur SET tiktok='$_POST[tiktok]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("tiktok name UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("tiktok name is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}
if(isset($_POST['update8'])){
    
    $query = "UPDATE influenceur SET twitter='$_POST[twitter]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("twitter name UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("twitter name is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}
if(isset($_POST['update9'])){
    
    $query = "UPDATE influenceur SET tel='$_POST[tel]' WHERE id=$data[id]";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("Numero de tel UPDATED SUCCUSSFULLY") </script>';
        header('location:profile.php');
    }else{
        echo '<script type="text/javascript"> alert("Numero de tel is NOT UPDATED") </script>';
        header('location:profile.php');
    }
}





?>