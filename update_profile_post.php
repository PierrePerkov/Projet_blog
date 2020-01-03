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
            $req1 = $bdd->prepare('SELECT email FROM registration WHERE login = ? ');
            $req1->execute(array($_SESSION['login']));
            $resultat = $req1->rowCount();
            if($resultat['email'] == 0)      
            {
                $req = $bdd->prepare('UPDATE registration SET email = ? WHERE login = ?');
                $req->execute(array($email,$_SESSION['login']));
                header('Location: user_profile.php');            
            }
            else
            {
                echo '<p class="msg">Vous avez entré la même adresse mail que celle déjà enregistrée.</p>';
                
            }           
        }
        else
        {
            
            echo '<p class="msg">Vous n\'avez pas entré de nouvelle adresse e-mail.</p>';
        }
    }
// Changement de city
elseif(isset($_POST['city']))
{   $city = htmlspecialchars($_POST['city']);   
    if(!empty($_POST['city']))
    {
        $req1 = $bdd->prepare('SELECT city FROM registration WHERE login = ? ');
        $req1->execute(array($_SESSION['login']));
        $resultat = $req1->rowCount();
        if($resultat['city'] == 0)      
        {
            $req = $bdd->prepare('UPDATE registration SET city = ? WHERE login = ?');
            $req->execute(array($city,$_SESSION['login']));
            header('Location: user_profile.php');            
        }
        else
        {
            header('Location: user_profile.php');
        }           
    }
    else
    {
        echo '<p class="msg">Vous n\'avez pas entré de nouvelle ville.</p>';
    }
}
// changement de job
elseif(isset($_POST['job']))
{   $job = htmlspecialchars($_POST['job']);  
    if(!empty($_POST['job']))
    {
        $req1 = $bdd->prepare('SELECT job FROM registration WHERE login = ? ');
        $req1->execute(array($_SESSION['login']));
        $resultat = $req1->rowCount();
        if($resultat['job'] == 0)      
        {
            $req = $bdd->prepare('UPDATE registration SET job = ? WHERE login = ?');
            $req->execute(array($job,$_SESSION['login']));
            header('Location: user_profile.php');            
        }
        else
        {
            header('Location: user_profile.php');
        }           
    }
    else
    {
        echo '<p class="msg">Vous n\'avez pas entré de nouveau travail.</p>';
    }
}
// changement de hobbies

elseif(isset($_POST['hobbies']))
{   $hobbies = htmlspecialchars($_POST['hobbies']);  
    if(!empty($_POST['hobbies']))
    {
        $req1 = $bdd->prepare('SELECT hobbies FROM registration WHERE login = ? ');
        $req1->execute(array($_SESSION['login']));
        $resultat = $req1->rowCount();
        if($resultat['hobbies'] == 0)      
        {
            $req = $bdd->prepare('UPDATE registration SET hobbies = ? WHERE login = ?');
            $req->execute(array($hobbies,$_SESSION['login']));
            header('Location: user_profile.php');            
        }
        else
        {
            header('Location: user_profile.php'); 
        }           
    }
    else
    {
        echo '<p class="msg">Vous n\'avez pas entré de nouveaux hobbies.</p>';
    }
}