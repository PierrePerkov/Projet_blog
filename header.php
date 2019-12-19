<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link rel="stylesheet" href="style_non_conn.css">
</head>
<body>
    <header>
        <div class="menu">
            <nav>
                <ul>
                    <a href = "accueil.php"><li>ACCUEIL</li></a>
                    <a href = "forum.php"><li>FORUM</li></a>
                    <a href="contact.php"><li>CONTACT</li></a>           
                </ul>
            </nav>
            <div class="connection">
                <form method="post" action="login.php">
                    <label for="pseudo">Pseudo</label>
                    <input type="texte" name="pseudo" id="pseudo">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" name="motdepasse" id="motdepasse">
                    <button name="seconnecter">Se connecter</button>
                    
                </form>
                <div class="inscription">            
                    <a href="page_inscriptions.php"><button>S'inscrire</button></a>
                </div>
            </div>
        </div>    
            <div class="titre_logo">
                <img src="images/logo_titre.png" alt="logo image">
                <h1>Le blog de l'express</h1>
            </div>       
        </header>