<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Page membre</title>
        <link rel="stylesheet" href="style_section.css">
    </head>
    <body>
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur :'.$e->getMessage());
        }


        if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
        {
            include('header_auth.php');?>

            <h2><?php echo $_SESSION['pseudo'];?></h2>
            <p>Voici votre profil</p>
            
            <?php

            $req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = ?');
            $req->execute(array($_SESSION['pseudo']));
            $resultat = $req->fetch();
            ?>
            <img src="membres/avatar<?php echo $resultat['avatar'];?>" width="100px">
            
            <table>
                <tr></tr>
                <td>Adresse email:</td>
                <td><?php echo  $resultat['email'];?></td>
                <td><form action="maj_profil.php" method ="POST"><button name="nv_email">Modifier</button></form></td>
                <tr></tr>
                <td>Ville</td>
                <td><?php echo $resultat['ville'];?></td>
                <td><form action="maj_profil.php" method ="POST"><button name="nv_ville">Modifier</button></form></td>
                <tr></tr>
                <td>Travail</td>
                <td><?php echo $resultat['travail'];?></td>
                <td><form action="maj_profil.php" method ="POST"><button name="nv_travail">Modifier</button></form></td>
                <tr></tr>
                <td>Passions</td>
                <td><?php echo $resultat['passions'];?></td>
                <td><form action="maj_profil.php" method ="POST"><button name="nv_passions">Modifier</button></form></td>
            </table>
            <br>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar">
                <input type="submit" value="valider">
            </form>
            <?php
            if(isset($_FILES['avatar']['name']) AND !empty($_FILES['avatar']['name']))
            {
                $tailleMax = 2097152;
                $extensionsValides = ['jpg','jpeg','gif','png'];
                if($_FILES['avatar']['size'] <= 2097152)
                {
                    $extensionsUpload = strtolower(substr(strchr($_FILES['avatar']['name'],'.'), 1));
                    if(in_array($extensionsUpload,$extensionsValides));
                    {
                        $chemin = 'membres/avatar'.$_SESSION['id'].'.'.$extensionsUpload;
                        $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                        if($resultat)
                        {
                            $update_avatar = $bdd->prepare('UPDATE inscription SET avatar = :avatar WHERE id = :id');
                            $update_avatar->execute(array(
                            'avatar' => $_SESSION['id'].'.'.$extensionsUpload,
                            'id' => $_SESSION['id']));
                            header('page_utilisateur.php');
                        }
                        else
                        {
                            echo '<p class="msg">Erreur durant l\'importation du fichier.</p>';
                        }
                    
                    }
                
                            
                    
                }
                else
                {
                    echo '<p class="msg">Fichier trop volumineux</p>';
                }
            }
        


        }
        else
        {
            include('header.php');
        }
        ?>
        <div class="conteneur">
        </div>
    </body>
</html>

