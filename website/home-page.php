<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/home-page.css">
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo"><a href="#">kemet</a></div>
    <nav class="nav-links">  <li><a href="main">Home</a></li>
      <li><a href="about">About</a></li>
      <li><a href="support">Support</a></li>
      <li><a href="contact us">Contact</a></li>
    </nav>
    <a href="#" class="action-btn">Get Started</a>
    <div class="toggle-btn">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
<div class="dropdown-menu">
   <li><a href="main">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="support">Support</a></li>
        <li><a href="contact us">Contact</a></li>
        <li><a href="#" class="action-btn">Get Started</a></li>
        <li><a href="#" class="action-btn">Log Out</a></li>
</div>

</header>
<script>

  const toggleBtn = document.querySelector('.toggle-btn');
  const toggleBtnIcon = document.querySelector('.toggle-btn i');
  const dropDownMenu = document.querySelector('.dropdown-menu');

  toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle('open');
    const isOpen = dropDownMenu.classList.contains('open');

    toggleBtnIcon.classList = isOpen
      ? 'fa-solid fa-xmark'
      : 'fa-solid fa-bars'
  }

</script>

  <footer>
        <div class="footer-form">
          <div class="footer-content">
          <h3>Contact Us</h3>
        <p>email: 6Cjz8@example.com</p>
      <p>phone: 01000000000</p>
        <p>address: kemet street 123</p>
      </div>
      <div class="footer-content">
        <h3>Quick Links</h3>
        <br>
        <ul class="list-footer">
          <li><a href="main">Home</a></li>
          <li><a href="about">About</a></li>
          <li><a href="support">Support</a></li>
          <li><a href="contact us">Contact</a></li>
        </ul>
      </div>
        <div class="footer-content">
          <br>
          <h3>Follow Us</h3>
          <ul class="socials">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
          </ul>
        </div>
        <div class="bottom-bar">
          <p>&copy; 2024 Kemet all rights reserved</p>
        </div>
    </div>
  </footer>




</body>
</html>
