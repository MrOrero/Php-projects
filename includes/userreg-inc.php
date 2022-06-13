<?php
if (isset($_POST['submit'])){

    require 'database.php';
    $UserName = $_POST['Username'];
    $email = $_POST['mail'];
    $phoneNumber = $_POST['number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if(empty($UserName) || empty($email) || empty($phoneNumber) || empty($password) || empty($confirmPassword)){
      header("Location: ../userreg.php?error=emptyfields");
      exit();
    } elseif (!preg_match("/^[a-zA-z0-9@.]*/", "$email")) {
      header("Location: ../userreg.php?error=invlalidmail");
      exit();
    }elseif ($password !== $confirmPassword) {
      header("Location: ../userreg.php?error=passworddonotmatch");
      exit();
    }else {
      $sql = "SELECT phoneNumber FROM users WHERE phoneNumber = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../userreg.php?error=sqlerrror");
          exit();
      }else {
        mysqli_stmt_bind_param($stmt, "s", $phoneNumber);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0){
          header("Location: ../userreg.php?error=phoneNumbertaken");
          exit();
        }else{
          $sql = "INSERT INTO users (username, email, phoneNumber, password) VALUES (?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../userreg.php?error=sqlerrror");
              exit();
          } else {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssis", $UserName, $email, $phoneNumber, $hashedPass);
            mysqli_stmt_execute($stmt);
            header("Location: ../userreg.php?sucess=registered");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
