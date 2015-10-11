<?php

$host = parse_url(getenv("DATABASE_URL"))["host"];
$database = substr(parse_url(getenv("DATABASE_URL"))["path"], 1);
$username = parse_url(getenv("DATABASE_URL"))["user"];
$password = parse_url(getenv("DATABASE_URL"))["pass"];

echo $host. "\n";
echo $database. "\n";
echo $username. "\n";
echo $password. "\n";


echo "hola";

?>
