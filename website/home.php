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
    <div class="logo"><a href="#">kemet</a></div>
    <div class="nav-links">
      <li><a href="home.php">Home</a></li>
      <li><a href="home.php?page=courses">courses</a></li>
      <li><a href="home.php?page=about">about</a></li>
    </div>
    <a href="#" class="logout">logout</a>
  </nav>

  <section>
    <h2>Enrolled Students </h2>
    <div class="student-table-container">
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
      <div class="students">
        <div class="">Course</div>
        <div class="">Level</div>
        <div class="">Hours</div>
        <div class="">Student Name</div>
      </div>
    </div>



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

<!-- <script type="module" src="../assets/js/home.js?t=<?= time() ?>"></script> -->