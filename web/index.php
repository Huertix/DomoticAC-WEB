<?php

$host = parse_url(getenv("DATABASE_URL"))["host"];
$database = substr(parse_url(getenv("DATABASE_URL"))["path"], 1);
$username = parse_url(getenv("DATABASE_URL"))["user"];
$password = parse_url(getenv("DATABASE_URL"))["pass"];
$table = "track";

$connection = pg_connect("host=$host port=5432 dbname=$database user=$username password=$password");

$sql = "select * from $table";
$result = pg_Exec($connection, $sql);
while($row = pg_fetch_array(($result))){
	echo $row["id"]."---->LAT: ".$row["latitude"]."----->LNG: ".$row["longitude"];
	echo "<BR>";
}


echo "Hello World!"

?>
