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
  $response = [
    "status" => "success",
    "message" => "login successful"
  ];
  echo json_encode($response);
  $Account = [$data["userName"], $data["password"]];
  Accounts::insert($Account);
  $accountId = Accounts::select(["id"], ["userName" => $data["userName"]]);
  $student = [$accountId,$data["userName"], $data["name"], $data["password"], $data["address"], $data["level"]];
  Students::insert($student);
}



// echo json_encode(["status" => "fail ", "message" => "joe"]);


