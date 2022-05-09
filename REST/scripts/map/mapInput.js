var mapObj;
var coord = [21.2227384, 52.219345];
var lonObj=document.getElementById("lon");
var latObj=document.getElementById("lat");
var map;
var styleMarker;
var marker;
var featureMarker;
var moveMarker;
var vector;
var hit;

styleMarker = new ol.style.Style({
  image: new ol.style.Icon({
      src: 'scripts/map/marker.png'
  })
});


    mapObj = document.getElementById("map");
    if(mapObj!=undefined)
    { 
        if(lonObj==undefined)
        {
            lonObj=document.getElementById("lon");
            latObj=document.getElementById("lat");
        }
        coord[0]=mapObj.dataset.lng;
        coord[1]=mapObj.dataset.lat;
        marker = new ol.geom.Point(ol.proj.fromLonLat(coord));
        featureMarker = new ol.Feature(marker);
        
        vector = new ol.layer.Vector(
        {
            source: new ol.source.Vector({
                features: [featureMarker]
            }),
            style: [styleMarker]
        })
        
        map = new ol.Map(
            {
                target: mapObj,
                layers: [new ol.layer.Tile({ source: new ol.source.OSM() }), vector],
                view: new ol.View(
                { 
                    center: ol.proj.fromLonLat(coord),
                    zoom: 14 
                })
            });

        moveMarker = new ol.interaction.Translate(
        {
            features: new ol.Collection([featureMarker])
        });    
        map.addInteraction(moveMarker);

        map.on('pointermove', function(e) 
        {
            if (e.dragging) return;
            hit = map.hasFeatureAtPixel(map.getEventPixel(e.originalEvent));
            lonObj.value = new ol.proj.toLonLat(marker.flatCoordinates)[0];
            latObj.value = new ol.proj.toLonLat(marker.flatCoordinates)[1];
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });
    }

    function GetData()
    {
        var PastePlace = document.getElementById("Info")
        $.ajax
        ({
            async: false,
            url:"scripts/GetData.php",
            method:"POST",
            data:
            {
                lat:latObj.value,
                lon:lonObj.value
            },
            success:function(out)
            {
                PastePlace.innerText=out;
                console.log(out);
            }
        })
    }