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
  <title>Student Registertion</title>
</head>

<body>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="username" require>
    <input type="text" name="name" placeholder="name" require>
    <input type="password" name="password" placeholder="password" require>
    <input type="text" name="address" placeholder="address" require>
    <input type="number" name="national_id" placeholder="National Id" require>
    <input type="number" name="level" placeholder="level" require>
    <input type="submit" value="register" name="register">
  </form>
</body>

</html>

<?php

if (isset ($_POST["register"])) {
  if (!(empty ($_POST["username"]) && empty ($_POST["name"]) && empty ($_POST["password"]) && empty ($_POST["address"]) && empty ($_POST["national_id"]) && empty ($_POST["level"]))) {
    if (count($data) === 6) {
      $data = ["username" => $_POST["username"], "name" => $_POST["name"], "password" => $_POST["password"], "address" => $_POST["address"], "nationalId" => $_POST["national_id"], "year" => $_POST["level"]];
    }
  } else {
    echo "please fill all fields";
  }
}

?>