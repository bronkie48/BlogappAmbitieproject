<?php
include '../blogform.php';
$userlogin = $_SESSION['userlogin'];

if(isset($_POST['upload_image']))
{
    $filename = $_FILES["image_file"]["name"];
    $tempname = $_FILES["image_file"]["tmp_name"];
    $folder = "../IMG/".$filename;
}
if(isset($_POST['create_blog']))
{
    require_once 'database.php';

    $subject = $_POST['subject'];
    $image = $_POST['image'];
    $message = $_POST['message'];

    // check for empty subject field
    if(empty($subject))
    {
        echo "Er is geen onderwerp ingevuld";	
    }
    else
    {
        // check for message (length)
        if(empty($message))
        {
            echo "Er is geen bericht ingevuld";
        }
        else
        {
            $stmt = $pdo->prepare("SELECT `userid` FROM `user` WHERE `username` = '$userlogin'");
            $stmt->execute();
            $userid = $stmt->fetchColumn();

            $insert = $pdo->prepare("INSERT INTO `blog`(`userid`,`subject`, `message`, `image`) 
                                     VALUES(:userid, :subject, :message, :image)");
            
            $insert->bindValue(':userid', $userid);
            $insert->bindParam(':subject',$subject);  
            $insert->bindParam(':message',$message); 
            $insert->bindParam(':image',$image);  

            $insert->execute();
            
            
            header("location:/Blogapp/BlogappAmbitieproject/blogform.php");
            echo $userlogin . " Blogbericht aangemaakt!";
        }
    } 
}
?>