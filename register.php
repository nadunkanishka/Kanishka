<!-- PHP CODE TO Register -->
<?php
require_once('assets/DB/connection.php');

if (isset($_POST["submit"])) {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $dob = $_POST["dob"];
  $gender = $_POST["gender"];
  $username = $_POST["username"];
  $password = $_POST["password"];


  // Check if the data already exists
  $checkQuery = "SELECT * FROM register WHERE First_name = '$first_name' AND Last_name = '$last_name' AND Email = '$email' AND Mobile = '$mobile' AND DOB = '$dob'  AND Gender = '$gender'  AND Username = '$username' AND Password = '$password'";
  $checkResult = mysqli_query($connection, $checkQuery);

  if (!$checkResult) {
    die("Query failed: " . mysqli_error($connection));
  }

  if (mysqli_num_rows($checkResult) == 0) {
    // Insert the data into the database
    $insertQuery = "INSERT INTO register VALUES('', '$first_name', '$last_name', '$email', '$mobile', '$dob', '$gender', '$username', '$password')";
    mysqli_query($connection, $insertQuery);

    // Display success message
    echo "<script>alert('Data Inserted Successfully');</script>";

    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } else {
    // Display message that data already exists
    echo "<script>alert('Data already exists');</script>";
  }
}
?>


<html>

<head>
  <meta charset="utf-8">
  <title>Malcolm Lismore</title>
  <link rel="stylesheet" href="register.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>


<body>

  <!--  MAIN NAVIGATION BAR -->
  <div class="navbar">
    <a href="index.html">HOME</a>
    <a href="about.html"> ABOUT </a>
    <a href="gallery1.html"> GALLERY </a>
    <a href="pricing.html">PRICING</a>
    <a href="contact.php"> CONTACT </a>
  </div>

  <!-- REGISTER -->
  <div class="container1">
    <header>Signup Form</header>

    <div class="progress-bar">
      <div class="step">
        <p>Name</p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Contact</p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Birth</p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Submit</p>
        <div class="bullet">
          <span>4</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>

    <div class="form-outer">
      <form action="" method="post" autocomplete="off">
        <div class="page slide-page">
          <div class="title">Name:</div>
          <div class="field">
            <div class="label">First Name</div>
            <input type="text" name="first_name">
          </div>
          <div class="field">
            <div class="label">Last Name</div>
            <input type="text" name="last_name">
          </div>
          <div class="field">
            <button class="firstNext next">Next</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Contact Info:</div>
          <div class="field">
            <div class="label">Email Address</div>
            <input type="text" name="email">
          </div>
          <div class="field">
            <div class="label">Phone Number</div>
            <input type="text" name="mobile">
          </div>
          <div class="field btns">
            <button class="prev-1 prev">Previous</button>
            <button class="next-1 next">Next</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Date of Birth:</div>
          <div class="field">
            <div class="label">Date</div>
            <input type="date" name="dob">
          </div>

          <div class="field">
            <div class="label">Gender</div>
            <select name="gender">
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>

          <div class="field btns">
            <button class="prev-2 prev">Previous</button>
            <button class="next-2 next">Next</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Login Details:</div>
          <div class="field">
            <div class="label">Username</div>
            <input type="text" name="username">
          </div>
          <div class="field">
            <div class="label">Password</div>
            <input type="password" name="password">
          </div>
          <div class="field btns">
            <button class="prev-3 prev">Previous</button>
            <button type="submit" name="submit" class="submit">Submit</button>

          </div>
        </div>
      </form>
    </div>

    <div class="form-footer">
      Already have an account? <a href="login.php">Login here</a>
    </div>

  </div>

  <script src="register.js"></script>

</body>

</html>