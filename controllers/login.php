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

$data = json_decode(trim(file_get_contents("php://input")), true);


if ($data["type"] === "student") {
  $userName = $data["userName"] ?? "";
  $password = $data["password"] ?? "";
  $account = Accounts::select(["id", "userName", "Password"], ["userName" => $userName, "password" => $password]);
  if (count($account) > 0) {
    $confirmation = Utils::designation(intval($account[0]["id"]));
    if ($confirmation !== "student") {
      echo json_encode([
        "status" => "fail",
        "message" => "login failed",
        "errors" => ["invalid account" => "couldn't find this account"]
      ]);
      exit();
    }
    $_SESSION["id"] = intval($account[0]["id"]);
    $_SESSION["userName"] = $account[0]["userName"];
    $_SESSION["type"] = "student";
    $_SESSION["theme"] = $data["theme"];

    $jarr = json_encode($account[0]);
    $response = [
      "status" => "success",
      "message" => "login successful",
      "type" => "student",
    ];
    echo json_encode($response);
    exit();


  } else {

    echo json_encode([
      "status" => "fail",
      "message" => "login failed",
      "errors" => ["invalid account" => "couldn't find this account"]
    ]);
    exit();
  }
} else if ($data["type"] === "teacher") {
  $userName = $data["userName"] ?? "";
  $password = $data["password"] ?? "";
  $account = Accounts::select(["id", "userName", "Password"], ["userName" => $userName, "password" => $password]);
  if (count($account) > 0) {
    $confirmation = Utils::designation(intval($account[0]["id"]));
    if ($confirmation !== "teacher") {
      echo json_encode([
        "status" => "fail",
        "message" => "login failed",
        "errors" => ["invalid account" => "couldn't find this account"]
      ]);
      exit();
    }

    $_SESSION["id"] = intval($account[0]["id"]);
    $_SESSION["userName"] = $account[0]["userName"];
    $_SESSION["type"] = "teacher";
    $_SESSION["theme"] = $data["theme"];


    $jarr = json_encode($account[0]);
    $response = [
      "status" => "success",
      "message" => "login successful",
      "id" => intval($account[0]["id"]),
      "type" => "teacher"
    ];
    echo json_encode($response);
    exit();

  } else {
    echo json_encode([
      "status" => "fail",
      "message" => "login failed",
      "errors" => ["invalid account" => "couldn't find this account"]
    ]);
    exit();
  }
} else {
  echo json_encode([
    "status" => "fail",
    "message" => "login failed",
    "errors" => ["invalid account" => "couldn't find this account"]
  ]);
  exit();
}



