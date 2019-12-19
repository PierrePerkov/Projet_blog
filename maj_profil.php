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
        if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
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

        if(isset($_POST['nv_email'])) 
        { $nv_email = htmlspecialchars($_POST['nv_email']);?> 
            <form action="maj_profil_post.php" method="POST">
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
        if(isset($_POST['nv_ville'])) 
        { $nv_ville = htmlspecialchars($_POST['nv_ville']);?> 
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="nv_ville">Nouvelle ville</label></td>
                        <td><input type="text" name="ville" id="ville"></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        if(isset($_POST['nv_travail'])) 
        { $nv_travail = htmlspecialchars($_POST['nv_travail']);?>
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="travail">Nouveau travail</label></td>
                        <td><input type="text" name="travail" id="travail"></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        if(isset($_POST['nv_passions'])) 
        {$nv_passions = htmlspecialchars($_POST['nv_passions']);?> 
            <form action="maj_profil_post.php" method="POST">
                <table>
                    <tr>
                        <td><label for="passions">Nouvelles passions</label></td>
                        <td><textarea name="passions" id="passions" cols="20" rows="5"></textarea></td>
                        <td><button>Valider</button></td>
                    </tr>
                </table>
            </form>
            <?php     
        }
        ?>
        <div class="conteneur">
        </div>
   
    </body>
</html>