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
var_dump($_SESSION)
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/home.css" />
</head>

<body>
  <nav>

    <a href="home.php" class="logo">

      <img class="main" src="../../assets/images/kemet-high-resolution-logo-transparent.svg">
    </a>

    <div class="nav-buttons">
      <a href="home.php" id="home" value="home">
        <p>Home</p>
      </a>

      <?php
      if ($_SESSION["userType"] === "student") { ?>
        <a href="home.php?page=courses" id="courses" value="courses">
          <p>Courses</p>
        </a>
        <?php
      } else { ?>
        <a href="home.php?page=courses" id="courses" value="courses">
          <p>Participants</p>
        </a>
        <?php
      } ?>

      <a href="home.php?page=about" id="about" value="about">
        <p>About</p>
      </a>

    </div>
    <div class="right">
      <a id="logout" href="../controllers/logout.php">
        <p>Logout</p>
      </a>
    </div>
  </nav>

  <section>
    <footer>
      <div class="footer-contents">
        <div class="footer-content">
          <h5>Contact Us</h5>
          <p>email: 6Cjz8@example.com</p>
          <p>phone: 01000000000</p>
          <p>address: kemet street 123</p>
        </div>
        <div class="footer-content">
          <h5>Quick Links</h5>
          <br />
          <ul class="list-footer">
            <li><a href="main">Home</a></li>
            <li><a href="about">About</a></li>
            <li><a href="support">Support</a></li>
            <li><a href="contact us">Contact</a></li>
          </ul>
        </div>
        <div class="footer-content">
          <br />
          <h5>Follow Us</h5>
          <ul class="socials">
            <li>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </li>
          </ul>
        </div>
        <div class="bottom-bar">
          <p>&copy; 2024 Kemet all rights reserved</p>
        </div>
      </div>
    </footer>
  </section>
</body>

</html>

<script type="module" src="../assets/js/home.js?t=<?= time() ?>"></script>