<?php
require_once('assets/DB/connection.php');
?>

<html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Malcolm Lismore</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="dash.css">
  <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

  <!-- VIEW OREDER DETAILS -->
  <div class="container mt-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Las Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Date</th>
          <th scope="col">Package</th>
          <th scope="col">Card Number</th>
          <th scope="col">CVV</th>

        </tr>
      </thead>

      <tbody>

        <?php
        $select = "SELECT * FROM clientorder";
        $result = mysqli_query($connection, $select);
        if ($result) {
          while ($record = mysqli_fetch_assoc($result)) {
            $ID = $record["ID"];
            $First_name = $record["First_name"];
            $Last_name = $record["Last_name"];
            $Email = $record["Email"];
            $Mobile = $record["Mobile"];
            $Date = $record["Date"];
            $count = $record["count"];
            $card_number = $record["card_number"];
            $CVV = $record["CVV"];



            echo '
              <tr>
                <td>' . $ID . '</td>
                <td>' . $First_name . '</td>
                <td>' . $Last_name . '</td>
                <td>' . $Email . '</td>
                <td>' . $Mobile . '</td>
                <td>' . $Date . '</td>
                <td>' . $count . '</td>
                <td>' . $card_number . '</td>
                <td>' . $CVV . '</td>
                </tr>
            ';
          }
        }
        ?>
      </tbody>

    </table>
  </div>

</body>

</html>

<?php
mysqli_close($connection);
?>