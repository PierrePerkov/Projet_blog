
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page membres</title>
    <link rel="stylesheet" href="style_conn.css">
</head>
    <body>
        <header>
            <div class="menu">
                <nav>
                    <ul>
                        <a href = "page_membre.php"><li>ACCUEIL</li></a>
                        <a href = "forum.php"><li>FORUM</li></a>
                        <a href="contact.php"><li>CONTACT</li></a>           
                    </ul>
                </nav>
                <div class="connection">
                    <p class="connecte">Bonjour <a href="page_utilisateur"><?php echo ucfirst($_SESSION['pseudo']);?></a></p>               
                    <a href="logout.php"><button name="sedeconnecter"></button></a>                    
                </div>
            </div>    
                <div class="titre_logo">
                    <img src="images/logo_titre.png" alt="logo image">
                    <h1>Le blog de l'express</h1>
                </div>       
        </header>
    </body>
    
    