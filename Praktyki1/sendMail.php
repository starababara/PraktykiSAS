<?php
    $sender=$_POST['email'];
    $content=$_POST['content'];

    $to="s.synaszko@gmail.com";

    $msg=$content."/n".$sender;

    

    $email;
    if(mail($to, "mail ze strony", $msg))
    {
        echo'succes';
        header("Location: contact.php"); 
    }
?>