
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Pogoda</title>
</head>
<body>
    <div id="Info"></div> 
    <div id="map" class="map" data-lng="21.2227384" data-lat="52.219345" onmouseup=GetData()></div>
    <input type="hidden" id="lon" value="" name="lon"><!--to działa-->
    <input type="hidden" id="lat" value="" name="lat"><!--to działa-->
</body>
<script src="scripts/map/mapInput.js"></script>
</html>