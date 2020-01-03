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
        if(isset($_SESSION['login']) AND isset($_SESSION['id']))
        {  
            include('header_auth.php');         
        }    
        else
        {
            include('header.php');
        }
            // inscription du commentaire dans la bdd
            if(isset($_SESSION['login']) AND isset($_SESSION['id']))
            {
                if(isset($_POST['id']) AND isset($_POST['writer']) AND isset($_POST['comment']))
                {
                    if(!empty($_POST['writer']) AND !empty($_POST['comment']))
                    {
                        $writer = htmlspecialchars($_POST['writer']);
                        $comment = htmlspecialchars($_POST['comment']);

                        $req2 = $bdd->prepare('INSERT INTO comments(writer,contents,id_topic,comment_date)VALUES(:writer,:contents,:id_topic,NOW())');
                        $req2->execute(array(
                        'writer' => $writer,
                        'contents' => $comment,
                        'id_topic' => $_POST['id']));                                        
                        header('Location:comments.php?id='.$_POST['id'].''); 
                    }
                    else
                    {
                    echo '<p class="msg">Vous devez entrer votre nom et votre commentaire</p>'; 
                    }
                }
            }
            else
            {
            echo '<p class="msg">Vous devez vous connecter pour poster un commentaire</p>';  
            }

            ?>