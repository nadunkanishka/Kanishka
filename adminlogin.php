<!-- PHP CODE TO LOGIN -->
<?php
require_once('assets/DB/connection.php');

if (isset($_POST['submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "select * from adminregister where username = '$username' and password = '$password'";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    header("Location: admindash.html");
  } else {
    echo '<script> alert("Login failed. Invalid username or password!!") </script>';
  }
}
?>

<html>

<head>
  <meta charset="utf-8">
  <title>Malcolm Lismore</title>
  <link rel="stylesheet" href="login.css">
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


  <!-- ADMIN LOGIN FORM -->
  <div class="container1">
    <header>Admin Login</header>
    <div class="form-outer">
      <form action="" method="post" autocomplete="off">

        <div class="page slide-page">
          <div class="field">
            <div class="label">Username</div>
            <input type="text" name="username">
          </div>
          <div class="field">
            <div class="label">Password</div>
            <input type="password" name="password">
          </div>
          <div class="field">
            <button type="submit" name="submit" class="submit">LOGIN</button>
          </div>
        </div>

      </form>
    </div>

    <div class="form-footer">
      Don't have an account? <a href="register.php">Signup here</a>
    </div>

  </div>

</body>

</html>