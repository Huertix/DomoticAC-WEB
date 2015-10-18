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
$i = pg_num_fields($result);

for ($j = 0; $j < $i; $j++) {
      echo "column $j\n";
      $fieldname = pg_field_name($res, $j);
      echo "fieldname: $fieldname\n";
      echo "printed length: " . pg_field_prtlen($res, $fieldname) . " characters\n";
      echo "storage length: " . pg_field_size($res, $j) . " bytes\n";
      echo "field type: " . pg_field_type($res, $j) . " \n\n";
  }


while($row = pg_fetch_array(($result))){
	echo "ID: ".$row["id"]."<br>LAT: ".$row["latitude"]."<br>LNG: ".$row["longitude"]
		."<br>LNG: ".$row["longitude"];
	echo "<br>===============<br>";
}


?>
