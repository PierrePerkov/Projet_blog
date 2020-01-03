<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Redaction topic</title>
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
            <div class="new_topic">
                <h2>Ecrivez votre topic</h2>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td><label for="title">Titre: </label></td>
                            <td><input type="text" name="title" id="title"></td>
                        </tr>
                        <br>
                        <tr>
                            <td><label for="contents">Sujet: </label></td>
                            <td><textarea name="contents" id="contents" placeholder="Ecrivez votre contenu..." rows="5" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button name="send">Poster</button></td>
                        </tr>
                    </table>            
                </form>
            </div>
                
                <?php
                if(isset($_POST['title']) AND isset($_POST['contents']))
                {
                    if(!empty($_POST['title']) AND !empty($_POST['contents']))
                    {   
                        $title = htmlspecialchars($_POST['title']);
                        $contents = htmlspecialchars($_POST['contents']);
                        

                        $req = $bdd->prepare('INSERT INTO topics (title,contents,login,creation_date)VALUES(?,?,?,NOW())');
                        $req->execute(array($title,$contents,$_SESSION['login']));
                        $req-> closeCursor();
                        header('Location: forum.php');  
                    }
                    else
                    {
                        echo '<p class="msg">Il manque le titre ou le contenu de votre article</p>';
                    }
                }
            

            }
            ?>
        </div>          
    </body>
</html>

