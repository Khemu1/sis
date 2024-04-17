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
        if ($_POST["type"] === "student" && $type === "student") {
            $account = Students::select(["id", "userName"], ["accountId" => $id]);
            $_SESSION["id"] = $id;
            $_SESSION["userName"] = $account[0]["userName"];
            $_SESSION["userType"] = "student";
            var_dump($_SESSION);
            header("location: home.php");
            exit();
        } else if ($_POST["type"] === "teacher" && $type === "teacher") {
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
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>login</title>
</head>

<body>
    <div class="home">
        <div class="head">
            <h2>Login</h2>
        </div>
        <div class="body">
            <form method="post" action="">
                <input type="text" name="userName" class="user-name" placeholder="Username" value="Yasser"><br>
                <input type="password" name="password" class="password" placeholder="Password" value="951357"><br>
                <div class="invalid-login hide">Invalid Account</div>
                <?php
                echo $account["account"] ?? "";
                ?>
                <div class="user-type">
                    <label><input type="radio" name="userType" value="student" checked> Student</label>
                    <label><input type="radio" name="userType" value="teacher"> Teacher</label>
                </div>
                <input type="submit" name="login" class="submit" value="Login"><br>
                <div class="links">
                    <a class="link font-dark" href="StudentRegister.php">
                        Register as a Student
                    </a>
                    <a class="link font-dark" href="TecaherRegister.php">
                        Register as a Teacher
                    </a>
                </div>
            </form>
        </div>
        <div class="footer">
            <p class="font-dark">Powered by Kemet SIS</p>
        </div>
    </div>
</body>

</html>