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
  header("location:index.php");
  exit();
}

if ($_SESSION["userType"] === "student") {

  $data = Students::select(["userName", "name", "address", "level"], ["accountId" => $_SESSION["id"]])[0];

  $EnrolledCourses = Courses::select(["name", "level", "hours"], ["level" => $data["level"]]);
  $response = [
    "status" => "success",
    "type" => "student",
    "data" => $data,
    "courses" => $EnrolledCourses
  ];
  $response = json_encode($response);
  echo ($response);
  exit();
}

if ($_SESSION["userType"] === "teacher") {

  $data = Teachers::select(["userName", "name", "address"], ["accountId" => $_SESSION["id"]])[0];

  $EnrolledCourses = Enrollment::select(["courseName", "courseLevel", "courseHours", "studentUserName"], ["teacherUserName" => $data["userName"]]);
  $response = [
    "status" => "success",
    "type" => "teacher",
    "data" => $data,
    "courses" => $EnrolledCourses
  ];
  $response = json_encode($response);
  echo ($response);
  exit();
} else {
  $response = [
    "status" => "error",
    "message" => "invalid user type"
  ];
  $response = json_encode($response);
  echo ($response);
  exit();
}