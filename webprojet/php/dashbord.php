<?php
require_once "connectdb.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Nav-->
    <link rel="stylesheet" href="../css/allCSS/style.css">
    <!--Link khtar-->
    <link rel="stylesheet" href="../css/allCSS/khtar.css">
   
</head>
<body class="bodyKhtar">

  <!-- partial:index.partial.html -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<!--Notification-->

  <nav style="position :fixed;top: 0px;">
    <div class="menu">
      <div class="logo">
        <a href="#">ANDI</a>
      </div>
      <ul>
        <li><a href="dashbord.php">Acceuil</a></li>
        <li><a href="logout.php">Se déconnecter</a></li>
      </ul>
    </div>
  </nav>
  <br><br><br><br><br><br><br><br><br>
<!--Khtaar w tkheyiir-->
<div >
    <center><h1 >Influenceurs Connectés</h1></center>
    <div class="containerKhtar">
    <?php $query = "SELECT * FROM influenceur;";
           $x=$conn->query($query); 
        while ( $data = $x->fetch_assoc()){ ?>
    <div class="card card0">
    <div class="border">
    <h2><?php echo $data['Name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
</div>
</div>
<?php } ?>
</div>
</div>
<br><br>
<div >
  <center><h1>Marques Connectés</h1></center>
  <div class="containerKhtar">
  <?php $query = "SELECT * FROM marque;";
           $x=$conn->query($query); 
        while ( $data = $x->fetch_assoc()){ ?>
  <div class="card card0">
  <div class="border">
  <h2><?php echo $data['Name']; ?></h2>
  <p><?php echo $data['description']; ?></p>

  </div>
  </div>
  <?php } ?>
  </div>
</div>
<br><br><br>
<div>

<div >
  <center><h1>Utilsateurs qui veulent supprimer leurs comptes</h1></center>
  <div class="containerKhtar">
  <?php $query = "SELECT * FROM supprimer;";
           $x=$conn->query($query); 
        while ( $data = $x->fetch_assoc()){
          $query1 = "SELECT * FROM utilisateur WHERE id = $data[id];";
           $x1=$conn->query($query1); 
        while ( $data1 = $x1->fetch_assoc()){ 
          if($data1['etat']=='marque'){
            $query2 = "SELECT * FROM marque WHERE id = $data[id];";
           $x2=$conn->query($query2);
           $data2 = $x2->fetch_assoc();
          }elseif($data1['etat']=='influenceur'){
            $query2 = "SELECT * FROM influenceur WHERE id = $data[id];";
           $x2=$conn->query($query2);
           $data2 = $x2->fetch_assoc();
          } ?>
  <div class="card card0">
  <div class="border">
  <h2><?php echo $data2['Name']; ?></h2>
  <p><?php echo $data2['description']; ?></p>
  <center><a href="supprimer.php?nb=<?php echo $data['id'];  ?>"  class="blog-slider__button" name="supprimer">SUPPRIMER</a></center>

  </div>
  </div>
 <?php }}?>
  </div>
</div>
 </div>


</body>
</html>