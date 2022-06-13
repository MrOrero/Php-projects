<?php
if (isset($_POST['submit'])){

    require 'database.php';
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $email = $_POST['mail'];
    $phoneNumber = $_POST['number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if(empty($firstName) || empty($firstName) || empty($email) || empty($phoneNumber) || empty($password) || empty($confirmPassword)){
      header("Location: ../register.php?error=emptyfields");
      exit();
    } elseif (!preg_match("/^[a-zA-z0-9@.]*/", "$email")) {
      header("Location: ../register.php?error=invlalidmail");
      exit();
    }elseif ($password !== $confirmPassword) {
      header("Location: ../register.php?error=passworddonotmatch");
      exit();
    }else {
      $sql = "SELECT email FROM projectusers WHERE email = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../register.php?error=sqlerrror");
          exit();
      }else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0){
          header("Location: ../register.php?error=emailtaken");
          exit();
        }else{
          $sql = "INSERT INTO projectusers (firstName, lastName, email, phoneNumber, password) VALUES (?,?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../register.php?error=sqlerrror");
              exit();
          } else {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssis", $firstName, $lastName, $email, $phoneNumber, $hashedPass);
            mysqli_stmt_execute($stmt);
            header("Location: ../register.php?sucess=registered");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
