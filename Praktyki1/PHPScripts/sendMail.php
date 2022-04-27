<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'G:\Programowanie\vendor\autoload.php';
    $email = new PHPMailer(TRUE);
    
    $sender = $_POST['email'];
    $msg=$_POST['content'];

    try
    {
        $email->setFrom('s.synaszko@gmail.com', $sender,0);
        $email->addAddress('szymon.synaszko@tm1.edu.pl', 'TestowyOdbiorca');
        $email->Subject = 'msg from website';
        $email->Body=$msg;

        $email->isSMTP();
        $email->SMTPDebug  = 1;  
        /* SMTP server address. */
        $email->Host = 'smtp.gmail.com';
        /* Use SMTP authentication. */
        $email->SMTPAuth = TRUE;
        
        /* Set the encryption system. */
        $email->SMTPSecure = 'tls';
        
        /* SMTP authentication username. */
        $email->Username = 's.synaszko@gmail.com';
        
        /* SMTP authentication password. */
        $email->Password = 'tutaj wstawić hasło';
        
        /* Set the SMTP port. */
        $email->Port = 587;
        
        /* Finally send the mail. */
        $email->send();

    }
    catch (Exception $e)
    {
    echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
    echo $e->getMessage();
    }

header('Location: /Praktyki1/contact.php')
?>
