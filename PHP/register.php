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
              echo "<span class=errorRegisterMsg>Woonplaats is niet ingevuld</span>";
            } 
        else
        {
            if($user)
            {
                echo "<span class=errorRegisterMsg>Gebruiker bestaat al</span>";
                exit();
            }
            else{
                // check for email valclassate and exist
                if (!filter_var($email, FILTER_VALclassATE_EMAIL)) 
                {
                    echo "<span class=errorRegisterMsg>Voer een geldige email in</span>";
                    exit();
                }
                else
                {
                    $stmt = $conn->prepare("SELECT * FROM user WHERE email='$email'");
                    $stmt->execute();
                    $emailaddress=$stmt->fetch();

                    if($emailaddress)
                    {
                        echo "<span class=errorRegisterMsg>email wordt al gebruikt</span>";
                        exit();
                    }
                    else
                    {
                        // check valclassation postcode
                        if(!preg_match('/^[1-9][0-9]{3}?[A-Z]{2}$/i', $postal))
                        {
                            echo "<span class=errorRegisterMsg>postcode is incorrect</span>";
                            exit();
                        }
                        else
                        {
                            if(!preg_match('/^[a-zA-Z]{1,}[\s][0-9]+$/', $address))
                            {
                                echo "<span class=errorRegisterMsg>adres is incorrect</span>";
                                exit();
                            }
                            else{
                                // check for equal password
                                if($pwd != $pwdcheck){
                                    echo "<span class=errorRegisterMsg>wachtwoorden komen niet overeen</span>";
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