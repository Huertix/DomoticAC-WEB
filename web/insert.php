<?php


$lat = $_POST["lat"];
$lng = $_POST["lng"];
$bat_sta = $_POST["bat_sta"];
$bat_lvl = $_POST["bat_lvl"];



$sql = "UPDATE track
SET latitude=$lat,longitude=$lng,battery_status=$bat_sta,battery_level=$bat_lvl 
WHERE id=1";


$result = pg_query($connection, $sql);
$row_count= pg_num_rows($result);
            pg_free_result($result);
        pg_close($dbconn);



?>