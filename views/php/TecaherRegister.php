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
  <link rel="stylesheet" href="../css/TeacherRegister.css">
  <title>Teacher Registration</title>
</head>

<body class="body-dark">
  <div class="container container-dark">
    <div class="theme-switcher"">
    <img src=" ../../assets/icons/theme icon.png">
    </div>
    <div class="head">
      <img class="main" src="../../assets/images/kemet-high-resolution-logo-transparent-login.png">
      <img class="secondary" src="../../assets/images/kemet-high-resolution-logo-black-transparent-login.png">
    </div>
    <div class="body">
      <h3>Teacher Registertion Form</h3>
      <form method="POST">
        <input type="text" name="userName" class="user-name" placeholder="UserName"><br>
        <div class="invalid-user-name hide">Invalid Username: The minimum length must be 6 characters and doesn't
          contain any symbols</div>
        <div class="used-username hide">This username is already used</div>
        <input type="text" name="name" class="name" placeholder="name"><br>
        <div class="invalid-name hide">Invalid name: The minimum length must be 6 characters and doesn't
          contain any symbols or numbers</div>

        <input type="password" name="password" class="password" placeholder="Password"><br>
        <div class="invalid-password hide">Invalid password: The minimum length must be 6 characters </div>

        <input type="text" name="address" class="address" placeholder="address"><br>
        <div class="invalid-address hide">Invalid address : The minimum length must be 6 characters and can contain
          numbers and sybmols like ",."</div>
        <div class="dropdown">
          <label class="font-dark">Choose Courses</label>
          <div class="dropdown-content">
            <div class="checkbox-content">
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Electronics"> Electronics
              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Math-1"> Math-1
              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Math-0"> Math-0
              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Human Rights"> Human Rights
              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Technical Report"> Technical Report

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Discrete Math"> Discrete Math

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Programming 1"> Programming 1

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Logic Design"> Logic Design

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Math-2"> Math-2

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Probability and Statistics 1">
                Probability and
                Statistics 1

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Microeconomics"> Microeconomics

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Introduction to Networking">
                Introduction
                toNetworking

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Introduction to Database"> Introduction
                to
                Database

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Introduction to Software Engineering">
                Introduction
                toSoftware Engineering

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Programming 2"> Programming 2

              </label>
              <br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Math-3"> Math-3

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Probability and Statistics 2">
                Probability and
                Statistics 2

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Data Structures"> Data Structures

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Web"> Web

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Machine Learning"> Machine Learning

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Introduction to Operation Research">
                Introduction to
                Operation Research

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Network Labs"> Network Labs

              </label><br>
              <label>
                <input type="checkbox" name="courses[]" class="course" value="Entrepreneurship"> Entrepreneurship

              </label><br>
            </div>
          </div>
        </div>
        <div class="invalid-courses hide">Invalid number of courses : Please choose atleast one course </div>
        <input type="submit" name="register" value="Register"><br>
        <a class="font-dark" href="login.php">Login</a>


      </form>
    </div>
    <div class="footer">
      <p>Powered by Kemet SIS</p>
    </div>
  </div>

</body>

</html>


<script type="module" src="../js/TecaherRegister.js?t=<?= time() ?>"></script>
<script type="module" src="../js/Utils.js?t=<?= time() ?>"></script>