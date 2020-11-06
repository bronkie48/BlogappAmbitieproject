<?php
    session_start();
    if(isset($_POST['register_user'])){
        
        include 'database.php';

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $postal = $_POST['postal'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pwd = $_POST['pwd'];
        $pwdcheck = $_POST['pwd-repeat'];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo"email is not valid"
            exit();
          }
        if($postal = preg_match('^[0-9]{4}\s[A-Z]{2}$')){
            
        }
        else{
            $sql = "SELECT * FROM Gebruiker WHERE email='$email'";
            $stmt = $conn->prepare($sql);

            if(!$stmt->rowcount() = 0)
            {
                echo"email is taken";
            }
            else{
                if($pwd != $pwdcheck){
                    echo"passwords do not match";
                }
                else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // insert user into database
                    exit();
                }
            }
        }
    }