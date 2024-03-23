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
  <title>login</title>
</head>

<body>
  <form method="post" action>
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="login" name="login">
  </form>
</body>

</html>

<?php

if (isset ($_POST["login"])) {
  $arr = Students::select(["userName", "password"], ["username" => $_POST["username"], "password" => $_POST["password"]]);
  if (count($arr) > 0) {
    echo "exists";
  } else {
    echo "doesn't exist";
  }
}
?>