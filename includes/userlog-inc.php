<?php
if (isset($_POST['submit'])){
  require 'database.php';
  $phoneNumber = $_POST['number'];
  $password = $_POST['password'];

  if(empty($phoneNumber) || empty($password)){
    header("Location: ../userlog.php?error=emptyfields");
    exit();
  }else{
    $sql = "SELECT * FROM users WHERE phoneNumber =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../userlog.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "s", $phoneNumber);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $passCheck = password_verify($password, $row['password']);
          if ($passCheck == false ) {
            header("Location: ../userlog.php?error=wrongpassword");
            exit();
          } elseif ($passCheck == true) {
          session_start();
            $_SESSION['sessionId'] = $row['id'];
            $_SESSION['sessionUsername'] = $row['username'];
            $_SESSION['sessionPhoneNumber'] = $row['phoneNumber'];
            $_SESSION['sessionEmail'] = $row['email'];

            header("Location: ../userloggedin.php?success=loggedin");
            exit();
          } else {
          header("Location: ../userlog.php?error=wrongpassword");
          exit();
          }
      }
        else {
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
    }
  }

else{
  header("Location: ../index.php?error=accessforbidden");
  exit();
}
?>
