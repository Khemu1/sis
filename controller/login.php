<?php
require_once ("../config/setup.php");
require_once ("../classes/Students.php");
require_once ("../classes/Teachers.php");
require_once ("../classes/Courses.php");
require_once ("../classes/Accounts.php");
require_once ("../classes/Enrollment.php");
require_once ("../classes/Teaches.php");

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
