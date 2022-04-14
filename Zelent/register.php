<?php   
    session_start();
    if(isset($_POST['email']))
    {
        $validation=true;
        $nickname = $_POST['name'];
        $email = $_POST['email'];
        $paswd1= $_POST['pass1'];
        $paswd2= $_POST['pass2'];
        if(strlen($nickname)<3 || strlen($nickname)>20)
        {
            $validation=false;
            $_SESSION['NameErr']='nick musi mieć od 3 do 20 znaków';
        }
        if(ctype_alnum($nickname))
        {
            $validation=false;
            $_SESSION['NameErr']='nazwa może składać się tylko z liter i cyfr(bez polskich znaków)';
        }
        
        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false && ($email==$emailB))
        {
            $validation=false;
            $_SESSION['MailErr']='TO NIE E-MAIL gałganie, albo wpisałeś go źle';
        }
        
        if(strlen($paswd1)<8 || strlen($paswd1)>20)
        {
            $validation=false;
            $_SESSION['Pass1Err']='hasło musi mieć od 8 do 20 znaków';
        }

        if($paswd1!=$paswd2)
        {
            $validation=false;
            $_SESSION['Pass2Err']='hasła nie są takie same';
        }

        if(!isset($_POST['statute']))
        {
            $validation=false;
            $_SESSION['StatuteErr']='przeczytaj i zaakceptuj regulamin';
        }

        $secretKey="6Ld91HMfAAAAAALlvlfaiH1WgQS0wRX2iDinNN4n";
        $checkCaptcha=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
        $response = json_decode($checkCaptcha);

        if($response->success==false)
        {
            $validation = false;
            $_SESSION['BotErr']='Chyba jesteś botem, dla szachisty to nawet dobrze, gorzej dla garczy CS\'a';
        }

        if($validation==true)
        {
            $paswdHash=password_hash($paswd1, PASSWORD_DEFAULT);
            //dodawanie gracza do bazy
            //header("Location: game.php");
            exit();
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>załóż konto</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <form method="post">
            <input required type="text" name="email" placeholder="email"></br>
            <?php
                if(isset($_SESSION['MailErr']))
                {
                    echo "<div class='error'>".$_SESSION['MailErr']."</div>";
                }
            ?>
            <input required type="text" name="name" placeholder="login"></br>
            <?php
                if(isset($_SESSION['NameErr']))
                {
                    echo "<div class='error'>".$_SESSION['NameErr']."</div>";
                }
            ?>
            <input required type="password" name="pass1" placeholder="hasło"></br>
            <?php
                if(isset($_SESSION['Pass1Err']))
                {
                    echo "<div class='error'>".$_SESSION['Pass1Err']."</div>";
                }
            ?>
            <input required type="password" name="pass2" placeholder="powtórz hasło"></br>
            <?php
                if(isset($_SESSION['Pass2Err']))
                {
                    echo "<div class='error'>".$_SESSION['Pass2Err']."</div>";
                }
            ?>
            <label>
                <input required type="checkbox" name="statute"> Akceptuję regulamin</br>
            </label>
            <?php
                if(isset($_SESSION['StatuteErr']))
                {
                    echo "<div class='error'>".$_SESSION['StatuteErr']."</div>";
                }
            ?>
            
            <div
            class="g-recaptcha" 
            data-sitekey="6Ld91HMfAAAAAIJYEyUDPXP682Tam-f7bFWcq_NL" 
            data-callback='onSubmit' 
            data-action='submit'>submit
            </div>
            <?php
                if(isset($_SESSION['BotErr']))
                {
                    echo "<div class='error'>".$_SESSION['BotErr']."</div>";
                }
            ?>
            <input 
                type="submit" 
                value="Zarejstruj się">
            </input>
        </form>
    </body>
</html>