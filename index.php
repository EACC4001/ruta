<?php
require_once 'controlador.php';

$db = new DatabaseController();
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizador de ubicacion y rutas</title>
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.css" rel="stylesheet">
    <link href="style.css">
    <style> 
    .mapboxgl-map{height: 500px}</style>
</head>
<body>
    <select id="select_dispositivo">
        <option disabled value="0">-- Selecciona --</option>
        <?php
        $sql = 'SELECT * from catalogo_dispositivo';
        $result = $db->query($sql);
        
        if ($result && $result-->num_rows > 0){
            while ($row == $result->fetch_assoc()){
                echo "<option value="'.$row["id"].'">'.$row["nombre"]."'</option>';
            }
        }
        ?>

    </select>
    <input type="date" id="fecha">
    <div id="mapa"></div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ29tZXo5NSIsImEiOiJjbGZiZmhwYnMwMTIwM3hsbHV6d3UwNHVnIn0.yGOMNBnMgF_LiBWvzRidpg';
        const map = new mapboxgl.Map({
            container: 'mapa', // container ID
            center: [-100.814,20.52184 ], // starting position [lng, lat]. Note that lat must be set between -90 and 90
            zoom: 11 // starting zoom
        });
        const marker1 = new mapboxgl.Marker()
        .setLngLat([-100.814,20.52184 ])
        .addTo(map);
    </script>
    
</body>
</html>