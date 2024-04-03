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
    <input type="text" name="username" placeholder="username">
    <input type="text" name="name" placeholder="name">
    <input type="password" name="password" placeholder="password">
    <input type="text" name="address" placeholder="address">
    <div class="dropdown">
      <label>Choose Your Courses</label>
      <div class="dropdown-content">
        <div class="checkbox-content">
          <label>
            <input type="checkbox" name="courses[]" value="Electronics"> Electronics
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Math-1"> Math-1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Math-0"> Math-0
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Human Rights"> Human Rights
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Technical Report"> Technical Report
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Discrete Math"> Discrete Math
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Programming 1"> Programming 1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Logic Design"> Logic Design
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Math-2"> Math-2
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Probability and Statistics 1"> Probability and Statistics 1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Microeconomics"> Microeconomics
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Introduction to Networking"> Introduction toNetworking
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Introduction to Database"> Introduction to Database
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Introduction to Software Engineering"> Introduction
            toSoftware Engineering
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Programming 2"> Programming 2
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label>
          <br>
          <label>
            <input type="checkbox" name="courses[]" value="Math-3"> Math-3
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Probability and Statistics 2"> Probability and Statistics 2
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Data Structures"> Data Structures
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Web"> Web
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Machine Learning"> Machine Learning
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Introduction to Operation Research"> Introduction to
            Operation Research
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Network Labs"> Network Labs
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" value="Entrepreneurship"> Entrepreneurship
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
        </div>
      </div>

    </div>
    <input type="submit" value="register" name="register">
  </form>
</body>

</html>

<?php
if (isset($_POST["register"])) {
  if (!empty($_POST["username"]) && !empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["address"]) && count($_POST["courses"]) != 0) {

    $account = [$_POST["username"], $_POST["password"]];
    if (Accounts::insert($account)) {
      $accountId = intval(Accounts::select(["id"], ["userName" => $_POST["username"]])[0]["id"]);
      $courses = $_POST["courses"];
      $teacherData = [
        $accountId,
        $_POST["username"],
        $_POST["name"],
        $_POST["address"],
      ];
      Teachers::insert($teacherData);
      for ($i = 0; $i < count($courses); $i++) {
        $course = $courses[$i];
        Teaches::insert([
          $_POST["username"],
          $course
        ]);
      }
      Enrollment::enroll();

    }

  } else {
    echo "Failed to create account.";
  }

}

?>