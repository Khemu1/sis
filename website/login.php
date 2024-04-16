<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<div class="login-form">
  <div class="parent-description">
    <div class="description">
      <!--   <h1>Sis</h1>
          <ul >
              <li>Enroll, modify, and remove courses within the registration timeframe.</li>
              <li>Access and make online payments for tuition.</li>
              <li>Retrieve and print the schedule of classes for the semester.</li>
              <li>Modify contact information at any time to ensure effective communication with <a href="#">EELU</a>.</li>
          </ul>
          <h3>Student Support Services:</h3>
          <ol>
              <li>Exam Postponing System</li>
              <li>Appeal System</li>
              <li>Complain System</li>
              <li>Request a service</li>
          </ol>
          <a href="#">Read More</a> -->
    </div>
  </div>
  <div class="parent-login">
    <form action="">
      <h1>Login</h1>

      <input type="text" placeholder="Username" required>
      <input type="password" placeholder="Password" required>
      <div>
        <div class="radio-group">
          <input type="radio" id="Teacher" name="yes" value="Teacher" required>
          <label for="Teacher">Teacher</label>

          <input type="radio" id="Student" name="yes" value="student" required>
          <label for="student">Student</label>
        </div>

        <input type="submit" value="Login">
        <div class="copyright">
          <a href="#">Don't have Account?</a>
          <p>Powered by kemet</p>
        </div>
    </form>
  </div>
</div>

</html>
