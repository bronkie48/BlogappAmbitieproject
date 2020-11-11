<?php
require_once "PHP/database.php";
session_start();
$userlogin = $_SESSION['userlogin'];
?>
<html>
    <head>
        <title>Maak een Blog</title>
        <link rel="stylesheet" href="/Blogapp/BlogappAmbitieproject/CSS/style.css">
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
                        <a href="/Blogapp/BlogappAmbitieproject/PHP/logout.php"  class="detail-btn"> Uitloggen</a>
                        <input type= "button" class="detail-btn" value="Mijn gegevens">
                    </div>
                </div>
            </div>
        </header>
        <section class="create-blog">
            <div class="create-blog-button">
                <h1>Nieuw bericht</h1>
            </div>
        </section>
        <section class="create-blog-form-container">
            <div class="create-blog-form">
                <div class="create-blog-form-grid">
                    <form action="/Blogapp/BlogappAmbitieproject/PHP/createblog.php"method="POST" name="create-blog" id="create-blog">
                        <div class="form-line">
                            <label for="subject"><b>Onderwerp</b></label>
                            <input type="text" name="subject" id="subject" placeholder="">
                        </div>
                        <div class="form-line">
                            <label for="image"><b>Afbeelding uploaden</b></label>
                            <input type="file" name="image" id="image">
                            <input type="submit" value="Upload Image" name="upload_image">
                        </div>
                        <div class="form-line">
                            <label for="message"><b>Bericht</b></label>
                            <input type="text" name="message" id="message" placeholder="">
                        </div> 
                        <div class="button-left">
                            <button type="submit" name="create_blog" class="green-btn">Posten</button> 
                        </div>
                        <div class="button-right">
                            <button type="reset" name="reset_blog" class="red-btn">Annuleren</button>  
                        </div>
                    </form>    
                </div>
            </div>
        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>