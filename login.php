<?php
require_once 'includes/header.php';
?>

<body class = "sexy">
<h1>RIDER LOG IN </h1>
<div class = "login-page">
  <div class = "form">
    <form action="includes/login-inc.php" method="post" class="login-form">
      <input type="tel" name="email"placeholder="E-mail">
      <input type="password" name="password" placeholder="Password">
      <button name="submit" type="submit"> LOG-IN </button>
        <p class = "message"> Not registered? <a href = "register.php"> Register here </a> </p>
    </form>
  </div>
</div>
</body>

<?php
require_once 'includes/footer.php';
?>
