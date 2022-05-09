<?php
    if(isset($_POST['lat']))
    {
        $lat =  $_POST['lat'];   
        $lon =  $_POST['lon'];

        $ch = curl_init("https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=0f5777f5a766054e61db2186b04d993a");
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $request = curl_exec($ch);
    
        curl_close($ch);
    
        $data = json_decode($request, true);
    
        echo "Temperatura w ".($data['name'])." wynosi ".($data['main']['temp']-273)."C";
    }
    else
    {
        header("Location: ../");
    }
?>