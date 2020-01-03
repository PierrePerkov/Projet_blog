<?php
session_start();

?>
<!DOCTYPE html>
      <html lang="fr">
        <head>
          <meta charset="UTF-8">
          <title>Forum</title>
          <link rel="stylesheet" href="style_section.css">
        </head>
        <body>
          <div class="container">
          <?php
          try{
              $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
          }
          catch(Exception $e)
          {
              die('erreur : '.$e->getMessage());
          }
          if(isset($_SESSION['login']) AND isset($_SESSION['id']))
          {  
            include('header_auth.php');?>
            <div class="write_topic">
              <a href="write_topic.php"><button>Rediger un topic</button></a>
            </div>           
            
            <?php 
          }
          else
          {
            include('header.php');  
          }

          

          // Display different topics
            $response = $bdd->query('SELECT id,title,contents,login,DATE_FORMAT(creation_date, "%d %m %Y à %Hh %mm %ss") as date_fr FROM topics ORDER BY id DESC');
            while($results = $response->fetch())
            {?>
              
            <div class="topic">
              <div class="title_topic">
                <h3><a href="comments.php?id=<?php echo $results['id'];?>"><?php echo $results['title'];?></a></h3>
              </div>  
                <p class="title_topic_p">Ecrit par: <?php echo $results['login'];?></p>             
              <div class="contents_topic">
                <p><?php echo substr($results['contents'],0,300);?></p>
                <p><?php echo $results['date_fr'];?></p>
              </div>              
            </div>
            <?php
            $response->closeCursor(); 
            }
            ?>
          </div>    
        </body>
      </html>
