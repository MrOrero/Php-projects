<?php
require_once 'includes/header2.php';
?>

<body class = "sexy">
<h1> User log in </h1>
<div class = "login-page">
  <div class = "form">
    <form action="includes/userlog-inc.php" method="post" class="login-form">
      <input type="tel" name="number"placeholder="phone number">
      <input type="password" name="password" placeholder="Password">
      <button name="submit" type="submit"> LOG-IN </button>
        <p class = "message"> Not registered? <a href = "userreg.php"> Register here </a> </p>
    </form>
  </div>
</div>
</body>

<?php
require_once 'includes/footer.php';
?>
