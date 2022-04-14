<?php   
    session_start();
    if(isset($_SESSION['loged']))
    {
        if($_SESSION['loged']==true)
        {
            header("Location: /Zelent/game.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelent1</title>
</head>
    <body>
        <form action="Scripts/login.php" method="post">
            <input required type="text" name="name" placeholder="login"></br>
            <input required type="password" name="pass" placeholder="hasło"></br>
            <input type="submit" value="zaloguj"></br>
        </form>
        <?php   
            if(isset($_SESSION['error']))
            {
                echo $_SESSION['error'];
            }
        ?>
    </body>
</html>