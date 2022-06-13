<?php
//require 'database.php';
//require 'location.php';
//$conn = new DbConnect;
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "project";

$con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
$query = "SELECT * FROM location where name like 'hans' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)){

  echo $row['name'];
}

?>
