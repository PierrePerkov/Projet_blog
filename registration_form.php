<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style_section.css">
</head>
<!-- header -->
<?php include('header.php');?>
<body>
    <div class="container">
        <div class="registration_window">
            <h2>Inscription</h2>
            <p>Pour vous inscrire, veuillez choisir un pseudo et un mot de passe</p>
            <form method="post" action="registration_form_post.php">
                <table>
                    <tr>
                        <td><label for="registr_login">Pseudo</label></td>
                        <td><input type="text" name="registr_login" id="registr_login" placeholder="Michel34"></td>
                    </tr>
                    <tr>
                        <td><label for="registr_pass">Mot de passe</label></td>
                        <td><input type="password" name ="registr_pass" id="registr_pass"></td>
                    </tr>
                    <tr>
                        <td><label for="registr_pass_verif">Verifiez votre mot de passe</label></td>
                        <td><input type="password" name ="registr_pass_verif" id="registr_pass_verif"></td>                    
                    </tr>
                    <tr>
                        <td><label for="registr_email">Votre e-mail</label></td>
                        <td><input type="email" name="registr_email" id="registr_email" placeholder="votre_email@mail.com"></td>
                    </tr>
                    <tr>
                        <td><label for="registr_date_birth">Votre date de naissance</label></td>
                        <td><input type="date" name="registr_date_birth" id="registr_date_birth" placeholder="votre_email@mail.com"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="registration_form_post.php"><button name="send">Vous inscrire</button></a></td>
                    </tr>
                </table>        
            </form>
        </div>
    </div>
</body>


            
            
            
            
       