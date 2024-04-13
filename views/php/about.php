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

<body>
  <div class="home">
    <nav>
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
      <div class="about">
        <div class=" about-container">
          <h3>Our Servers</h3>
          <div class="img-container">
            <img src="../../assets/images/dedicated-server-bg.jpg">
          </div>
          <p>We understand the critical importance of data <b>security, speed, and reliability</b>. That's why we
            leverage
            dedicated servers to power our platform, ensuring uncompromising performance and stability. With dedicated
            servers, we provide exclusive resources solely for the use of our system, eliminating the risks associated
            with shared hosting environments. This approach allows us to guarantee high-speed data access, robust
            security measures, and unparalleled uptime, providing our users with a seamless and dependable experience.
            Our commitment to utilizing dedicated servers underscores our dedication to safeguarding your data and
            delivering optimal performance at all times </p>
        </div>
        <div class=" about-container">
          <h3>Our Security System</h3>
          <div class="img-container">
            <img src="../../assets/images/security.webp">
          </div>
          <p>we prioritize the security of our users' data above all else. Our comprehensive security system is
            designed
            to safeguard sensitive information and protect against potential threats. Utilizing state-of-the-art
            encryption protocols, multi-factor authentication, and continuous monitoring, we ensure that your data
            remains secure at all times. Our proactive approach to security includes regular security audits,
            vulnerability assessments, and rapid response to emerging threats. With robust firewalls, intrusion
            detection systems, and real-time threat intelligence, we mitigate risks and maintain the integrity of our
            platform. Rest assured, your information is in safe hands with <b>Kemet</b> </p>
        </div>
        <div class="about-container">
          <h3>Stable Connection</h3>
          <div class="img-container">
            <img src="../../assets/images/importance-of-a-reliable-internet-connection-for-business-TeleCloud.png">
          </div>
          <p>At <b>Kemet</b>, we understand the significance of a stable connection in today's digital age. That's why
            we
            prioritize ensuring a reliable and secure connection for all users. With our robust infrastructure and
            dedicated team, we guarantee a seamless online experience, enabling students, teachers, and administrators
            to access our platform anytime, anywhere. Our commitment to maintaining a stable connection reflects our
            dedication to facilitating smooth communication, efficient collaboration, and uninterrupted access to
            essential educational resources.</p>
        </div>
        <div class="about-container">
          <h3>Maintenance</h3>
          <div class="img-container">
            <img src="../../assets/images/matintenance.png">
          </div>
          <p>Ensuring optimal performance and reliability of our systems is paramount at SIS. Our proactive approach
            to
            maintenance encompasses regular checks, updates, and fine-tuning of our infrastructure to prevent downtime
            and minimize disruptions. With a dedicated team of experts overseeing our maintenance operations, we
            swiftly
            address any potential issues before they escalate, keeping our systems running smoothly. By prioritizing
            preventative maintenance, we uphold our commitment to providing a seamless and uninterrupted user
            experience
            for students, teachers, and administrators alike. </p>
        </div>
      </div>
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
            <li><a href="login.php">Home</a></li>
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