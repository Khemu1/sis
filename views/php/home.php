<?php
require_once ("../../config/setup.php");
require_once ("../../models/Accounts.php");
require_once ("../../models/Courses.php");
require_once ("../../models/Enrollment.php");
require_once ("../../models/Students.php");
require_once ("../../models/Teachers.php");
require_once ("../../models/Teaches.php");
require_once ("../../models/Utils.php");


session_start();
var_dump($_SESSION);

if (isset($_GET['id'])) {
  // Set the session variable 'id' based on the provided value
  $_SESSION['id'] = $_GET['id'];
  $_SESSION["type"] = $_GET["type"];
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<!-- WIP -->
<body>
  <div class="container">
    <section>
      <div class="info"></div>
      <div class="menu"></div>
    </section>

    <footer></footer>
  </div>
</body>

</html>