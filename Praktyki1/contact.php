<!DOCTYPE html>
<html lang="pl">
<?php
        include("Template/head.php");
   ?>
<body>
<div class="header">
        <h1>
            KONTAKT
        </h1>
    </div>
    <?php
        include("Template/menu.php");
    ?>
    <div class="content">
        <div class="formContainer">
            <form action="sendMail.php" method="post" class="formCss">
                <textarea required name="email" type="text" cols="40" rows="1" class="formInput" placeholder="wpisz swój e-mail"></textarea></br>
                <textarea required name="content" type="text" cols="40" rows="10" class="formInput" placeholder="wpisz swoją wiadomość"></textarea></br>
                <input type="submit" class="formButton" value="wyślij"></input>
            </form>
        </div>
    </div>
    <?php
        include("Template/footer.php");
    ?>
</body>
</html>
