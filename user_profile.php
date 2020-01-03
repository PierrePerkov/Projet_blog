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
        <div class="container">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur :'.$e->getMessage());
        }


        if(isset($_SESSION['login']) AND isset($_SESSION['id']))
        {
            include('header_auth.php');?>

            <h2><?php echo ucfirst($_SESSION['login']);?></h2>
            <p>Voici votre profil</p>
            
            <?php

            $req = $bdd->prepare('SELECT * FROM registration WHERE login = ?');
            $req->execute(array($_SESSION['login']));
            $results = $req->fetch();
            ?>
            <img src="members/avatars/<?php echo $results['avatar'];?>" width="100px">
            
            <table>
                <tr></tr>
                <td>Adresse email:</td>
                <td><?php echo  $results['email'];?></td>
                <td><form  action="update_profile.php" method ="POST"><button class="update_button" name="new_email">Modifier</button></form></td>
                <tr></tr>
                <td>Ville</td>
                <td><?php echo $results['city'];?></td>
                <td><form  action="update_profile.php" method ="POST"><button class="update_button" name="new_city">Modifier</button></form></td>
                <tr></tr>
                <td>Travail</td>
                <td><?php echo $results['job'];?></td>
                <td><form  action="update_profile.php" method ="POST"><button class="update_button" name="new_job">Modifier</button></form></td>
                <tr></tr>
                <td>Passions</td>
                <td><?php echo $results['hobbies'];?></td>
                <td><form  action="update_profile.php" method ="POST"><button class="update_button" name="new_hobbies">Modifier</button></form></td>
            </table>
            <br>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="avatar">Avatar: </label>
                <input type="file" name="avatar" id="avatar">
                <input class="update_avatar" type="submit" value="valider">
            </form>
            <?php
            if(isset($_FILES['avatar']['name']) AND !empty($_FILES['avatar']['name']))
            {
                $sizeMax = 2097152;
                $extensionsAccepted = ['jpg','jpeg','gif','png'];
                if($_FILES['avatar']['size'] <= $sizeMax)
                {
                    $extensionsUpload = strtolower(substr(strchr($_FILES['avatar']['name'],'.'), 1));
                    if(in_array($extensionsUpload,$extensionsAccepted));
                    {
                        $way = 'members/avatars/'.$_SESSION['id'].'.'.$extensionsUpload;
                        $result = move_uploaded_file($_FILES['avatar']['tmp_name'],$way);
                        if($result)
                        {
                            $update_avatar = $bdd->prepare('UPDATE registration SET avatar = :avatar WHERE id = :id');
                            $update_avatar->execute(array(
                            'avatar' => $_SESSION['id'].'.'.$extensionsUpload,
                            'id' => $_SESSION['id']));
                            header('user_profile.php');
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
        </div>
    </body>
</html>

