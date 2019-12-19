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
          <div class="conteneur">
          <?php
          try{
              $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
          }
          catch(Exception $e)
          {
              die('erreur : '.$e->getMessage());
          }
          if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
          {  
            include('header_auth.php');?>
            <div class="rediger_topic">
              <a href="rediger_topic.php"><button>Rediger un article</button></a>
            </div>           
            
            <?php 
          }
          else
          {
            include('header.php');  
          }
          // Affichage des differents topics
            $rep = $bdd->query('SELECT id,titre,contenu,pseudo,DATE_FORMAT(date_crea, "%d %m %Y à %Hh %mm %ss") as date_fr FROM topics');
            while($resultat = $rep->fetch())
            {?>
              
            <div class="topic">
              <div class="titre_topic">
                <h3><a href="commentaire.php?id=<?php echo $resultat['id'];?>"><?php echo $resultat['titre'];?></a></h3>
              </div>  
                <p class="titre_topic_p">Ecrit par: <?php echo $resultat['pseudo'];?></p>             
              <div class="contenu_topic">
                <p><?php echo substr($resultat['contenu'],0,300);?></p>
                <p><?php echo $resultat['date_fr'];?></p>
              </div>
              
            </div>
            <?php 
            }        
            ?>

          </div>    
        </body>
      </html>
