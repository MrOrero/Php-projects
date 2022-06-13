<?php
require_once 'includes/header.php';
?>
<body class="sexy">
<h3 class = "h1">Rider registration</h3>
<div class = "login-page">
    <div class = "form">
      <form action="includes/register-inc.php" method="post"class = registration-form>
         <input type="text" name="first" placeholder="First Name">
         <input type="text" name="last" placeholder="Last Name">
         <input type="text" name="mail" placeholder="Email Address">
         <input type="tel" name="number" placeholder="Phone number">
         <input type="password" name="password" placeholder="Password">
         <input type="password" name="confirmPassword" placeholder="Confirm password">
         <button type="submit" name="submit"> REGISTER </button>
         <p class = "message"> Already registered? <a href = "login.php"> Log-in </a> </p>
      </form>
    </div>
 </div>
</body>
 <?php
 require_once 'includes/footer.php';
 ?>
