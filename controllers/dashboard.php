<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");

header("Content-Type: application/json");


session_start();
if (!$_SESSION["id"]) {
  header("location:login.php");
  exit();
}

if ($_SESSION["type"] == "student") {

  $data = Students::select(["userName", "name", "address", "level"], ["accountId" => $_SESSION["id"]])[0];

  $EnrolledCourses = Courses::select(["name", "level", "hours"], ["level" => $data["level"]]);
  echo json_encode(["student", $data, $EnrolledCourses]);
  exit();
}

if ($_SESSION["type"] == "teacher") {

  $data = Teachers::select(["userName", "name", "address"], ["accountId" => $_SESSION["id"]])[0];

  $EnrolledCourses = Enrollment::select(["courseName", "courseLevel", "courseHours", "studentUserName"], ["teacherUserName" => $data["userName"]]);
  echo json_encode(["teacher", $data, $EnrolledCourses, $_SESSION["theme"] ? "dark" : "white"]);
  exit();
}
