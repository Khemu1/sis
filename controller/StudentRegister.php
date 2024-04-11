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

$data = json_decode(trim(file_get_contents("php://input")), true); // the return data from js 

$fields = [$data["userName"] ?? "", $data["name"] ?? "", $data["password"] ?? "", $data["address"] ?? "", $data["level"] ?? ""];
$errors = Utils::validateStudentFields($fields);
if (!empty($errors)) {
  $response = [
    "status" => "fail",
    "message" => "login failed",
    "errors" => $errors
  ];
  echo json_encode($response);
} else {
  $Account = [$data["userName"], $data["password"]];
  Accounts::insert($Account);
  $accountId = intval(Accounts::select(["id"], ["userName" => $data["userName"]])[0]["id"]);
  $student = [$accountId, $data["userName"], $data["name"], $data["address"], $data["level"]];
  Students::insert($student);
  Enrollment::enroll();

  $response = [
    "status" => "success",
    "message" => "login successful",
  ];
  echo json_encode($response);


}



// echo json_encode(["status" => "fail ", "message" => "joe"]);


