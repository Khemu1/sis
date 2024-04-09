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
  <link rel="stylesheet" href="RegisterS.css">
  <title>EELU Sign Up</title>
</head>
<body>

 <div class="container" width="50" height="50"align="center">
  <div class="head"><h2 >SignUp</h2>
    </div>
  <div class="body" width="200" height="200">
    <form method="Post">
  <input type="text" name="userName" value="UserName" ><br>
  <input type="text" name="name" value="name" ><br>
  <input type="text" name="password" value="Password"><br>
  <input type="text" name="address" value="address" ><br>
  <input type="text" name="level" value="level" ><br>
  <input type="submit" name="register" value="Register"><br>
    </form>
    </div>
  <div class="footer" width="200" height="200">
    <p style="font-size : 10px">Powerd by Kemet University</p>
  </div>
 </div>

</body>
</html>

<?php

if (isset($_POST["register"])){
  $userName=$_POST["userName"];
  $name=$_POST["name"];
  $password=$_POST["password"];
  $address =$_POST["address"];
  $level=$_POST["level"];
  if(Students::select(["userName"],["userName" => $userName])){
      echo "Aleady Signed in";
  }else{
    Accounts::insert([$userName, $password]);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    Students::insert([$accountId, $userName, $name, $address, $level]);
    Enrollment::enroll();
  }
  }




?>

<?php

?>
