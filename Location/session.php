<?php
session_start();
if (isset($_SESSION['sessionId'])) {
  //echo $_SESSION['sessionEmail'];
  //echo $_SESSION['sessionPhoneNumber'];
  //echo $_SESSION['sessionUsername'];
}else {
  echo "wahala";
}
?>
