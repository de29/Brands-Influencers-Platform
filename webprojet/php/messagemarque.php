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
  <title>Messagerie</title>
  <link rel="stylesheet" href="../css/messagemarque.css">
</head>
<body>

  <div class="container clearfix" >
    <div class="people-list" id="people-list">

      <ul class="list">
          <?php 
         $stmt=$conn->query("SELECT * FROM influenceur ; " );
        
         $msg=$conn->query("SELECT * FROM message;");
         while($data=$stmt->fetch_assoc()){
         while($check = $msg->fetch_assoc()){
             if(($check['destination']==$data['id'] AND $check['source']==$_SESSION['id']) OR ($check['source']==$data['id'] AND $check['destination']==$_SESSION['id']))  {
        echo "<li class=\"clearfix\">";
        echo "<div class=\"name\"><a href=\"messagemarque.php?value="; echo $data['id']; echo "\"> $data[Name]</a></div>";
        echo "</li>";
        break;
         }
        }
    }
        ?>
      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        <div class="chat-about">
          <div class="chat-with"><?php
          if(!empty($_GET['value'])){ 
         $afficher = $_GET['value'];
          $stmt=$conn->query("SELECT * FROM influenceur where id= $afficher; " );
          $data=$stmt->fetch_assoc();
          echo $data['Name'];
          }
          ?></div>
        </div>
        <i class="fa fa-star"></i>
      </div> 
      
      <div class="chat-history">
        <ul>
        <?php
        if(!empty($_GET['value'])){
        $afficher = $_GET['value'];
          $stmt=$conn->query("SELECT * FROM influenceur where id= $afficher; " );
          $data=$stmt->fetch_assoc();
         $msg=$conn->query("SELECT * FROM message;");
          while($check = $msg->fetch_assoc()){
            if(($check['destination']==$data['id'] AND $check['source']==$_SESSION['id']) OR ($check['source']==$data['id'] AND $check['destination']==$_SESSION['id']))  {
         if(($check['destination']==$data['id'])) {
         echo "<li class=\"clearfix\">";
           echo "<div class=\"message-data align-right\">";
            echo "<span class=\"message-data-time\" ></span> &nbsp; &nbsp;";
             echo "<span class=\"message-data-name\" >$_SESSION[Name]</span>";
              
            echo "</div>";
            echo "<div class=\"message other-message float-right\">";
               echo $check['msg'];
            echo "</div>";
          echo "</li>";
         }elseif(($check['source']==$data['id'])){
          echo "<li>";
            echo "<div class=\"message-data\">";
             echo "<span class=\"message-data-name\">$data[Name]</span>";
              echo "<span class=\"message-data-time\"></span>";
            echo "</div>";
            echo "<div class=\"message my-message\">";
              echo $check['msg'];
            echo "</div>";
          echo "</li>";
         }}}}
          ?>
        </ul>
        
      </div> 
      <form action="sendmarque.php?value=<?php if(!empty($_GET['value'])) echo $_GET['value']; ?>  "  method="post">
      <div class="chat-message clearfix">
        <textarea name="msg" id="message-to-send" placeholder ="Ecrire votre message ici" rows="3"></textarea>
                
          &nbsp;&nbsp;&nbsp;
        
       <input type="submit" name="envoyer" value="envoyer" >
       
  
      </div> 
      </form>
    </div> 
    
  </div> 
  
  <script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >Olia</span> 
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
  </script>
  
  <script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name">Vincent</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
  </script>
  <script src="messagerie.js"></script>
  
</body>
</html>