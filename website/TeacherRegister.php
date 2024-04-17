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
  $arr = Utils::validateStudentFields([
    $_POST["userName"],
    $_POST["name"],
    $_POST["password"],
    $_POST["address"],
  ]);
  $userName = $_POST["userName"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  if (empty($arr)) {
    $Account = [$userName, $password];
    Accounts::insert($Account);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    $teachers = [$accountId, $userName, $name, $address];
    Teachers::insert($teacher);
  
    $_SESSION["id"] = $accountId;
    $_SESSION["userName"] = $userName;
    $_SESSION["type"] = "teacher";
  }

 for($i - 0;$i < count($courses);i++) 
 {$teaches = [$userName], $course];
  Teaches::insert($teaches);}
  // saving the courses of teachers
 Enrollment::enroll();

}?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/TeacherRegister.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">  
  <title>Kemet Sign Up</title>
</head>

<body>

  <div class="container" >
    <div class="head">
      <h2>SignUp</h2>
    </div>
    <div class="body" >
      <form method="Post">
        <input type="text" name="userName" class="user-name" placeholder="UserName"><br>
        <?php echo $arr["userName"] ?? " "; echo $arr["account"] ?? " ";?>
        <input type="text" name="name" class="name" placeholder="name"><br>
        <?php echo $arr["name"] ?? " ";?>
        <input type="text" name="password" class="password" placeholder="Password"><br>
        <?php echo $arr["password"] ?? " ";?>
        <input type="text" name="address" class="address" placeholder="address"><br>
        <?php echo $arr["address"] ?? " ";?>
        <div class="dropdown">
          <button>Choose courses<i class="uil uil-angle-down"></i></button>
          
          <div class="content">

          <label>Electronics<input type="checkbox" name="checkbox"/></label>
           
          <label>Math-1 <input type="checkbox" name="checkbox"/> </label>

            <label>Math-0<input type="checkbox"name="checkbox"/></label>

              <label>Human Rights<input type="checkbox"name="checkbox"/></label>

                <label>Technical Report<input type="checkbox"name="checkbox"/></label>

                  <label>Discrete Math<input type="checkbox"name="checkbox"/></label>

                    <label>Programming 1<input type="checkbox"name="checkbox"/></label>

                      <label>Logic Design<input type="checkbox"name="checkbox"/></label>

                        <label>Math-2<input type="checkbox"name="checkbox"/></label>

                          <label>Probability and Statistics 1<input type="checkbox"name="checkbox"/></label>

                            <label>Microeconomics<input type="checkbox"name="checkbox"/></label>

                              <label>Introduction to Network<input type="checkbox"name="checkbox"/></label>

                                <label>Introduction to Database<input type="checkbox"name="checkbox"/></label>

                                  <label>Introduction to Software Engineering<input type="checkbox"name="checkbox"/></label>

                                    <label>Programming 2<input type="checkbox"name="checkbox"/></label>

                                      <label>Math-3<input type="checkbox"name="checkbox"/></label>

                                        <label>Probability and Statistics 2<input type="checkbox"name="checkbox"/></label>

                                          <label>Data Structures<input type="checkbox"name="checkbox"/></label>

                                            <label>Web<input type="checkbox"name="checkbox"/></label>

                                              <label>Machine Learning<input type="checkbox"name="checkbox"/></label>

                                                <label>Introduction to Operation Research<input type="checkbox"name="checkbox"/></label>

            <label>Network Labs<input type="checkbox"name="checkbox"/></label>

              <label>Enterpreneurship<input type="checkbox"name="checkbox"/></label>

          </div>
          
       
          
            </div>
          </div><?php echo $arr["courses"] ?? " ";?>
          <div class="invalid-courses hide"> </div><br>
          <input type="submit" name="register" value="Register"><br>
          <a class="font-dark" href="login.php">Login</a>
  
        </form>
      </div>
      <div class="footer" >
        <p>Powerd by Kemet University</p>
      </div>
    </div>
        </div>
        
       

</body>

</html>
<script type="module" src="../js/TeacherRegister.js?t=<?= time() ?>"></script>
<script type="module" src="../js/Utils.js?t=<?= time() ?>"></script>



