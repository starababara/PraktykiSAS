<?php
    session_start();
    if(!isset($_SESSION['$registerd']))
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Siema Siema, witam</p>
    <h5>Możesz już <a href="index.php">zalogować się</a> na swoje konto</h5>
</body>
</html>