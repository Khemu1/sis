<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">

  <title>login</title>
</head>

<body class="body-dark">
  <div class="home container-dark">
    <input type="checkbox" id="theme-switcher" class="theme-switcher">
    <label class="switch" for="theme-switcher"></label>
    <div class="head">
      <img class="main hide" src="../../assets/images/kemet-high-resolution-logo-transparent.svg">
      <img class="secondary" src="../../assets/images/kemet-high-resolution-logo-black-transparent.svg">
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
          <a class="link font-dark" href="StudentRegister.php">
            Register as a Student
          </a>
          <a class="link font-dark" href="TecaherRegister.php">
            Register as a Teacher
          </a>
        </div>
      </form>
    </div>
    <div class="footer">
      <p class="font-dark">Powered by Kemet SIS</p>
    </div>
    <a href="about.php" class="font-dark">About us</a>
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