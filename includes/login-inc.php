<?php
if (isset($_POST['submit'])){
  require 'database.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(empty($email) || empty($password)){
    header("Location: ../login.php?error=emptyfields");
    exit();
  }else{
    $sql = "SELECT * FROM projectusers WHERE email =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../login.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $passCheck = password_verify($password, $row['password']);
          if ($passCheck == false ) {
            header("Location: ../login.php?error=wrongpassword");
            exit();
          } elseif ($passCheck == true) {
          session_start();
            $_SESSION['sessionId'] = $row['id'];
            $_SESSION['sessionEmail'] = $row['email'];
            $_SESSION['sessionFirstName'] = $row['firstname'];

            header("Location: ../loggedin.php?success=loggedin");
            exit();
          } else {
          header("Location: ../login.php?error=wrongpassword");
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
