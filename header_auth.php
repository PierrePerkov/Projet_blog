
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
                        <a href = "member_area.php"><li>ACCUEIL</li></a>
                        <a href = "forum.php"><li>FORUM</li></a>
                        <a href="contact.php"><li>CONTACT</li></a>           
                    </ul>
                </nav>
                <div class="connection">
                    <p class="loged">Bonjour <a href="user_profile.php"><?php echo ucfirst($_SESSION['login']);?></a></p>               
                    <a href="logout.php"><button name="logout"></button></a>                    
                </div>
            </div>    
                <div class="title_logo">
                    <img src="pictures/logo_title.png" alt="logo">
                    <h1>Le blog de l'express</h1>
                </div>       
        </header>
    </body>
    
    