<?php
    session_start();


    if(!isset($_POST['name']) || !isset($_POST['pass']))
    {
        header("Location: /Zelent");
        exit();
    }
    
    require_once("DataBaseConnection.php");
    $connect= new mysqli($host, $dbUser, $dbPaswd, $dbName);

    if($connect->connect_errno!=0)
    {
        echo "Error:".$connect->connect_errno; 
    }
    else
    {        
        $login=$_POST['name'];
        $paswd=$_POST['pass'];


        $login = htmlentities($login, ENT_QUOTES, "UTF-8");


        $sql="SELECT * FROM uzytkownicy WHERE user='%s'";
        if($result=$connect->query(sprintf($sql, 
        mysqli_real_escape_string($connect, $login))))
        {
            $UserNum = $result->num_rows;
            if($UserNum>0)
            {
                $row=$result->fetch_assoc();
                if(password_verify($paswd, $row['pass']))
                {
                    $_SESSION['loged']=true;

                
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['user'];
                    $_SESSION['wood'] = $row['drewno'];
                    $_SESSION['stone'] = $row['kamien'];
                    $_SESSION['wheat'] = $row['zboze'];
                    $_SESSION['premium'] = $row['dnipremium'];
    
                    unset($_SESSION['error']);
    
                    $result->free_result();
                    header("Location: /Zelent/game.php");
                }
                else
                {
                    $_SESSION['error']='<span style="color:red">Nieprawidłowe hasło</span>';
                    header("Location: /Zelent");
                }
            }
            else
            {
                $_SESSION['error']='<span style="color:red">Nieprawidłowy login</span>';
                header("Location: /Zelent");
            }
        }

        $connect->close();
    }

?>