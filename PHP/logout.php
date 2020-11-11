<?php
session_start();

// destroy the session
unset($_SESSION["userlogin"]);
header("location:/Blogapp/BlogappAmbitieproject/index.php");
?>