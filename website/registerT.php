<?php
require_once ("../config/setup.php");
require_once ("../classes/Students.php");
require_once ("../classes/Teachers.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Registertion</title>

  <style>
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 12px 16px;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="username" required>
    <input type="text" name="name" placeholder="name" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="text" name="address" placeholder="address" required>
    <input type="number" name="national_id" placeholder="National Id" required>
    <div class="dropdown">
      <label for="cars">You Courses</label>
      <div class="dropdown-content">
        <input type="checkbox" id="java" name="courses" value="java">
        <label for="java">java</label><br>
        <input type="checkbox" id="C++" name="courses" value="C++">
        <label for="C++">C++</label><br>
      </div>
    </div>
    <input type="submit" value="Submit">
    <input type="submit" value="register" name="register">
  </form>
</body>

</html>

<?php

if (isset ($_POST["register"])) {
  if (!(empty ($_POST["username"]) && empty ($_POST["name"]) && empty ($_POST["password"]) && empty ($_POST["address"]) && empty ($_POST["national_id"]) && empty ($_POST["level"]))) {
    $data = ["username" => $_POST["username"], "name" => $_POST["name"], "password" => $_POST["password"], "address" => $_POST["address"], "nationalId" => $_POST["national_id"], ["courses" => $_POST["courses"]]];
    if (count($data) === 6) {
      Teachers::insert($data);
    }
  } else {
    echo "please fill all fields";
  }
}

?>