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

        <section class="metro-style-blog-overview">
            <div class="filter-blog-red">
                <h1>Filter</h1>
                <form action="" method="post" name="filterBlog">
                    <div class="filter-radio">
                        <label class="container">Nieuw - Oud
                            <input type ="radio" value="newest" name="filter">
                            <span class="checkmark"></span>
                        </label>
                        
                    </div>
                    <div class="filter-radio">
                        <label class="container">Oud - Nieuw
                            <input type ="radio" value="oldest" name="filter">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <input type ="submit" class="reset-btn" value="Bevestig" name="confirm-filter">
                </form>
            </div>

            <div class="metro-style-blocks-grid">
                <?php
                if(isset($_POST['confirm-filter']))
                {
                    $filter = $_POST['filter'];
        
                    if($filter == "oldest")
                    {
                        $stmt=$pdo->query(" SELECT blog.blogid, blog.userid, blog.subject, blog.message, blog.image, blog.date, user.username as username
                                            FROM `blog` as blog
                                            INNER JOIN `user` as user
                                            ON user.userid = blog.userid
                                            WHERE username= '$userlogin' GROUP BY blog.date ASC");
                    }
                    else
                    {
                        $stmt=$pdo->query("SELECT blog.blogid, blog.userid, blog.subject, blog.message, blog.image, blog.date, user.username as username
                                            FROM `blog` as blog
                                            INNER JOIN `user` as user
                                            ON user.userid = blog.userid
                                            WHERE username= '$userlogin' GROUP BY blog.date DESC");
                    }
                }
                else
                {
                    $stmt=$pdo->query("SELECT blog.blogid, blog.userid, blog.subject, blog.message, blog.image, blog.date, user.username as username
                                        FROM `blog` as blog
                                        INNER JOIN `user` as user
                                        ON user.userid = blog.userid
                                        WHERE username= '$userlogin' GROUP BY blog.date DESC");
                }
                    while($row=$stmt->fetch())
                    {
                ?>
                
                <div class="metro-block-purple">
                    <h1>
                        <?php  
                            $subject = ucfirst($row['subject']); 
                            echo $subject;
                        ?>
                    </h1>
                    <div class="blog-image">
                        <?php 
                            $image = $row['image'];
                            if(!$image){
                                echo '<img src="/Blogapp/BlogappAmbitieProject/IMG/blog.jpg" alt="blog-image"/>';
                            }
                            else{
                                // echo '<img src="data:image/jpg;base64,' . (base64_encode($row['image'])).'" alt="blog-image"/>';
                                echo '<img src="/Blogapp/BlogappAmbitieProject/IMG/blog.jpg" alt="blog-image"/>';
                            }    
                        ?>
                    </div>
                    <div class="blog-message">
                        <p>
                            <?php echo $row['message']?>
                        </p>
                    </div>
                    <div class="blog-date">
                        <p>
                            <?php echo date('d-m-y H:i', strtotime( $row['date']));?>
                        </p>
                        <a href="#" class="blog-btn">Lees Meer</a>
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