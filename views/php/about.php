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
      <div class="theme-switcher""> 

        <img src=" ../../assets/icons/theme icon.png">

      </div>
      <a href="login.php" class="logo">

        <img class="main" src="../../assets/images/kemet-high-resolution-logo-transparent.svg">
        <img class="secondary" src="../../assets/images/kemet-high-resolution-logo-black-transparent.svg">
      </a>

      <div class="nav-buttons">
        <a href="login.php" class="selected" id="home" value="home">
          <p>Login</p>
        </a>
        <a href="StudentRegister.php" id="courses" value="courses">
          <p>Student Registertion Form</p>
        </a>

        <a href="TecaherRegister.php" id="about" value="about">
          <p>Student Registertion Form</p>
        </a>
      </div>
    </nav>


    <section>
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
            <li><a class="font-dark" href="TecaherRegister.php">Try out our system</a></li>
          </ul>
        </div>
        <div class="copyright">
          <p class="font-dark">&copy; 2024 Kemet. All rights reserved.</p>
          <p><a class="font-dark">Privacy Policy</a> | <a class="font-dark">Terms of
              Service</a></p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>

<script type="module" src="../js/about.js?t=<?= time() ?>"></script>