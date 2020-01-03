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
        <div class="container">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
            }
            catch(Exception $e){
                die('erreur : '.$e->getMessage());
            }


            if(isset($_POST['login']) AND isset($_POST['pass']))
            {   $login = htmlspecialchars($_POST['login']);
                $pass = htmlspecialchars($_POST['pass']);
                if(!empty($login) AND !empty($pass))
                {   

                    $req = $bdd->prepare('SELECT pass,id FROM registration WHERE login = ?');
                    $req->execute(array($login));
                    $results = $req->fetch();
                    $user_exist = password_verify($pass,$results['pass']);

                    if(!$results)
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
                            $_SESSION['login'] = $login;
                            $_SESSION['id'] = $results['id'];
                            header('Location:member_area.php');
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
