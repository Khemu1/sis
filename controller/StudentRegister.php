<?php

if (isset($_POST["register"])) {
  $userName = $_POST["username"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $level = intval($_POST["level"]);
  if ($level === 1 || $level === 2) {
    Accounts::insert([$userName, $password]);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    Students::insert([$accountId, $userName, $name, $address, $level]);
    Enrollment::enroll();
  }

}

