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
        <div class="container">
            <?php
            // ouverture de base de donnée
            try{
            $bdd = new PDO('mysql:host=localhost;dbname=blog_projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION)); 
            }
            catch(Exception $e){
                die('erreur : '.$e->getMessage());
            }

            $pass_hash = password_hash($_POST['registr_pass'],PASSWORD_DEFAULT);
            $login = htmlspecialchars($_POST['registr_login']);
            $email = htmlspecialchars($_POST['registr_email']);
            $date_birth = htmlspecialchars($_POST['registr_date_birth'])

            // condition d'inscription
            ?><div class="form_sent"><?php
            if(isset($_POST['registr_login']) AND isset($_POST['registr_pass']) AND isset($_POST['registr_pass_verif']) AND isset($_POST['registr_email']) AND isset($_POST['registr_date_birth']))
            {    if(!empty($_POST['registr_login']) AND !empty($_POST['registr_pass']) AND !empty($_POST['registr_pass_verif']) AND !empty($_POST['registr_email']) AND !empty($_POST['registr_date_birth']))
                {
                    if($_POST['registr_pass'] === $_POST['registr_pass_verif'])
                    {    
                        $req2 = $bdd->prepare('SELECT * FROM registration WHERE login = ? AND email = ?');
                        $req2->execute(array($_POST['registr_login'],$_POST['registr_email']));
                        $result = $req2->rowCount();
                            if($result == 0)
                            {
                                ?>
                                <h3>Felicitations!</h3>
                                <p>Votre compte à bien été crée. Vous pouvez maintenant vous connecter</p> 
                                <?php $req = $bdd->prepare('INSERT INTO registration(login, pass, email,date_birth)VALUES(:login,:pass,:email,:date_birth)');
                                $req->execute(array(
                                    'login' => $login,
                                    'pass' => $pass_hash,
                                    'email' => $email,
                                    'date_birth' => $date_birth));                   
                            }
                            elseif($result == 1)
                            {
                                echo '<p class="msg">Pseudo ou mail déjà existant.</p>';
                            }
                    }
                    else       
                    {
                        
                        echo "<p class='msg'>Les deux mots de passes sont differents</p>";?>
                        <a href="registration_form.php"><button></button></a><?php
                    }
                    
                    
                }
                else
                {
                    echo' <p>Les champs ne sont pas complétés</p>';?>
                    <a href="registration_form.php"><button></button></a><?php
                }
            }            
            ?>
        </div>

</body>
<?php






        

