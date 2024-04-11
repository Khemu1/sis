<p?php require_once ("../../config/setup.php"); require_once ("../../models/Accounts.php"); require_once
  ("../../models/Courses.php"); require_once ("../../models/Enrollment.php"); require_once
  ("../../models/Students.php"); require_once ("../../models/Teachers.php"); require_once ("../../models/Teaches.php");
  require_once ("../../models/Utils.php"); session_start(); // var_dump($_SESSION); // if (isset($_GET['id'])) { // //
  Set the session variable 'id' based on the provided value // $_SESSION['id']=$_GET['id']; //
  $_SESSION["type"]=$_GET["type"]; // } ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">

    <title>Home</title>
  </head>
  <!-- WIP -->

  <body>
    <div class="container">
      <nav>
        <h1>Kemet</h1>
        <div class="nav-buttons">
          <button id="home">
            <p>Home</p>
          </button>
          <button id="courses">
            <p>Courses</p>
          </button>
          <button id="about">
            <p>About</p>
          </button>
        </div>
        <button id="logout">
          <p>Logout</p>
        </button>
      </nav>
      <section>
        <div class="info"></div>
      </section>

      <footer>
        <div class="container">
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
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact Us</a></li>
              </ul>
            </div>
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