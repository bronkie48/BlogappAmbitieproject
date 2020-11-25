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
        <title>Blog bericht</title>
        <link rel="stylesheet" href="/./CSS/style.css">
    </head>
    <body>
        <header>

        </header>

        <section>

        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>