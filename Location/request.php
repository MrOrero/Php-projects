<?php

    require 'location.php';
    $edu = new education;
    $edu->setId($_REQUEST['id']);
    $status = $edu->updateRequest();
    if($status == true) {
      echo "Updated...";
    } else {
      echo "Failed...";
    }print_r($_REQUEST);
 ?>
