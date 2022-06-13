<?php
  require_once 'includes\database.php';

  $riderid = $_POST['text1'];
  $userid = $_POST['text2'];
  echo $riderid;
  echo $userid;
  // echo "string";
  $sql = "UPDATE users SET request = $riderid  WHERE id = $userid";
  $query_run = mysqli_query($conn,$sql);
  // $stmt = $this->conn->prepare($sql);
  if($query_run) {
      echo "Updated...";
    } else {
      echo "Failed...";
    }
?>
