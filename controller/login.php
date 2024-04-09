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

if (isset($data["login"])) {
  $userName = $data["username"];
  $password = $data["password"];
  $account = Accounts::select(["id", "userName", "Password"], ["userName" => $userName, "password" => $password]);

  if (count($account) > 0) {
    $_SESSION["id"] = $account[0];
    echo json_encode([
      "status" => "success",
      "message" => "login successful",
      "data" => $account[0],
    ]);
  } else {
    echo json_encode([
      "status" => "fail",
      "message" => "login failed",
    ]);
  }
}
