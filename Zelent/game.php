<?php   
    session_start();
    if(!isset($_SESSION['loged']))
    {
        header("Location: /Zelent");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <p>
        <?php
            echo"Witaj ".$_SESSION['email']."!";
        ?>
        [<a href='scripts/logout.php'>WYLOGUJ</a>]
    </p>
    </br></br>
    <p>surowce</br>
        <?php
            echo"drewno:".$_SESSION['wood']." | ";
            echo"kamień:".$_SESSION['stone']." | ";
            echo"zboże:".$_SESSION['wheat']." | ";
        ?>
    </p></br>
    <p>Pozostało konta premium:<?php echo$_SESSION['premium'];?> dni</p>
</body>
</html>