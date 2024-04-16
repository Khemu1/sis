<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");
$arr = [];
if (isset($_POST["register"])) {
  $arr = Utils::validateStudentFields([
    $_POST["userName"],
    $_POST["name"],
    $_POST["password"],
    $_POST["address"],
    $_POST["level"]
  ]);
  $userName = $_POST["userName"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $level = $_POST["level"];
  if (empty($arr)) {
    $Account = [$userName, $password];
    Accounts::insert($Account);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    $student = [$accountId, $userName, $name, $address, $level];
    Students::insert($student);
    Enrollment::enroll();
    $_SESSION["id"] = $accountId;
    $_SESSION["userName"] = $userName;
    $_SESSION["type"] = "student";
  }
}
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

  <div class="container">
    <div class="head">
      <h2>SignUp</h2>
    </div>
    <div class="body">
      <form method="Post">
        <input type="text" name="userName" class="user-name" placeholder="UserName"><br>
        <?php
        echo $arr["userName"] ?? " ";
        ?>
        <input type="text" name="name" class="name" placeholder="name"><br>
        <?php
        echo $arr["name"] ?? " ";
        ?>
        <input type="text" name="password" class="password" placeholder="Password"><br>
        <?php


        echo $arr["password"] ?? " ";
        ?>
        <input type="text" name="address" class="address" placeholder="address"><br>
        <?php
        echo $arr["address"] ?? " ";
        ?>

        <input type="text" name="level" class="level" placeholder="level"><br>
        <?php


        echo $arr["level"] ?? " ";
        ?>
        <input type="submit" name="register" placeholder="Register"><br>
      </form>
    </div>
    <div class="footer" >
      <p>Powerd by Kemet SIS</p>
    </div>
  </div>

</body>

</html>
<script type="module" src="../js/StudentRegister.js?t=<?= time() ?>"></script>