<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="style_section.css">
    </head>
    <body>
        <?php include('header.php');
        ?>
        <div class="conteneur">
            <?php
            // ouverture de base de donnée
            try{
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
            }
            catch(Exception $e){
                die('erreur : '.$e->getMessage());
            }

            $pass_hache = password_hash($_POST['pwd_inscr'],PASSWORD_DEFAULT);
            $pseudo = htmlspecialchars($_POST['pseudo_inscr']);
            $email = htmlspecialchars($_POST['email_inscr']);
            $date_naiss = htmlspecialchars($_POST['date_naiss_inscr'])

            // condition d'inscription
            ?><div class="formulaire_envoi"><?php
            if(isset($_POST['pseudo_inscr']) AND isset($_POST['pwd_inscr']) AND isset($_POST['pwd_verif']) AND isset($_POST['email_inscr']) AND isset($_POST['date_naiss_inscr']))
            {    if(!empty($_POST['pseudo_inscr']) AND !empty($_POST['pwd_inscr']) AND !empty($_POST['pwd_verif']) AND !empty($_POST['email_inscr']) AND !empty($_POST['date_naiss_inscr']))
                {
                    if($_POST['pwd_inscr'] === $_POST['pwd_verif'])
                    {    
                        $req2 = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = ? AND motdepasse = ? AND email = ?');
                        $req2->execute(array($_POST['pseudo_inscr'],$_POST['pwd_inscr'],$_POST['email_inscr']));
                        $resultat = $req2->rowCount();
                            if($resultat == 0)
                            {
                                ?>
                                <h3>Felicitations!</h3>
                                <p>Votre pseudo et votre mot de passe ont bien été crées. Vous pouvez maintenant vous connecter</p> 
                                <?php $req = $bdd->prepare('INSERT INTO inscription(pseudo, motdepasse, email,date_naissance)VALUES(:pseudo,:motdepasse,:email,:date_naissance)');
                                $req->execute(array(
                                    'pseudo' => $pseudo,
                                    'motdepasse' => $pass_hache,
                                    'email' => $email,
                                    'date_naissance' => $date_naiss));                   
                            }
                            elseif($resultat == 1)
                            {
                                ?><p>Ce compte existe déjà</p><?php
                            }
                    }
                    else       
                    {
                        
                        ?><p>Les deux mots de passes sont differents</p>
                        <a href="page_inscriptions.php"><button></button></a><?php
                    }
                    
                    
                }
                else
                {
                    ?><p>Les champs ne sont pas complétés</p>
                    <a href="page_inscriptions.php"><button></button></a><?php
                }
            }            
            ?>
        </div>

</body>
<?php






        

