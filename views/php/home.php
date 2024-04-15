<?php require_once ("../../config/setup.php");
require_once ("../../models/Accounts.php");
require_once
  ("../../models/Courses.php");
require_once ("../../models/Enrollment.php");
require_once
  ("../../models/Students.php");
require_once ("../../models/Teachers.php");
require_once ("../../models/Teaches.php");
require_once ("../../models/Utils.php");

session_start();
if (!isset($_SESSION["id"])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/home.css">

  <title>Home</title>
  <link rel="icon" type="image/x-icon" href="../../assets/icons/homeFav.png">

</head>

<body class="body-dark">
  <div class="home">
    <nav class="nav-dark">

      <a href="home.php" class="logo">

        <img class="main hide" src="../../assets/images/kemet-high-resolution-logo-transparent.svg">
        <img class="secondary" src="../../assets/images/kemet-high-resolution-logo-black-transparent.svg">
      </a>

      <div class="nav-buttons">
        <a class="font-dark" href="home.php" id="home" value="home">
          <p class="font-dark">Home</p>
        </a>

        <?php
        if ($_SESSION["type"] === "student") { ?>
          <a class="font-dark" href="home.php?page=courses" id="courses" value="courses">
            <p class="font-dark">Courses</p>
          </a>
          <?php
        } else { ?>
          <a class="font-dark" href="home.php?page=courses" id="courses" value="courses">
            <p class="font-dark">Participants</p>
          </a>
          <?php
        } ?>

        <a class="font-dark" href="home.php?page=about" id="about" value="about">
          <p class="font-dark">About</p>
        </a>

      </div>
      <div class="right">


        <input type="checkbox" id="switch" class="theme-switcher">
        <label for="switch"></label>

        <!-- <div class="circle"> </div> -->

        <a id="logout" href="http://sis.test/controllers/logout.php">
          <p>Logout</p>
        </a>
      </div>
    </nav>


    <section class="section-dark">
    </section>
    <footer class="dark-footer">
      <div class="footer-content">
        <div class="contact-info">
          <h3 class="font-dark">Contact Us</h3>
          <p class="font-dark">Email: info@Kemet.com</p>
          <p class="font-dark">Phone: 123-456-7890</p>
          <p class="font-dark">Address: 123 shatby, Alexadnria, Egypt</p>
        </div>

        <div class="site-links">
          <h3 class="font-dark">Quick Links</h3>
          <ul>
            <li><a class="font-dark" href="home.php">Home</a></li>
            <li><a class="font-dark" href="home.php?page=about">About Us</a></li>
          </ul>
        </div>
        <div class="copyright">
          <p class="font-dark">&copy; 2024 Kemet. All rights reserved.</p>
          <p><a class="font-dark" href="/privacy-policy">Privacy Policy</a> | <a class="font-dark"
              href="/terms-of-service">Terms of
              Service</a></p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>
<script type="module" src="../js/home.js?t=<?= time() ?>"></script>