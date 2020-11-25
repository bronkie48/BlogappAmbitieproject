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
        <title>Maak een Blog</title>
        <link rel="stylesheet" href="/Blogapp/BlogappAmbitieproject/CSS/style.css">
    </head>
    <body>
        <header>
            <div class="header-left-block">
                <div class="menu-container">
                    <div class="menu">
                        <a href="/Blogapp/BlogappAmbitieproject/dashboard.php" class="menu-item-red">Dashboard</a>
                        <a href="/Blogapp/BlogappAmbitieproject/blogoverview.php" class="menu-item-purple">Blogs</a>
                        <a href="/Blogapp/BlogappAmbitieproject/blogform.php" class="menu-item-green">Blog maken</a>
                        <a href="/Blogapp/BlogappAmbitieproject/persondata.php" class="menu-item-orange">Gegevens</a>
                    </div>
                </div>
            </div>
            <div class="header-right-block">
                <div class="login-details">
                <ul class="user-login">
                        <li><img src="../IMG/user.png" width="25" height="25" alt="user icon"><?php echo $userlogin;?></li>
                    </ul>
                    <div class="login-details-buttons">
                        <a href="/Blogapp/BlogappAmbitieproject/PHP/logout.php"  class="detail-btn"> Uitloggen</a>
                        <a href="persondata.php"  class="detail-btn"> Mijn Gegevens</a>
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
                            <label for="subject"><b>Onderwerp*</b></label>
                            <input type="text" name="subject" id="subject" placeholder="Vul een onderwerp in">
                        </div>
                        <div class="form-line">
                            <label for="image"><b>Afbeelding uploaden</b></label>
                            <input type="file" name="image" id="image">
                            <input type="submit" value="Upload Image" name="upload_image">
                        </div>
                        <div class="form-line">
                            <label for="message"><b>Bericht*</b></label>
                            <textarea name="message" id="message" rows= "20" cols ="100" placeholder="Vul hier uw tekst in...."></textarea>
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