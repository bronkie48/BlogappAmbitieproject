<?php
require_once "PHP/database.php";
session_start();
$userlogin = $_SESSION['userlogin'];

//redirect when user is not logged in
if(empty($userlogin))
{
    header("location:/Blogapp/BlogappAmbitieproject/index.php");
}
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

        <section class="metro-style-blocks">
            <div class="metro-style-blocks-grid">
                <a href="blogoverview.php" class="metro-block-red">
                    <h1>Laatste Berichten</h1>
                </a>
                <a href="blogform.php"class="metro-block-green"> 
                    <h1>Bericht posten</h1>
                </a> 
                <a href="blogoverview.php" class="metro-block-purple">   
                    <h1>Mijn Berichten</h1>
                </a> 
                <a href="persondata.php" class="metro-block-orange">   
                    <h1>Mijn Gegevens</h1>
                 </a> 
            </div>
        </section>
    </body>
</html>