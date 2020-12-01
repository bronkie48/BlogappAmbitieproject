<?php
    session_start();
    if(isset($_POST['register_user']))
    {
        include '../index.php';
        require_once 'database.php';

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $postal = $_POST['postal'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pwd = $_POST['pwd'];
        $pwdcheck = $_POST['pwd-repeat'];
        
        // check for username exist
        $stmt = $conn->prepare("SELECT * FROM user WHERE username='$username'");
        $stmt->execute();
        $user=$stmt->fetch();
       
        if (!preg_match('/^[a-zA-Z .]+$/', $city)) 
            {
              echo "<div class=errorRegister>Woonplaats is niet ingevuld</div>";
            } 
        else
        {
            if($user)
            {
                echo "<div class=errorRegister>Gebruiker bestaat al</div>";
                exit();
            }
            else{
                // check for email validate and exist
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    echo "<div class=errorRegister>Voer een geldige email in</div>";
                    exit();
                }
                else
                {
                    $stmt = $conn->prepare("SELECT * FROM user WHERE email='$email'");
                    $stmt->execute();
                    $emailaddress=$stmt->fetch();

                    if($emailaddress)
                    {
                        echo "<div class=errorRegister>email wordt al gebruikt</div>";
                        exit();
                    }
                    else
                    {
                        // check validation postcode
                        if(!preg_match('/^[1-9][0-9]{3}?[A-Z]{2}$/i', $postal))
                        {
                            echo "<div class=errorRegister>postcode is incorrect</div>";
                            exit();
                        }
                        else
                        {
                            if(!preg_match('/^[a-zA-Z0-9 .]+$/', $address))
                            {
                                echo "<div class=errorRegister>adres is incorrect</div>";
                                exit();
                            }
                            else{
                                // check for equal password
                                if($pwd != $pwdcheck){
                                    echo "<div class=errorRegister>wachtwoorden komen niet overeen</div>";
                                    exit();
                                }
                                else
                                {
                                    // Hashing passwords
                                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                    
                                    // insert user into database
                                    $insert = $pdo->prepare("INSERT INTO `user`(`name`, `username`, `email`, `postal`, `address`, `city`, `pwd`) 
                                                            VALUES (:name,:username,:email,:postal,:address,:city,:pwd)");
                                
                                    $insert->bindParam(':name', $name);
                                    $insert->bindParam(':username', $username);
                                    $insert->bindParam(':email', $email);
                                    $insert->bindParam(':postal', $postal);
                                    $insert->bindParam(':address', $address);
                                    $insert->bindParam(':city', $city);
                                    $insert->bindParam(':pwd', $hashedPwd);
                                    
                                    $insert->execute();
                                    echo "Gebruiker is succesvol toegevoegd!";
                                }
                            }
                        }
                    }
                }
            }
        }
    }