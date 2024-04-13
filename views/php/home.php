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

<body>
  <div class="home">
    <nav>
      <a href="home.php" class="logo">

        <img class="main" src="../../assets/images/kemet-high-resolution-logo-transparent.svg">
        <img class="secondary" src="../../assets/images/kemet-high-resolution-logo-black-transparent.svg">
      </a>

      <div class="nav-buttons">
        <a href="home.php" class="selected" id="home" value="home">
          <p>Home</p>
        </a>
        <?php
        if ($_SESSION["type"] === "student") { ?>
          <a href="home.php?page=courses" id="courses" value="courses">
            <p>Courses</p>
          </a>
          <?php
        } else { ?>
          <a href="home.php?page=courses" id="courses" value="courses">
            <p>participants</p>
          </a>

          <?php
        } ?>


        <a href="home.php?page=about" id="about" value="about">
          <p>About</p>
        </a>
      </div>
      <a id="logout" href="http://sis.test/controller/logout.php">
        <p>Logout</p>
      </a>
    </nav>


    <section>
    </section>
    <footer>
      <div class="footer-content">
        <div class="contact-info">
          <h3>Contact Us</h3>
          <p>Email: info@Kemet.com</p>
          <p>Phone: 123-456-7890</p>
          <p>Address: 123 shatby, Alexadnria, Egypt</p>
        </div>

        <div class="site-links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="home.php?page=about">About Us</a></li>
          </ul>
        </div>
        <div class="copyright">
          <p>&copy; 2024 Kemet. All rights reserved.</p>
          <p><a href="/privacy-policy">Privacy Policy</a> | <a href="/terms-of-service">Terms of Service</a></p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>

<script type="module" src="../js/home.js?t=<?= time() ?>"></script>