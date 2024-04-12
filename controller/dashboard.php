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

if ($_SESSION["type"] = "student") {

  $data = Students::select(["accountId", "userName", "name", "address", "level"], ["accountId" => $_SESSION["id"]])[0];

  $EnrolledCourses = Courses::select(["name", "level", "hours"], ["level" => $data["level"]]);
  echo json_encode([$data, $EnrolledCourses]);
}

if ($_SESSION["type"] = "teacher") {


}
