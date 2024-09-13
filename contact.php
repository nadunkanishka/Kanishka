<!-- PHP CODE TO INSERT INQUIRY -->
<?php
require_once('assets/DB/connection.php');

if (isset($_POST["submit"])) {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];

   // Check if the data already exists
   $checkQuery = "SELECT * FROM contact WHERE name = '$name' AND email = '$email' AND subject = '$subject' AND message = '$message'";
   $checkResult = mysqli_query($connection, $checkQuery);

   if (!$checkResult) {
      die("Query failed: " . mysqli_error($connection));
   }

   if (mysqli_num_rows($checkResult) == 0) {
      // Insert the data into the database
      $insertQuery = "INSERT INTO contact VALUES('', '$name', '$email', '$subject', '$message')";
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
   <title>Malcolm Lismore</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link rel="stylesheet" href="styles.css">
</head>


<body>

   <!--  MAIN NAVIGATION BAR -->
   <div class="navbar">
      <a href="index.html">HOME</a>
      <a href="about.html"> ABOUT </a>
      <a href="gallery1.html"> GALLERY </a>
      <a href="pricing.html">PRICING</a>
      <a href="login.php"> SIGN IN </a>
   </div>

   <!--  Contact Part -->
   <section class="contact-malcolm">
      <div class="contact-form">
         <h1>CONTACT <span>US</span></h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec sollicitudin felis. Duis facilisis
            ultrices nulla non fringilla. Ut condimentum tincidunt imperdiet. Ut aliquam ligula vel lobortis
            consequat. Integer hendrerit metus justo, in pharetra est.</p>

         <form action="" method="post" autocomplete="off">

            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>

            <input type="submit" name="submit" class="btn">

         </form>

      </div>

      <div class="contact-img">
         <img src="images/main.jpeg">
      </div>

   </section>

   <br>

   <!-- FOOTER -->
   <footer>
      <div class="container">
         <div class="row">
            <div class="col" id="company">
               <img src="images/logo.png" alt="" class="logo">
               <p>
                  We are specialized in Photography, make your moment forever.
                  Try our premium services.
               </p>
               <div class="social">
                  <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
               </div>
            </div>

            <div class="col" id="services">
               <h3>Gallery</h3>
               <div class="links">
                  <a href="nature.html">Nature</a>
                  <a href="portraits.html">Portraits </a>
                  <a href="events.html">Events</a>
                  <a href="street.html">Street</a>
               </div>
            </div>

            <div class="col" id="useful-links">
               <h3>Links</h3>
               <div class="links">
                  <a href="about.html">About</a>
                  <a href="gallery1.html">Gallery</a>
                  <a href="pricing.html">Pricing</a>
                  <a href="contact.html">Contact</a>
               </div>
            </div>

            <div class="col" id="contact">
               <h3>Contact</h3>
               <div class="contact-details">
                  <i class="fa fa-location"></i>
                  <p>NO 42, Bascom Boulevard Avenue, <br> COLOMBO, SRILANKA</p>
               </div>
               <div class="contact-details">
                  <i class="fa fa-phone"></i>
                  <p>+94 705987710</p>
               </div>
               <div class="contact-details">
                  <i class="fa fa-envelope"></i>
                  <p>nadunkanishka222@gmail.com</p>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="form">
               <form action="">
                  <input type="text" placeholder="Email here...">
                  <button><i class="fa fa-paper-plane"></i></button>
               </form>
            </div>
         </div>
      </div>
   </footer>



</body>

</html>