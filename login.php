<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="style_section.css">
    </head>
    <body>
        <?php 
        include('header.php');
        ?>
        <div class="conteneur">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
            }
            catch(Exception $e){
                die('erreur : '.$e->getMessage());
            }


            if(isset($_POST['pseudo']) AND isset($_POST['motdepasse']))
            {   $pseudo = htmlspecialchars($_POST['pseudo']);
                $motdepasse = htmlspecialchars($_POST['motdepasse']);
                if(!empty($pseudo) AND !empty($motdepasse))
                {   

                    $req = $bdd->prepare('SELECT motdepasse,id FROM inscription WHERE pseudo = ?');
                    $req->execute(array($pseudo));
                    $resultat2 = $req->fetch();
                    $user_exist = password_verify($motdepasse,$resultat2['motdepasse']);

                    if(!$resultat2)
                    {   
                        ?>
                        <div class="msg_err">
                            <p>Mot de passe ou pseudo incorrect'</p>
                        </div>
                        <?php
                    }                    
                    else
                    {
                        if($user_exist)
                        {
                            session_start();
                            $_SESSION['pseudo'] = $pseudo;
                            $_SESSION['id'] = $resultat2['id'];
                            header('Location:page_membre.php');
                        }
                        else
                        {   
                            ?>
                            <div class="msg_err">
                                <p>mot de passe ou pseudo incorrect</p>
                            </div>
                            <?php
                        }
                    }
                }
                else
                {
                    ?>
                    <div class="msg_err">
                        <p>Veuillez remplir les champs indiqués</p>
                    </div>
                    <?php  
                }
            }?>
            
            
        </div> 



    </body>
</html>
