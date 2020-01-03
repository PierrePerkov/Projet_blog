<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>header</title>
    <link rel="stylesheet" href="style_not_conn.css">
</head>
<body>
    <header>
        <div class="menu">
            <nav>
                <ul>
                    <a href = "index.php"><li>ACCUEIL</li></a>
                    <a href = "forum.php"><li>FORUM</li></a>
                    <a href="contact.php"><li>CONTACT</li></a>           
                </ul>
            </nav>
            <div class="connection">
                <form method="post" action="login.php">
                    <label for="login">Pseudo</label>
                    <input type="text" name="login" id="login">
                    <label for="pass">Mot de passe</label>
                    <input type="password" name="pass" id="pass">
                    <button name="connect">Se connecter</button>
                    
                </form>
                <div class="registration">            
                    <a href="registration_form.php"><button>S'inscrire</button></a>
                </div>
            </div>
        </div>    
            <div class="title_logo">
                <img src="pictures/logo_title.png" alt="logo">
                <h1>Le blog de l'express</h1>
            </div>       
        </header>