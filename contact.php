<?php
session_start();
?>
<!DOCTYPE html>
      <html lang="fr">
        <head>
          <meta charset="UTF-8">
          <title>Forum</title>
          <link rel="stylesheet" href="style_section.css">
        </head>
        <body>
          <div class="container">
            <?php
            if(isset($_SESSION['login']) AND isset($_SESSION['id']))
            {  
            include('header_auth.php');
            }else
            {
                include('header.php');
            }
            ?>
            <h2>Nous contacter</h2>
            <table>
                <tr>
                    <td class="contact_mail">Par mail:</td>
                    <td>leblogdelexpress@gmail.com</td>
                </tr>
            </table>
        
        