<?php require_once "connectdb.php";
       session_start();
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>ANDI</title>
    <link rel="stylesheet" href="../css/allCSS/style.css">
    <link rel="stylesheet" href="../css/allCSS/dekhla.css">
    <!--Link CSlider-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
    <link rel="stylesheet" href="../css/allCSS/CSlider.css">
    <!--LInk Marque-->
    <link rel="stylesheet" href="../css/allCSS/marquess.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--Link Hello-->
    <link rel="stylesheet" href="../css/allCSS/hello.css">
    <!--Link khtar-->
    <link rel="stylesheet" href="../css/allCSS/khtar.css">
    <!--Carta-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/allCSS/carta.css">
     

</head>
<body>
    <nav style="position :fixed;top: 0px;">
        <div class="menu">
          <div class="logo">
            <a href="bienvenuemrq.php">ANDI</a>
          </div>
          <ul>
            <li><a href="bienvenuemrq.php">Acceuil</a></li>
            <li><a href="pagemarque.php">voir influenceurs</a></li>
            <li><a href="messagemarque.php">messagerie</a></li>
            <li><a href="profilemrq.php">mon profil</a></li><!-- OR PROFILE INF-->
            <li><a href="#"></a></li>
          </ul>
        </div>
      </nav>
<!--Dekhla-->
<!-- partial:index.partial.html -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:800" rel="stylesheet">

<!-- Add as many .line elements as you want.
These can contain any kind of content. -->
<div class="bodyDekhla">
    <div class="line">
      La vie est un défi à relever
</div>

<div class="line">
	un bonheur à mériter
</div>

<div class="line">
  une aventure à tenter
</div>


</div>


<!--HEllo-->
<div class="Hello">
  <div class="containerHello">
    <video class="video-bg" autoplay muted loop>
      <source src="http://www.georgewpark.com/video/blurred-street.mp4" type="video/mp4" />
      <source src="http://www.georgewpark.com/video/blurred-street.webm" type="video/webm" />
    </video>
  <div class="contentHello">
  <h1>TROUVER <br> VOTRE PARTENAIRE</h1>
  <p style="color: #fff;">ANDI vous permet de trouver votre partenaire en un seul clic!<br>
  Vous pouvez maintenir une conversation et s'accorder sur un contrat!</p>
  <button class="btn"><a href="../php/pagemarque.php">Start now</a></button>
  </div>
  </div>
</div>



<!-- partial:index.partial.html -->
<div class="bodyCSlider" id="contrats">
    <div class="blog-slider">
  
    <div class="blog-slider__wrp swiper-wrapper">
    <?php $query = "SELECT * FROM influenceur;";
           $x=$conn->query($query); 
        while ( $data = $x->fetch_assoc()){ ?>
      <div class="blog-slider__item swiper-slide">
        <div class="blog-slider__img">
          
          <img src="<?php if(($data['foto'])){echo "../foto/$data[foto]";}else{ echo "../image/icon1.png"; }?>" alt="">
        </div>
        <div class="blog-slider__content">
         
          <div class="blog-slider__title"><?php echo $data['Name'];?></div>
          <div class="blog-slider__text"><?php echo $data['description'];?> </div>
          <a href="profileMC.php?id=<?php echo $data['id']?>" class="blog-slider__button">VOIR LES DETAILS</a>
        </div>
      </div>
      <?php }?>
      
    </div>
    
    <div class="blog-slider__pagination"></div>
 
  </div>
 
</div>

<!--Les cartas-->
<div class="bodyCarta">
  <center><h1 style="margin-top: 80px;color: white;"><br><br>LES CONTRATS SIGNEES</h1></center>
<ul class="cards">
  <?php 
         $query = "SELECT * FROM partenariat WHERE marque='$_SESSION[Name]';";
           $x=$conn->query($query); 
        while ( $data = $x->fetch_assoc()){ 
          ?>
  <li class="carda">
    <h1>Contract entre  <?php   echo $data['influenceur']?> et  <?php   echo $data['marque']?> </h1>
    
    <p> Ce contrat à été fait le 
      <?php   
           echo $data['date_debut'];     
?>
. Ce contrat lie   <strong>      <?php   echo $data['influenceur']?> </strong>et             <strong> <?php   echo $data['marque']?>. </strong><br>
      <b>II. ACCORD - </b> La marque et l'influenceur reconnaissent les termes de ce contrat et s'y conformeront. <br>
      <b>III. TERMES-</b>  Le contrat commence le  <strong>   <?php   echo $data['date_debut']?>  </strong>        et se termine le    <strong>   <?php   echo $data['date_fin']?> </strong>       . Un nouveau contrat sera créé pour le renouvellement du mandat. <br>
      <b>IV. PAIEMENT -</b>  Le montant total du paiement s'élève à $  <strong>  <?php   echo $data['montant']?>  </strong>          . Le paiement sera fait par     <strong>   <?php   echo $data['methodpm']?>  </strong>       . Le paiement doit être effectué au début ou pendant la campagne. L'influenceur sera responsable du paiement des taxes appropriées. <br></p>
      <?php if($data['etat']=='en cours'){?>
        
      <center><a href="accepter.php?nb=<?php echo $data['id'];  ?>"  class="blog-slider__button" name="accepter">ACCEPTER</a></center>
      <center><a href="refuser.php?nb=<?php echo $data['id'];  ?> " class="blog-slider__button" name="refuser">REFUSER</a></center>
      
    </li>
  <?php  } }?>   
  </ul>
</div>






<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/SplitText.min.js'></script><script  src="../js/allJS/dekhla.js"></script>

<!-- partial Cslider -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="../js/allJS/CSlider.js"></script>

<!-- partial Carta -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cash/1.3.0/cash.min.js'></script>
<script src='https://codepen.io/shshaw/pen/epmrgO.js'></script><script  src="../js/allJS/carta.js"></script>


</body>
</html>