<?php

session_start();
require_once "connectdb.php";


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/influenceur.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">ANDI</a>
      </div>
      <ul>
        <li><a href="bienvenuemrq.php">Acceuil</a></li>
        <li><a href="">voir influenceur</a></li>
        <li><a href="messagemarque.php">messagerie</a></li>
        <li><a href="profilemrq.php">mon profil</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <input type="radio" name="dot" id="one">
    <input type="radio" name="dot" id="two">
    <div class="main-card">
        <?php
                         
            $stmt=$conn->query("SELECT * FROM influenceur  " );
          
          $count = 0; 
            while($data=$stmt->fetch_assoc()){
                if(($count % 3) == 0){
                    echo "<div class=\"cards\">"; 
                } 
          
        
           echo " <div class=\"card\">";
           echo "<div class=\"content\">";
          echo  "<div class=\"img\">";
          echo "<img src=\" ";
          if(($data['foto'])){echo "../foto/$data[foto]";}else{ echo "../image/icon1.png"; } 
          echo "\" alt=\"\">";
           echo "</div>";
           echo "<div class=\"details\">";
             echo "<div class=\"name\">";  echo $data['Name'];echo "</div>";
             echo "<div class=\"job\">influenceur</div>";
           echo "</div>";
           echo "<div class=\"media-icons\">";
             echo "<a href=\"www.facebook.com";  echo "/$data[facebook]";echo  "\">  <i class=\"fab fa-facebook-f\"></i></a>";
             echo "<a href=\"www.tiktok.com";  echo "/$data[tiktok]"; echo  "\"><i class=\"fab fa-tiktok\"></i></a>";
             echo "<a href=\"www.instagram.com";  echo "/$data[instagram]";echo  "\"><i class=\"fab fa-instagram\"></i></a>";
           echo "</div>";
           echo "<div class=\"sendText\">";
          
            echo "<button><a href=\"messagemarque.php?value=$data[id]\">Contacter&nbsp<span>&#9993;</span></a> </button>";
           echo "</div>";
         echo "</div>";
         echo "</div>";
         $count =$count +1 ;
         if(($count % 3) == 0 ){
         echo "</div>";
    }
}
if($count % 3 != 0){
echo "</div>";
}
       ?>
  
    </div>
    <div class="button">
      <label for="one" class=" active one"></label>
      <label for="two" class="two"></label>
    </div>
  </div>
  
</body>
</html>