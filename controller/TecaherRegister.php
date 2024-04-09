<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");
if (isset($_POST["register"])) {

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
      Teaches::insert([$_POST["username"], $course]);
    }
    Enrollment::enroll();
  }
  echo "submitted successfully";
} else {
  echo "Failed to create account.";
}