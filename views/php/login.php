<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">

  <title>login</title>
</head>

<body>
  <div class="container">
    <div class="head">
      <h2>Login</h2>
    </div>
    <div class="body">
      <form method="post" action="">
        <input type="text" name="username" class="user-name" placeholder="Username" value="Omar951"><br>
        <input type="password" name="password" class="password" placeholder="Password" value="951357"><br>
        <div class="user-type">
          <label><input type="radio" name="userType" value="student" checked> Student</label>
          <label><input type="radio" name="userType" value="teacher"> Teacher</label>
        </div>
        <input type="submit" name="login" class="submit" value="Login"><br>
      </form>
    </div>
    <div class="footer">
      <p>Powered by Kemet University</p>
    </div>
  </div>
</body>

</html>

<?php

?>
<script type="module" src="../js/login.js?t=<?= time() ?>"></script>