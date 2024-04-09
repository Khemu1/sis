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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Registertion</title>

  <!-- <link rel="stylesheet" href="../assets/css/StudentRegister.css"> -->

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
    <input type="text" class="user-name" name="userName" placeholder="username" require>
    <input type="text" name="name" class="name" placeholder="name" require>
    <input type="password" class="password" name="password" placeholder="password" require>
    <input type="text" name="address" class="address" placeholder="address" require>
    <div class="dropdown">
      <label>Choose Your Courses</label>
      <div class="dropdown-content">
        <div class="checkbox-content">
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Electronics"> Electronics
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Math-1"> Math-1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Math-0"> Math-0
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Human Rights"> Human Rights
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Technical Report"> Technical Report
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Discrete Math"> Discrete Math
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Programming 1"> Programming 1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Logic Design"> Logic Design
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Math-2"> Math-2
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Probability and Statistics 1"> Probability and
            Statistics 1
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Microeconomics"> Microeconomics
            <input type="hidden" name="levels[]" value="1">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Introduction to Networking"> Introduction
            toNetworking
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Introduction to Database"> Introduction to
            Database
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Introduction to Software Engineering">
            Introduction
            toSoftware Engineering
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Programming 2"> Programming 2
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label>
          <br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Math-3"> Math-3
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Probability and Statistics 2"> Probability and
            Statistics 2
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Data Structures"> Data Structures
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Web"> Web
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Machine Learning"> Machine Learning
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Introduction to Operation Research">
            Introduction to
            Operation Research
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="3">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Network Labs"> Network Labs
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
          <label>
            <input type="checkbox" name="courses[]" class="course" value="Entrepreneurship"> Entrepreneurship
            <input type="hidden" name="levels[]" value="2">
            <input type="hidden" name="hours[]" value="2">
          </label><br>
        </div>
      </div>

    </div>
    <input type="submit" value="register" class="submit" name="register">
  </form>
</body>

</html>


<script type="module" src="../js/TecaherRegister.js?t=<?= time() ?>"></script>