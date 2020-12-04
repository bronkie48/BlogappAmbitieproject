<?php
require_once "PHP/database.php";
session_start();
$userlogin = $_SESSION['userlogin'];
$blogid = $_SESSION['blogid'];
if(empty($userlogin))
{
    header("location:/Blogapp/BlogappAmbitieproject/index.php");
}
if (empty($blogid))
{
    header("location:/Blogapp/BlogappAmbitieproject/blogs.php");
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
                    <a href="blogform.php" class="menu-item-green">Post maken</a>
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

        <section class="create-blog-form-container">
            <div class="create-blog-form">
                <div class="create-blog-form-grid">
                    <?php
                        $stmt=$pdo->query(" SELECT *
                                            FROM `blog`
                                            WHERE blogid= '$blogid'");
                        while($row=$stmt->fetch())
                        {
                            echo $row['subject'] . " " . $row['message'] . " ". $row['date'];
                        }
                    ?>
                  
                </div>
            </div>
        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>