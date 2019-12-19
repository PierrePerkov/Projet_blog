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
    <div class="conteneur">
        <div class="fenetre_inscription">
            <h2>Inscription</h2>
            <p>Pour vous inscrire, veuillez choisir un pseudo et un mot de passe</p>
            <form method="post" action="inscription_term.php">
                <table>
                    <tr>
                        <td><label for="pseudo_inscr">Pseudo</label></td>
                        <td><input type="text" name="pseudo_inscr" id="pseudo_inscr" placeholder="Michel34"></td>
                    </tr>
                    <tr>
                        <td><label for="pwd_inscr">Mot de passe</label></td>
                        <td><input type="password" name ="pwd_inscr" id="pwd_inscr"></td>
                    </tr>
                    <tr>
                        <td><label for="pwd_verif">Verifiez votre mot de passe</label></td>
                        <td><input type="password" name ="pwd_verif" id="pwd_verif"></td>                    
                    </tr>
                    <tr>
                        <td><label for="email_inscr">Votre e-mail</label></td>
                        <td><input type="email" name="email_inscr" id="email_inscr" placeholder="votre_email@mail.com"></td>
                    </tr>
                    <tr>
                        <td><label for="date_naiss_inscr">Votre date de naissance</label></td>
                        <td><input type="date" name="date_naiss_inscr" id="date_naiss_inscr" placeholder="votre_email@mail.com"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="inscription_term.php"><button name="envoi">Vous inscrire</button></a></td>
                    </tr>
                </table>        
            </form>
        </div>
    </div>
</body>


            
            
            
            
       