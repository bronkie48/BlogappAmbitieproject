<?php
require_once "PHP/database.php";
session_start();
$userlogin = $_SESSION['userlogin'];
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <header>
            <div class="header-left-block">
                <div class="menu-container">
                    <ul class="menu">
                        <li class="menu-item-red"><a href="dashboard.php">Dashboard</a></li>
                        <li class="menu-item-purple"><a href="blogoverview.php">Blogs</a></li>
                        <li class="menu-item-green"><a href="blogform.php">Blog maken</a></li>
                        <li class="menu-item-orange"><a href="persondata.php">Gegevens</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-right-block">
                <div class="login-details">
                    <ul class="user-login">
                        <li><img src="../IMG/user.png" width="25" height="25" alt="user icon"><?php echo $userlogin;?></li>
                    </ul>
                    <div class="login-details-buttons">
                        <a href="PHP/logout.php"  class="detail-btn"> Uitloggen</a>
                        <input type= "button" class="detail-btn" value="Mijn gegevens">
                    </div>
                </div>
            </div>
        </header>

        <section class="metro-style-blocks">
            <div class="metro-style-blocks-grid">
                <div class="metro-block-red">
                    <h1>Laatste Bericht</h1>
                </div>
                <div class="metro-block-green">
                    <h1>Bericht posten</h1>
                </div>
                <div class="metro-block-purple">
                    <h1>Mijn Berichten</h1>
                </div>
                <div class="metro-block-orange">
                    <h1>Mijn Gegevens</h1>
                </div>
            </div>
        </section>
    </body>
</html>