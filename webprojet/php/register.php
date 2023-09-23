<?php
require_once "connectdb.php";

if(!empty($_POST))
{
  $Name = $_POST['Name'];
  $Email=$_POST['Email'];
  $Password=$_POST['Password'];
  $isSuccess=true;
  if(empty($Name)){
    $isSuccess = false;
  }
  if (empty($Email)) {
       $isSuccess = false;
    }
    if (empty($Password)) {
        $isSuccess = false;
    }
}
    if($isSuccess){
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = sha1($_POST['Password']);
$age = $_POST['age'];
$tel = $_POST['tel'];
$ville = $_POST['ville'];
$tiktok = $_POST['tiktok'];
$instagram = $_POST['instagram'];
$description = $_POST['description'];

      $stmt = "SELECT * FROM utilisateur WHERE Name='$Name' or Email = '$Email' ";
      $result =$conn->query($stmt);
      
      if((($result->num_rows) <1)){


    if(isset($_POST['registerinf'])){
        $stmt = $conn->prepare("insert into utilisateur(Name,Email,Password,etat) values(?,?,?,'influenceur')");
        $stmt->bind_param("sss",$Name,$Email,$Password);
        $stmt->execute();
        if($stmt){
            $stmt = "SELECT * FROM utilisateur WHERE Name='$Name'";
            $result =$conn->query($stmt);
            $result = $result->fetch_assoc();
            $id = $result['id'];
            $stmt = $conn->prepare("insert into influenceur(id,Name,Email,Password,age,ville,instagram,tiktok,description,tel) values(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("issssssssi",$id,$Name,$Email,$Password,$age,$ville,$instagram,$tiktok,$description,$tel);
            $stmt->execute();
        if($stmt){
            echo '<script type="text/javascript"> alert("Registration SUCCUSSFULL") </script>';
            header('location:../html/login.html');
        }}else{
            echo '<script type="text/javascript"> alert("Registration Not SUCCUSSFULL") </script>';
            header('location:../html/register.html');
        }
   }elseif(isset($_POST['registermrq'])){
        $stmt = $conn->prepare("insert into utilisateur(Name,Email,Password,etat) values(?,?,?,'marque')");
        $stmt->bind_param("sss",$Name,$Email,$Password);
        $stmt->execute();
        if($stmt){
            $stmt = "SELECT * FROM utilisateur WHERE Name='$Name'";
            $result =$conn->query($stmt);
            $result = $result->fetch_assoc();
            $id = $result['id'];
            $stmt = $conn->prepare("insert into marque(id,Name,Email,Password,age,ville,instagram,tiktok,description,tel) values(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("issssssssi",$id,$Name,$Email,$Password,$age,$ville,$instagram,$tiktok,$description,$tel);
            $stmt->execute();
        if($stmt){
            echo '<script type="text/javascript"> alert("Registration SUCCUSSFULL") </script>';
            header('location:../html/login.html');
         }}else{
            echo '<script type="text/javascript"> alert("Registration Not SUCCUSSFULL") </script>';
            header('location:../html/register.html');
        }
    }else{
        echo '<script type="text/javascript"> alert("SOMETHING WENT WRONG") </script>';
        header('location:../html/register.html');
    }

                
    $stmt->close();
    $conn->close();
      
    }
    }
    ?>