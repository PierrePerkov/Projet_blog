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
        // si l'utilisateur est connecté affichage du header connecté 
        if(isset($_SESSION['login']) AND isset($_SESSION['id']))
        {  
          include('header_auth.php');         
        }    
        else
        {
            include('header.php');
        }
        ?>
        
        <?php
            if(isset($_GET['id']))
            {
                $req = $bdd->prepare('SELECT id,login,title,contents,DATE_FORMAT(creation_date, "%d %m %Y à %Hh %mm %ss") as date_fr FROM topics WHERE id = ?');
                $req->execute(array($_GET['id']));
                $results = $req->fetch();
                ?>               
                
                    
                <div class="topic_post">
                    <h3 class="title_topic_post"><?php echo $results['title'];?></h3>
                    <p class="title_topic_paragraphe">Ecrit par: <?php echo $results['login'];?></p>
                    <div class="contents_topic">
                        <p><?php echo $results['contents'];?></p>
                        <p><?php echo $results['date_fr'];?></p>
                    </div>
                </div>                  
                <?php
                $req->closeCursor();
                ?>              
                           
                <!-- affichage des commentaires en fonction du topic -->
                <div class="comments_space">
                    <div class="comments_container">
                    <?php
                    $req = $bdd->prepare('SELECT writer,contents,id_topic,DATE_FORMAT(comment_date, "%d %m %Y") as da_fr FROM comments WHERE id_topic = ?');
                    $req->execute(array($_GET['id']));
                    while($results = $req->fetch())
                    {                    
                    ?>
                        <div class="comments">
                            <h3 class="title_comm"><?php echo $results['writer'];?> </h3>                            
                                <div class="contents_comm">
                                <p><?php echo $results['contents'];?></p>
                                <p><?php echo $results['da_fr'];?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                    <?php
                    $req-> closeCursor();
                    ?>
                    <!-- formulaire POST pour permettre à l'utilisateur connecté de poster un commentaire -->
                    <div class="form_comm">
                        <h2>Votre commentaire</h2>
                        <form action="comments_post.php" method="POST">
                            <table>
                                <tr>
                                    <td><label for="writer">Auteur</label></td>
                                    <td><input type="text" name="writer" id="writer"></td>
                                </tr>
                                <tr>
                                    <td><label for="comments">Votre commentaire</label></td>
                                    <td><textarea name="comments" id="comments" placeholder="votre commentaire ici" rows="5" cols="50"></textarea></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <input class="post_comment" type="submit" name="envoi" value="poster mon commentaire">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        </form>  
                    </div>
                <?php
                }
                ?>
        </div>        
    </body>
</html>    
                    
                        
                                   
                
       
                
                
        
        

