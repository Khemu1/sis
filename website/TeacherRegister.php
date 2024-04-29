<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");
session_start();
$arr = [];
if (isset($_POST["register"])) {
  $arr = Utils::validateTeacherFields([
    $_POST["userName"],
    $_POST["name"],
    $_POST["password"],
    $_POST["address"],
    $_POST["course"] ?? []
  ]);
  if (empty($arr)) {
    $courses = $_POST["course"];
    $userName = $_POST["userName"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $Account = [$userName, $password];
    Accounts::insert($Account);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    $teacher = [$accountId, $userName, $name, $address];
    Teachers::insert($teacher);
    $_SESSION["id"] = $accountId;
    $_SESSION["userName"] = $userName;
    $_SESSION["userType"] = "teacher";

    for ($i = 0; $i < count($courses); $i++) {
      $teaches = [$userName, $courses[$i]];
      Teaches::insert($teaches);
    }
    Enrollment::enroll();
    header("location: home.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/TeacherRegister.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="../assets/css/condition.css">
  <link rel="stylesheet" href="../assets/css/responsiveForms.css">

  <title>Teacher Sign Up</title>
</head>

<body>

  <div class="container">
    <div class="head">
      <h2>SignUp</h2>
    </div>
    <div class="body">
      <form method="Post" id="register">
        <div>
          <input type="text" name="userName" id="user-name" placeholder="UserName" required><br>
          <small class="error-msg"></small><br>

          <div class="error-msg">
            <?php
            echo $arr["username"] ?? " ";
            echo $arr["account"] ?? " ";
            ?>
          </div>
        </div>
        <div>
          <input type="text" name="name" id="name" placeholder="Name" required><br>
          <small class="error-msg"></small><br>

          <div class="error-msg">
            <?php
            echo $arr["name"] ?? " ";
            ?>
          </div>
        </div>
        <div>
          <input type="password" name="password" id="password" placeholder="Password" required><br>
          <small class="error-msg"></small><br>

          <div class="error-msg">
            <?php
            echo $arr["password"] ?? " ";
            ?>
          </div>
        </div>
        <div>
          <input type="text" name="address" id="address" placeholder="Address" required><br>
          <small class="error-msg"></small><br>

          <div class="error-msg">
            <?php
            echo $arr["address"] ?? " " . "<br>";
            ?>
          </div>
        </div>
        <div class="dropdown">
          <button id="courses">Choose courses<i class="uil uil-angle-down"></i></button><br>
          <small class="courseError hide">Please choose atleast one coruse</small><br>


          <div class="content">

            <label>Electronics<input type="checkbox" name="course[]" value="Electronics"></label>

            <label>Math-1 <input type="checkbox" name="course[]" value="Math-1" /> </label>

            <label>Math-0<input type="checkbox" name="course[]" value="Math-0" /></label>

            <label>Human Rights<input type="checkbox" name="course[]" value="Human Rights" /></label>

            <label>Technical Report<input type="checkbox" name="course[]" value="Technical Report" /></label>

            <label>Discrete Math<input type="checkbox" name="course[]" value="Discrete Math" /></label>

            <label>Programming 1<input type="checkbox" name="course[]" value="Programming 1" /></label>

            <label>Logic Design<input type="checkbox" name="course[]" value="Logic Design" /></label>

            <label>Math-2<input type="checkbox" name="course[]" value="Math-2" /></label>

            <label>Probability and Statistics 1<input type="checkbox" name="course[]"
                value="Probability and Statistics 1" /></label>

            <label>Microeconomics<input type="checkbox" name="course[]" value="Microeconomics" /></label>

            <label>Introduction to Network<input type="checkbox" name="course[]"
                value="Introduction to Network" /></label>

            <label>Introduction to Database<input type="checkbox" name="course[]"
                value="Introduction to Database" /></label>

            <label>Introduction to Software Engineering<input type="checkbox" name="course[]"
                value="Introduction to Software Engineering" /></label>

            <label>Programming 2<input type="checkbox" name="course[]" value="Programming 2" /></label>

            <label>Math-3<input type="checkbox" name="course[]" value="Math-3" /></label>

            <label>Probability and Statistics 2<input type="checkbox" name="course[]"
                value="Probability and Statistics 2" /></label>

            <label>Data Structures<input type="checkbox" name="course[]" value="Data Structures" /></label>

            <label>Web<input type="checkbox" name="course[]" value="Web" /></label>

            <label>Machine Learning<input type="checkbox" name="course[]" value="Machine Learning" /></label>

            <label>Introduction to Operation Research<input type="checkbox" name="course[]"
                value="Introduction to Operation Research" /></label>

            <label>Network Labs<input type="checkbox" name="course[]" value="Network Labs" /></label>

            <label>Enterpreneurship<input type="checkbox" name="course[]" value="Enterpreneurship" /></label>
          </div>
        </div>
    </div>
    <div class="error-msg">
      <?php echo $arr["courses"] ?? " "; ?> <br>
    </div>
    <input id="register" type="submit" name="register" value="Register">
    <br><br>
    <a class="log" href="index.php">Login</a>
    </form>
  </div>
  <div class="footer">
    <p>Powered by Kemet SIS</p>
  </div>
  </div>
  </div>



</body>

</html>
<script type="module" src="../assets/js/TeacherRegister.js?t=<?= time() ?>"></script>

<script type="module" src="../assets/js/Utils.js?t=<?= time() ?>"></script>