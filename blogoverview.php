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
        <title>Overzicht</title>
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

        <section class="metro-style-blog-overview">
            <div class="filter-blog-red">
                <h1>Filter</h1>
                <form action="" name="filterBlog">
                    <div class="filter-radio">
                        <input type = "radio" value="Populair" id="populair" name="filter">
                        <label for="Populair">Populair</label>
                    </div>
                    <div class="filter-radio">
                        <input type = "radio" value="oldest" id="oldest" name="filter">
                        <label for="oldest">Oud - Nieuw</label>
                    </div>
                    <div class="filter-radio">
                        <input type = "radio" value="newest" id="newest" name="filter">
                        <label for="newest">Nieuw - Oud</label>
                    </div>
                    <input type = "submit" value="Reset" id="reset">
                </form>
            </div>

            <div class="metro-style-blocks-grid">
                <?php
                    $stmt=$pdo->query("SELECT blog.userid, blog.subject, blog.message, blog.image, blog.date, user.username as username
                                        FROM `blogbericht` as blog
                                        INNER JOIN `gebruiker` as user
                                        ON user.userid = blog.userid
                                        WHERE username= '$userlogin'");
                    while($row=$stmt->fetch())
                    {
                ?>
                <div class="metro-block-purple">
                    <h1><?php echo $row['subject']?></h1>
                    <div class="blog-image">
                        <img src="IMG/blog.jpg" alt="blog_afbeelding">
                        <p><?php echo $row['message']?></p>
                        <p><?php echo date('d/m/y H:i', strtotime( $row['date']));?></p>
                        <input type="button" class="blog-btn" value="Lees meer">
                    </div>
                </div>    
                <?php 
                    }
                ?>
        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>