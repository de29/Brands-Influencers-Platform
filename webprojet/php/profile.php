<?php
require_once "connectdb.php";
session_start();
$x = $conn->prepare("select * from influenceur where Email =?" ) ;
$x->bind_param("s",$_SESSION['Email']);
$x->execute();
$x_result = $x->get_result();
$data = $x_result->fetch_assoc();
//$picture=$data['foto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mon profile</title>
	<link rel="stylesheet" href="../css/profil.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="left">
        <img src=" <?php if(!empty($data['foto'])){echo "../foto/$data[foto]";}else{ echo "../image/icon1.png";  }   ?>  " alt="user" width="75%" height="45%">
        <br><br>
        <h4>
        <?php            
              echo $_SESSION['Name'];
         ?> 
        </h4>
         <p>Influenceur</p>
    </br>
  <button class="btn"><a href="pageinfluenceur.php">Voir les marques</a></button>
</br></br>
    <button class="btn"><a href="messageinf.php">voir la messagerie</a></button>
  </br></br>
     <button class="btn"><a href="../html/contrat.html">ajouter contrat</a></button>
  </br></br>
  <button class="btn"><a href="demande.php">Demander la suppression du compte</a></button>
</br></br>
  <button class="btn"><a href="logout.php">Se deconnecter</a></button>

    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>
                    <?php
                    
                         echo $_SESSION['Email']; 
                     ?> 
                    </p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p>
                    <?php
                        if(!empty($data['tel']))
                        echo $data['tel']; 
                     ?> 
                    </p>
              </div>
              <div class="data">
                <h4>Ville</h4>
                  <p>
                  <?php
                    if(!empty($data['ville']))
                    echo $data['ville']; 
                     ?> 
                  </p>
            </div>
        </div>
      <br><br>
      <div class="projects">
            <h3>Reseaux Sociaux</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Facebook</h4>
                    <p>
                    <?php
                        if(!empty($data['facebook']))
                        echo $data['facebook'];  
                    ?>
                    </p>
                 </div>
                 <div class="data">
                   <h4>Instagram</h4>
                    <p>
                    <?php
                        if(!empty($data['instagram']))
                        echo $data['instagram'];  
                    ?>
                    </p>
              </div>
                  <div class="data">
                     <h4>Tik Tok</h4>
                    <p><?php
                        if(!empty($data['tiktok']))
                        echo $data['tiktok'];  
                    ?></p>
                   </div>
           
                    <div class="data"> 
                      <h4>Twitter</h4>
                     <p>
                     <?php
                        if(!empty($data['twitter']))
                        echo $data['twitter'];  
                    ?>
                     </p>
                     </div>
            
        </div>
        <br><br>
        <div class="projects">
          <h3>Modifier les parametres</h3>
          <form action="profileupdate.php" method ="post" enctype="multipart/form-data" onsubmit="return validate()" class="modifierP">
          <div class="formElements">
            <label for="modifierM">Tapez le nouveau email: </label>
            <input class="forminput" name="Email" id="modifierM" type="text"></input>
            <input type="submit" name="update" value="entrer" class="submitbtn">
           </div>
            <br>
            <div class="formElements">
              <label for="modifierT">Tapez le nouveau Name: </label>
              <input class="forminput" name="Name" id="modifierT" ></input>
              <input type="submit" name="update1" value="entrer" class="submitbtn">
            </div>
            <br>
            <div class="formElements">
              <label for="modifierMdp">Tapez le nouveau mot de passe: </label>
              <input class="forminput" name="Password" id="password" type="password"></input><br>
              <br><br>
              <label for="modifierMdp">Confirmer le nouveau mot de passe: </label>
              <input class="forminput" name="confirmpass" id="confirm password" type="password" onkeyup=check(this)></input>
              <div ><error id="alert" ></error></div>
              <br>
              <input type="submit" name="update2" value="entrer" class="submitbtn">
            </div>
            <br>
            <div class="formElements">
              <label for="modifierF">Tapez la nouvelle photo: </label>
              <input class="forminput" name="foto" id="modifierF" type="file"></input>
              <input type="submit" name="update3" value="entrer" class="submitbtn">
             
            </div>
            <div class="formElements">          
               <label for="modifierA">Tapez la nouvelle ville: </label>
              <input class="forminput" name="ville" id="modifierA" type="text"></input>
              <input type="submit" name="update4" value="entrer" class="submitbtn">
           
            </div>
            <br>
            <div class="formElements">
              <label for="modifierF">Tapez le nouveau facebook username: </label>
              <input class="forminput" name="facebook" id="modifierF" type="text"></input>
              <input type="submit" name="update5" value="entrer" class="submitbtn">
             
            </div>
            <br>
            <div class="formElements">
              <label for="modifierIg">Tapez le nouveau instagram: </label>
              <input class="forminput" name="instagram" id="modifierIg" type="text"></input>
              <input type="submit" name="update6" value="entrer" class="submitbtn">
            </div>
            <br>
            <div class="formElements">
              <label for="modifierTi">Tapez le nouveau Tiktok: </label>
            <input class="forminput" name="tiktok" id="modifierTi" type="text"></input>
            <input type="submit" name="update7" value="entrer" class="submitbtn">
            </div>
            <br>
            <div class="formElements">
              <label for="modifiertwi">Tapez le nouveau twitter: </label>
              <input class="forminput" name="twitter" id="modifiertwi" type="text"></input>
              <input type="submit" name="update8" value="entrer" class="submitbtn">
            </div>
            <div class="formElements">
              <label for="modifiertwi">Tapez le nouveau Numero de tel: </label>
              <input class="forminput" name="tel" id="modifiertwi" type="text"></input>
              <input type="submit" name="update9" value="entrer" class="submitbtn">
            </div>
 
 
          </form>
         
          
      </div>
      <br><br>
</div>
<script type="text/javascript" src="../js/register.js" ></script>
</body>
</html>