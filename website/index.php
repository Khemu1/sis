<?php

use function PHPSTORM_META\type;

require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");

session_start();

if (isset($_POST["login"])) {
    $account = [];
    $data = Accounts::select(["id", "userName"], ["userName" => $_POST["userName"], "password" => $_POST["password"]]);
    if (!empty($data)) {
        $id = $data[0]["id"];
        $type = Utils::designation($id);
        if ($_POST["userType"] === "student" && $type === "student") {
            $account = Students::select(["id", "userName"], ["accountId" => $id]);
            $_SESSION["id"] = $id;
            $_SESSION["userName"] = $account[0]["userName"];
            $_SESSION["userType"] = "student";
            var_dump($_SESSION);
            header("location: home.php");
            exit();
        } else if ($_POST["userType"] === "teacher" && $type === "teacher") {
            $account = Teachers::select(["id", "userName"], ["accountId" => $id]);
            $_SESSION["id"] = $id;
            $_SESSION["userName"] = $account[0]["userName"];
            $_SESSION["userType"] = "teacher";
            var_dump($_SESSION);
            header("location: home.php");
            exit();
        }
    }
    $account["account"] = "Invalid Account";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
   <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form >
            <div class="form-group">
                <input type="text" name="userName" class="user-name" placeholder="Username">
                <?php
                echo $account["account"] ?? "";
                ?>
            </div>
            <div class="form-group">
                <input type="password"  name="password" class="password" placeholder="Password" >
                <?php
                echo $account["account"] ?? "";
                ?>
            </div>
            <div class="radio-group">
                <input type="radio" id="Teacher" name="userType" value="Teacher" required>
                <label for="Teacher">Teacher</label>
                <input type="radio" id="Student" name="userType" value="Student" required>
                <label for="Student">Student</label>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="login">
            </div>
            <div class="register-links">
                <a href="StudentRegister.php" class="register-link">Register as a Student</a><br>
            </div>
            <div class="register-links1">
              
                <a href="TeacherRegister.php" class="register-link">Register as a Teacher</a>
            </div>
            <div class="footer">
              <label>Powered By Kemet Team</label>
            </div>
        </form>
    </div>
</body>
</html>
