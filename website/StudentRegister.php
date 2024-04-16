<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/StudentRegister.css">
  <title>Kemet Sign Up</title>
</head>

<body>

  <div class="container" width="50" height="50" align="center">
    <div class="head">
      <h2>SignUp</h2>
    </div>
    <div class="body" width="200" height="200">
      <form method="Post">
        <input type="text" name="userName" class="user-name" placeholder="UserName"><br>
        <input type="text" name="name" class="name" placeholder="name"><br>
        <input type="text" name="password" class="password" placeholder="Password"><br>
        <input type="text" name="address" class="address" placeholder="address"><br>
        <input type="text" name="level" class="level" placeholder="level"><br>
        <input type="submit" name="register" placeholder="Register"><br>
      </form>
    </div>
    <div class="footer" width="200" height="200">
      <p style="font-size : 10px">Powerd by Kemet University</p>
    </div>
  </div>

</body>

</html>

<?php

if (isset($_Post["register"])) {
  $userName = $_Post["userName"];
  $name = $_Post["name"];
  $password = $_Post["password"];
  $address = $_Post["address"];
  $level = $_Post["level"];

  if (count(Accounts::select(["userName"], ["userName" => $userName])) > 0) {
    echo "Used username";
  }else{
    Accounts::insert(["userName" => $userName]);
    Enrollment::enroll();
  }
}
?>

<script type="module" src="../js/StudentRegister.js?t=<?= time() ?>"></script>
