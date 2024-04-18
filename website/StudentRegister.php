<?php
require_once("../config/setup.php");
require_once("../models/Accounts.php");
require_once("../models/Courses.php");
require_once("../models/Enrollment.php");
require_once("../models/Students.php");
require_once("../models/Teachers.php");
require_once("../models/Teaches.php");
require_once("../models/Utils.php");
$arr = [];
if (isset($_POST["register"])) {
    $arr = Utils::validateStudentFields([
        $_POST["userName"],
        $_POST["name"],
        $_POST["password"],
        $_POST["address"],
        $_POST["level"]
    ]);
    $userName = $_POST["userName"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $level = $_POST["level"];
    if (empty($arr)) {
        $Account = [$userName, $password];
        Accounts::insert($Account);
        $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
        $student = [$accountId, $userName, $name, $address, $level];
        Students::insert($student);
        Enrollment::enroll();
        $_SESSION["id"] = $accountId;
        $_SESSION["userName"] = $userName;
        $_SESSION["type"] = "student";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kemet Sign Up</title>
    <link rel="stylesheet" href="C:\Users\ASUS\Downloads\sis-main (2)\sis-main\assets\css\StudentRegister.css">
</head>

<body>
    <div class="container">
        <div class="head">
            <h2>SignUp</h2>
        </div>
        <div class="body">
            <form id="register">
                <div>
                    <input type="text" name="userName" id="user-name" placeholder="UserName" required><br>
                    <small class="error-msg"></small><br>
                    <?php
                    echo $arr["userName"] ?? " ";
                    echo $arr["account"] ?? " ";
                    ?>
                </div>
                <div>
                    <input type="text" name="name" id="name" placeholder="Name" required><br>
                    <small class="error-msg"></small><br>
                    <?php
                    echo $arr["name"] ?? " ";
                    ?>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password" required><br>
                    <small class="error-msg"></small><br>
                    <?php
                    echo $arr["password"] ?? " ";
                    ?>
                </div>
                <div>
                    <input type="text" name="address" id="address" placeholder="Address" required><br>
                    <small class="error-msg"></small><br>
                    <?php
                    echo $arr["address"] ?? " ";
                    ?>
                </div>
                <div>
                    <input type="text" name="level" id="level" placeholder="Level" required><br>
                    <small class="error-msg"></small><br>
                    <?php
                    echo $arr["level"] ?? " ";
                    ?>
                </div>
                <input type="submit" value="Register">
                <a class="login" href="index.php">Login</a>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Powered by Kemet SIS</p>
    </div>

    <script src="C:\Users\ASUS\Downloads\sis-main (2)\sis-main\assets\js\signup.js"></script>
</body>

</html>