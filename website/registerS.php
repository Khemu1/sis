<?php
require_once ("../config/setup.php");
require_once ("../classes/Students.php");
require_once ("../classes/Teachers.php");
require_once ("../classes/Courses.php");
require_once ("../classes/Accounts.php");
require_once ("../classes/Enrollment.php");
require_once ("../classes/Teaches.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registertion</title>
</head>

<body>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="username" require>
    <input type="text" name="name" placeholder="name" require>
    <input type="password" name="password" placeholder="password" require>
    <input type="text" name="address" placeholder="address" require>
    <input type="number" name="level" placeholder="level" require>
    <input type="submit" value="register" name="register">
  </form>
</body>

</html>

<?php

if (isset($_POST["register"])) {
  if (!(empty($_POST["username"]) && empty($_POST["name"]) && empty($_POST["password"]) && empty($_POST["address"]) && empty($_POST["level"]))) {
    $userName = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $level = intval($_POST["level"]);
    if ($level === 1 || $level === 2) {
      Accounts::insert([$userName, $password]);
      $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
      Students::insert([$accountId, $userName, $name, $address, $level]);
      Enrollment::enroll();
    }
  }
}

?>