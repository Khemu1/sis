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


if ($data["type"] === "student") {
  $userName = $data["userName"] ?? "";
  $password = $data["password"] ?? "";
  $account = Accounts::select(["id", "userName", "Password"], ["userName" => $userName, "password" => $password]);
  $confirmation = Utils::designation(intval($account[0]["id"]));
  if (count($account) > 0 && $confirmation === "student") {

    $jarr = json_encode($account[0]);
    $response = [
      "status" => "success",
      "message" => "login successful",
      "id" => intval($account[0]["id"]),
      "type" => $confirmation
    ];
    echo json_encode($response);
    $_SESSION["id"] = intval($account[0]["id"]);

  } else {
    echo json_encode([
      "status" => "fail",
      "message" => "login failed",
    ]);
    exit();
  }
} else if ($data["type"] === "teacher") {
  $userName = $data["username"] ?? "";
  $password = $data["password"] ?? "";
  $account = Accounts::select(["id", "userName", "Password"], ["userName" => $userName, "password" => $password]);
  $confirmation = Utils::designation(intval($account[0]["id"]));
  if (count($account) > 0 && $confirmation === "teacher") {
    $_SESSION["id"] = intval($account[0]["id"]);
    $_SESSION["userName"] = $account[0]["userName"];


    $jarr = json_encode($account[0]);
    $response = [
      "status" => "success",
      "message" => "login successful",
      "id" => intval($account[0]["id"]),
      "type" => $confirmation
    ];
    echo json_encode($response);

  } else {
    echo json_encode([
      "status" => "fail",
      "message" => "login failed",
    ]);
    exit();
  }
} else {
  echo json_encode([
    "status" => "fail",
    "message" => "login failed",
  ]);
  exit();
}



