<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise à jour profil</title>
        <link rel="stylesheet" href="style_section.css">
    </head>
    <body>
        <?php
        if(isset($_SESSION['login']) AND isset($_SESSION['id']))
        {
            include('header_auth.php');
        }
        else
        {
            include('header.php');
        }

        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur :'.$e->getMessage());
        }

        ?>    
        <h2>Mettez a jour vos informations</h2>

        <?php

        if(isset($_POST['new_email'])) 
        { $nv_email = htmlspecialchars($_POST['new_email']);?> 
            <form action="update_profile_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="email">Nouvel e-mail</label></td>
                        <td><input type="email" name="email" id="email"></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        if(isset($_POST['new_city'])) 
        { $new_city = htmlspecialchars($_POST['new_city']);?> 
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="new_city">Nouvelle ville</label></td>
                        <td><input type="text" name="city" id="city"></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        if(isset($_POST['new_job'])) 
        { $new_job = htmlspecialchars($_POST['new_job']);?>
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="job">Nouveau travail</label></td>
                        <td><input type="text" name="job" id="job"></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        if(isset($_POST['new_hobbies'])) 
        {$new_hobbies = htmlspecialchars($_POST['new_hobbies']);?> 
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="hobbies">Nouveaux hobbies</label></td>
                        <td><textarea name="hobbies" id="hobbies" cols="20" rows="5"></textarea></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        ?>
        <div class="container">
        </div>
   
    </body>
</html>