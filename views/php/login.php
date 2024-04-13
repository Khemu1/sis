<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">

  <title>login</title>
</head>

<body>
  <div class="home">
    <div class="head">
      <h2>Login</h2>
    </div>
    <div class="body">
      <form method="post" action="">
        <input type="text" name="userName" class="user-name" placeholder="Username" value="Yasser"><br>
        <input type="password" name="password" class="password" placeholder="Password" value="951357"><br>
        <div class="invalid-login hide">Invalid Account</div>
        <div class="user-type">
          <label><input type="radio" name="userType" value="student" checked> Student</label>
          <label><input type="radio" name="userType" value="teacher"> Teacher</label>
        </div>
        <input type="submit" name="login" class="submit" value="Login"><br>
        <div class="links">
          <a class="link" href="StudentRegister.php">
            Register as a Student
          </a>
          <a class="link" href="TecaherRegister.php">
            Register as a Teacher
          </a>
        </div>
      </form>
    </div>
    <div class="footer">
      <p>Powered by Kemet SIS</p>
    </div>
    <a href="about.php">About us</a>
  </div>
</body>

</html>

<?php
require_once ("../../config/setup.php");
require_once ("../../models/Accounts.php");
require_once ("../../models/Courses.php");
require_once ("../../models/Enrollment.php");
require_once ("../../models/Students.php");
require_once ("../../models/Teachers.php");
require_once ("../../models/Teaches.php");
require_once ("../../models/Utils.php");


?>
<script type="module" src="../js/login.js?t=<?= time() ?>"></script>