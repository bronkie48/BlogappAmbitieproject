<?php
    session_start();
    if(isset($_POST['login_user']))
    {
        require_once 'database.php';

        $username = trim($_POST['username']);
        $pwd = trim($_POST['pwd']);
        
        // check if username exists and password exist and matches
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$_POST['username']]); 
        $user = $stmt->fetch();
        
        if($user && password_verify($_POST['pwd'], $user['pwd']))
        {
            $_SESSION['userlogin'] = $username;
            header("location:../dashboard.php");
        }
        else 
        {
            include_once "../index.php";
            if(empty($username) || empty($pwd))
            {
                echo "<div class=errorLoginMsg>De invoervelden zijn onjuist ingevuld</div>";
            }
            else
            {
                if (!$user)
                {   
                    echo "<div class=errorLoginMsg>Gebruiker wordt niet herkend</div>";
                }
                else
                {
                echo "<div class=errorLoginMsg>Gebruikersnaam en wachtwoord komen niet overeen</div>";
                }
            }
            
        }
    }