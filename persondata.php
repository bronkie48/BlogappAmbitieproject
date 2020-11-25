<?php
require_once "PHP/database.php";
session_start();
$userlogin = $_SESSION['userlogin'];

if(empty($userlogin))
{
    header("location:/Blogapp/BlogappAmbitieproject/index.php");
}
?>
<html>
    <head>
        <title>Mijn Gegevens</title>
        <link rel="stylesheet" href="/Blogapp/BlogappAmbitieproject/CSS/style.css">
    </head>
    <body>
        <header>
            <div class="header-left-block">
                <div class="menu-container">
                    <div class="menu">
                        <a href="dashboard.php" class="menu-item-red">Dashboard</a>
                        <a href="blogoverview.php" class="menu-item-purple">Blogs</a>
                        <a href="blogform.php" class="menu-item-green">Blog maken</a>
                        <a href="persondata.php" class="menu-item-orange">Gegevens</a>
                    </div>
                </div>
            </div>
            <div class="header-right-block">
                <div class="login-details">
                <ul class="user-login">
                        <li><img src="../IMG/user.png" width="25" height="25" alt="user icon"><?php echo $userlogin;?></li>
                    </ul>
                    <div class="login-details-buttons">
                        <a href="PHP/logout.php"  class="detail-btn"> Uitloggen</a>
                        <a href="persondata.php"  class="detail-btn"> Mijn Gegevens</a>
                    </div>
                </div>
            </div>
        </header>
        <section class="persondata">
            <div class="persondata-block">
                <?php
                require_once "PHP/database.php";

                    $sql = $pdo->prepare("SELECT * FROM `gebruiker` WHERE `username` = '$userlogin'");
                    $sql->setFetchMode(PDO::FETCH_ASSOC);
                    $sql->execute();

                    if($sql->rowCount() != 0) {
                        
                        while($row=$sql->fetch())
                        {
                        ?>
                            <h1>Mijn Gegevens</h1>
                            <table class="persondata-table">
                                <tr>
                                    <td>Naam</td>
                                    <td><?php echo $row['name']?></td>
                                </tr>  
                                <tr>
                                    <td>Gebruikersnaam</td>
                                    <td><?php echo $row['username']?></td>
                                </tr>  
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['email']?></td>
                                </tr>  
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $row['postal']?></td>
                                </tr>  
                                <tr>
                                    <td>Adres</td>
                                    <td><?php echo $row['address']?></td>
                                </tr>  
                                <tr>
                                    <td>Woonplaats</td>
                                    <td><?php echo $row['city']?></td>
                                </tr>  
                                <tr>
                                    <td>Wachtwoord</td>
                                    <td>********</td>
                                </tr> 
                            </table> 
                        <?php
                        }
                    }
                ?>
            </div>
        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>