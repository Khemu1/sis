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

$data = json_decode(trim(file_get_contents("php://input")), true);

$error = [];

if (isset($_POST["register"])) {
  $userName = $_POST["username"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $level = intval($_POST["level"]);
  if (!Utils::validUserName($userName))
    array_push($error, "username");
  if (!Utils::validName($name))
    array_push($error, "name");
  if (!Utils::validPassword($password))
    array_push($error, "password");
  if (!Utils::validAddress($address))
    array_push($error, "address");
  if (!Utils::validLevel($level))
    array_push($error, "level");
  if (Students::select(["userName"], ["userName" => $userName]) > 0)
    array_push($error,"exists");



    if (count($error) > 0) {
      echo json_encode([
        "status" => "fail",
        "message" => "login failed",
        "errors" => $error,
      ]);
    } else {

      Accounts::insert([$userName, $password]);
      $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
      $student = [$accountId, $userName, $name, $address, $level];
      // Students::insert($student);
      // Enrollment::enroll();
      echo json_encode([
        "status" => "success",
        "message" => "login completed successfully",
        "data" => $student
      ]);
    }
}

