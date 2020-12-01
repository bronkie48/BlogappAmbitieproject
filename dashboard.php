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
                        <li><img src="/Blogapp/BlogappAmbitieProject/IMG/user.png" width="25" height="25" alt="user icon"><?php echo $userlogin;?></li>
                    </ul>
                    <div class="login-details-buttons">
                        <a href="PHP/logout.php"  class="detail-btn"> Uitloggen</a>
                        <a href="persondata.php"  class="detail-btn"> Mijn Gegevens</a>
                    </div>
                </div>
            </div>
        </header>

        <section class="metro-style-blocks">
            <div class="metro-style-blocks-grid-dashboard">
            <?php
                    $stmt=$pdo->query(" SELECT blog.userid, blog.subject, blog.message, blog.image, blog.date, user.username as username
                                        FROM `blog` as blog
                                        INNER JOIN `user` as user
                                        ON user.userid = blog.userid
                                        WHERE username= '$userlogin' GROUP BY blog.date DESC LIMIT 1 " );
                    while($row=$stmt->fetch())
                    {
                ?>
                <a href="blogoverview.php" class="metro-block-red">
                    <div class="blog-image">
                        <h1>Laatste Bericht</h1>
                        <h3><?php echo $row['subject']?></h3>
                        <img src="IMG/blog.jpg" alt="blog_afbeelding">
                        <div class="blog-message">
                            <p><?php echo $row['message']?></p>
                        </div>
                        <p><?php echo date('d/m/y H:i', strtotime( $row['date']));?></p>
                    </div>
                </a>   
                <?php 
                    }
                ?>
                
                </a>
                <a href="blogform.php"class="metro-block-green"> 
                    <h1>Bericht posten</h1>
                    <img src="IMG/blog.jpg" alt="blog_afbeelding">
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