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
            $insert = $pdo->prepare("INSERT INTO `blogbericht`(`userid`,`subject`, `message`, `image`) 
                                     SELECT username
                                     FROM  gebruiker 
                                     WHERE username='$userlogin'
                                     ");
            
            $insert->bindParam(':subject',$subject);  
            $insert->bindParam(':message',$message);   

            $insert->execute();
            echo "Blogbericht aangemaakt!";
        }
    } 
}
?>