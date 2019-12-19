<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
 }
 catch(Exception $e)
 {
     die('erreur : '.$e->getMessage());
 }
 // inscription du commentaire dans la bdd
if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
{
    if(isset($_POST['id']) AND isset($_POST['auteur']) AND isset($_POST['commentaire']))
    {
        if(!empty($_POST['auteur']) AND !empty($_POST['commentaire']))
        {
            $auteur = htmlspecialchars($_POST['auteur']);
            $comm = htmlspecialchars($_POST['commentaire']);

            $req2 = $bdd->prepare('INSERT INTO commentaires(auteur,contenu,id_topic,date_comm)VALUES(:auteur,:contenu,:id_topic,NOW())');
            $req2->execute(array(
            'auteur' => $auteur,
            'contenu' => $comm,
            'id_topic' => $_POST['id']));                                        
            header('Location:commentaire.php?id='.$_POST['id'].''); 
        }
        else
        {
        echo 'Vous devez entrer Votre nom et votre commentaire'; 
        }
    }
}
else
{
echo 'Vous devez vous connecter pour poster un commentaire';  
}

?>