<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Redaction topic</title>
        <link rel="stylesheet" href="style_forum.css">
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
        if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
        {  
            include('header_auth.php');?>    
            <div class="new_topic">
                <h2>Ecrivez votre topic</h2>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td><label for="titre">Titre: </label></td>
                            <td><input type="text" name="titre" id="titre"></td>
                        </tr>
                        <br>
                        <tr>
                            <td><label for="contenu">Sujet: </label></td>
                            <td><textarea name="contenu" id="contenu" placeholder="Ecrivez votre contenu..." rows="5" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button name="envoi">Poster</button></td>
                        </tr>
                    </table>            
                </form>
            </div>
                
                <?php
                if(isset($_POST['titre']) AND isset($_POST['contenu']))
                {
                    if(!empty($_POST['titre']) AND !empty($_POST['contenu']))
                    {   
                        $titre = htmlspecialchars($_POST['titre']);
                        $contenu = htmlspecialchars($_POST['contenu']);
                        

                        $req = $bdd->prepare('INSERT INTO topics (titre,contenu,pseudo,date_crea)VALUES(?,?,?,NOW())');
                        $req->execute(array($titre,$contenu,$_SESSION['pseudo']));
                        $req-> closeCursor();
                        header('Location: forum.php');  
                    }
                    else
                    {
                        echo 'Il manque le titre ou le contenu de votre article';
                    }
                }
            

            }
            ?>          
    </body>
</html>

