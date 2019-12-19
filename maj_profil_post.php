<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur :'.$e->getMessage());
}

// Changement d'email
if(isset($_POST['email']))
    {   $email = htmlspecialchars($_POST['email']);   
        if(!empty($_POST['email']))
        {
            $req1 = $bdd->prepare('SELECT email FROM inscription WHERE pseudo = ? ');
            $req1->execute(array($_SESSION['pseudo']));
            $resultat = $req1->rowCount();
            if($resultat['email'] == 0)      
            {
                $req = $bdd->prepare('UPDATE inscription SET email = ? WHERE pseudo = ?');
                $req->execute(array($email,$_SESSION['pseudo']));
                header('Location: page_utilisateur.php');            
            }
            else
            {
                echo 'vous avez entré la même adresse mail que celle déjà enregistrée.';
                
            }           
        }
        else
        {
            
            echo 'Vous n\'avez pas entré de nouvelle adresse e-mail.';
        }
    }
// Changement de ville
elseif(isset($_POST['ville']))
{   $ville = htmlspecialchars($_POST['ville']);   
    if(!empty($_POST['ville']))
    {
        $req1 = $bdd->prepare('SELECT ville FROM inscription WHERE pseudo = ? ');
        $req1->execute(array($_SESSION['pseudo']));
        $resultat = $req1->rowCount();
        if($resultat['ville'] == 0)      
        {
            $req = $bdd->prepare('UPDATE inscription SET ville = ? WHERE pseudo = ?');
            $req->execute(array($ville,$_SESSION['pseudo']));
            header('Location: page_utilisateur.php');            
        }
        else
        {
            header('Location: page_utilisateur.php');
        }           
    }
    else
    {
        echo 'Vous n\'avez pas entré de nouvelle ville.';
    }
}
// changement de travail
elseif(isset($_POST['travail']))
{   $travail = htmlspecialchars($_POST['travail']);  
    if(!empty($_POST['travail']))
    {
        $req1 = $bdd->prepare('SELECT travail FROM inscription WHERE pseudo = ? ');
        $req1->execute(array($_SESSION['pseudo']));
        $resultat = $req1->rowCount();
        if($resultat['travail'] == 0)      
        {
            $req = $bdd->prepare('UPDATE inscription SET travail = ? WHERE pseudo = ?');
            $req->execute(array($travail,$_SESSION['pseudo']));
            header('Location: page_utilisateur.php');            
        }
        else
        {
            header('Location: page_utilisateur.php');
        }           
    }
    else
    {
        echo 'Vous n\'avez pas entré de nouveau travail.';
    }
}
// changement de passions

elseif(isset($_POST['passions']))
{   $passions = htmlspecialchars($_POST['passions']);  
    if(!empty($_POST['passions']))
    {
        $req1 = $bdd->prepare('SELECT passions FROM inscription WHERE pseudo = ? ');
        $req1->execute(array($_SESSION['pseudo']));
        $resultat = $req1->rowCount();
        if($resultat['passions'] == 0)      
        {
            $req = $bdd->prepare('UPDATE inscription SET passions = ? WHERE pseudo = ?');
            $req->execute(array($passions,$_SESSION['pseudo']));
            header('Location: page_utilisateur.php');            
        }
        else
        {
            header('Location: page_utilisateur.php'); 
        }           
    }
    else
    {
        echo 'Vous n\'avez pas entré de nouvelle passions';
    }
}