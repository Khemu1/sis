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
            $_SESSION["type"] = "student";
            var_dump($_SESSION);
            header("location: home.php");
            exit();

        } else if ($_POST["type"] === "teacher" && $type === "teacher") {
            $account = Teachers::select(["id", "userName"], ["accountId" => $id]);
            $_SESSION["id"] = $id;
            $_SESSION["userName"] = $account[0]["userName"];
            $_SESSION["type"] = "teacher";
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
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<div class="login-form">
    <div class="parent-login">
        <form method="POST">
            <h1>Login</h1>
            <input type="text" name="userName" placeholder="Username" value="Yasser">
            <input type="password" name="password" placeholder="Password" value="Yasser">
            <div class=child-login>
                <div class="radio-group">
                    <input type="radio" id="Teacher" name="type" value="teacher" checked>
                    <label for="Teacher">Teacher</label>

                    <input type="radio" id="Student" name="type" value="student">
                    <label for="student">Student</label>
                </div>

                <?php echo $account["account"] ?? ""; ?>

                <div class="submit">
                    <input type="submit" value="Login" name="login">
                </div>
                <div class="copyright">
                    <a href="#">Don't have Account?</a>
                    <p>Powered by kemet</p>
                </div>
        </form>
    </div>
</div>

</html>