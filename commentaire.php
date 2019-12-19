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
        
        <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
        }
        catch(Exception $e)
        {
            die('erreur : '.$e->getMessage());
        }
        // si l'utilisateur est connecté affichage du header connecté 
        if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
        {  
          include('header_auth.php');         
        }    
        else
        {
            include('header.php');
        }
        ?>
        <div class="conteneur">
        <?php
            if(isset($_GET['id']))
            {
                $req = $bdd->prepare('SELECT id,pseudo,titre,contenu,DATE_FORMAT(date_crea, "%d %m %Y à %Hh %mm %ss") as date_fr FROM topics WHERE id = ?');
                $req->execute(array($_GET['id']));
                $resultat2 = $req->fetch();
                ?>               
                
                    
                <div class="topic_post">
                    <h3 class="titre_topic_post"><?php echo $resultat2['titre'];?></h3>
                    <p class="titre_topic_paragraphe">Ecrit par: <?php echo $resultat2['pseudo'];?></p>
                    <div class="contenu_topic">
                        <p><?php echo $resultat2['contenu'];?></p>
                        <p><?php echo $resultat2['date_fr'];?></p>
                    </div>
                </div>                  
                              
                           
                <!-- affichage des commentaires en fonction du topic -->
                <div class="espace_comm">
                    <div class="commentaires_conteneur">
                    <?php
                    $req = $bdd->prepare('SELECT auteur,contenu,id_topic,DATE_FORMAT(date_comm, "%d %m %Y") as da_fr FROM commentaires WHERE id_topic = ?');
                    $req->execute(array($_GET['id']));
                    while($resultat = $req->fetch())
                    {                    
                    ?>
                        <div class="commentaire">
                            <h3 class="titre_comm"><?php echo $resultat['auteur'];?> </h3>                            
                                <div class="contenu_comm">
                                <p><?php echo $resultat['contenu'];?></p>
                                <p><?php echo $resultat['da_fr'];?></p>
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
                        <form action="commentaire_post.php" method="POST">
                            <table>
                                <tr>
                                    <td><label for="auteur">Auteur</label></td>
                                    <td><input type="text" name="auteur" id="auteur"></td>
                                </tr>
                                <tr>
                                    <td><label for="commentaire">Votre commentaire</label></td>
                                    <td><textarea name="commentaire" id="commentaire" placeholder="votre commentaire ici" rows="5" cols="50"></textarea></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <input type="submit" name="envoi" value="poster mon commentaire">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        </form>  
                    </div>
                <?php
                }
                ?>
        </div>        
    </body>
</html>    
                    
                        
                                   
                
       
                
                
        
        

