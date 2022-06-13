<?php

  $dbHost = "localhost";
  $dbUser = "root";
  $dbPassword = "";
  $dbName = "project";

  $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

  if(!$conn){
      die("Database connection Unsuccesful");
  }
  ?>
