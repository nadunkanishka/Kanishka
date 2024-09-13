<!-- PHP CODE TO INSERT ORDER -->
<?php
require_once('assets/DB/connection.php');

if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $date = $_POST["date"];
    $count = $_POST["count"];
    $card_number = $_POST["card_number"];
    $cvv = $_POST["cvv"];


    // Check if the data already exists
    $checkQuery = "SELECT * FROM clientorder WHERE First_name = '$first_name' AND Last_name = '$last_name' AND Email = '$email' AND Mobile = '$mobile' AND date = '$date'  AND count = '$count'  AND card_number = '$card_number' AND cvv = '$cvv'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (!$checkResult) {
        die("Query failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($checkResult) == 0) {
        // Insert the data into the database
        $insertQuery = "INSERT INTO clientorder VALUES('', '$first_name', '$last_name', '$email', '$mobile', '$date', '$count', '$card_number', '$cvv')";
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Malcolm Lismore</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="dash.css">

</head>

<body>
  <!-- SIDE NAV BAR -->
  <div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header"><a id="nav-title"><i class="fas fa-camera-retro"></i>USER</a>
      <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
      <hr />
    </div>
    <div id="nav-content">
      <div class="nav-button"><a href="userdash.html"><i class="fas fa-palette"></i><span>Dashboard</span></div></a>
      <div class="nav-button"><a href="vieworder.php"><i class="fas fa-images"></i><span>View Oreder</span></div></a>
      <hr />
      <div class="nav-button"><a href="clientorder.php"><i class="fas fa-sort"></i><span>Orders</span></div></a>
      <hr />
      <div class="nav-button"><i class="fas fa-user "></i><span>Profile</span></div>
      <div class="nav-button"><a href="Index.html"><i class="fas fa-times  "></i><span>Sign Out</span></div></a>
      <div id="nav-content-highlight"></div>
    </div>
    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
      <div id="nav-footer-heading">
        <div id="nav-footer-avatar"><img src="images/contact.jpg" /></div>
        <div id="nav-footer-titlebox"><a id="nav-footer-title">User</a></div>
        <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
      </div>
      <div id="nav-footer-content">
        <Lorem>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.</Lorem>
      </div>
    </div>
  </div>

    <!-- TO INSERT ORDER -->
    <div class="container1">
        <header>Place Order</header>

        <div class="progress-bar">
            <div class="step">
                <p>Name</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check "></div>
            </div>
            <div class="step">
                <p>Contact</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check "></div>
            </div>
            <div class="step">
                <p>Date</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check"></div>
            </div>
            <div class="step">
                <p>Submit</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check "></div>
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
                    <div class="title">Date of Event:</div>
                    <div class="field">
                        <div class="label">Date</div>
                        <input type="date" name="date">
                    </div>
                    <div class="field">
                        <div class="label">Package</div>
                        <select name="count">
                            <option>Basic</option>
                            <option>Pro</option>
                            <option>Premium</option>
                            <option>Enterprice</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="next-2 next">Next</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">Payments:</div>
                    <div class="field">
                        <div class="label">Card Number</div>
                        <input type="text" name="card_number">
                    </div>
                    <div class="field">
                        <div class="label">CVV</div>
                        <input type="text" name="cvv">
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev">Previous</button>
                        <button type="submit" name="submit" class="submit">Submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="register.js"></script>
</body>

</html>