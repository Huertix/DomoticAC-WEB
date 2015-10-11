<?php

$host = parse_url(getenv("DATABASE_URL"))["host"];
$database = substr(parse_url(getenv("DATABASE_URL"))["path"], 1);
$username = parse_url(getenv("DATABASE_URL"))["user"];
$password = parse_url(getenv("DATABASE_URL"))["pass"];
$table = "track";

$connection = pg_connect("host=$host port=5432 dbname=$database user=$username password=$password");

$id = $_POST["id"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$bat_sta = $_POST["bat_sta"];
$bat_lvl = $_POST["bat_lvl"];


if($lat){

	$sqlDel = "delete from track where id = $id;";

	pg_query($connection, $sqlDel);

	$sqlUpdate = "insert into track (id, latitude,longitude,battery_status,battery_level) 
					values($id , '$lat', '$lng', '$bat_sta', '$bat_lvl');";



	pg_query($connection, $sqlUpdate);
	echo $sqlUpdate;
	echo "<br>";


}



$sql = "select * from $table order by id;";
$result = pg_Exec($connection, $sql);
while($row = pg_fetch_array(($result))){
	echo "ID: ".$row["id"]."<br>LAT: ".$row["latitude"]."<br>LNG: ".$row["longitude"];
	echo "<br>===============<br>";
}


?>
