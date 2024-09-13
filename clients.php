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

  <!--  SIDE NAVIGATION BAR -->
  <div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header"><a id="nav-title"><i class="fas fa-camera-retro"></i>MALCOLM</a>
      <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
      <hr />
    </div>
    <div id="nav-content">
      <div class="nav-button"><a href="admindash.html"><i class="fas fa-palette"></i><span>Dashboard</span></div></a>
      <hr />
      <div class="nav-button"><a href="adminorder.php"><i class="fas fa-sort"></i><span>Orders</span></div></a>
      <div class="nav-button"><a href="clients.php"><i class="fas fa-address-book "></i><span>Clients</span></div></a>
      <hr />
      <div class="nav-button"><a href="adminregister.php"><i class="fas fa-user-plus "></i><span>Register</span></div>
      </a>
      <div class="nav-button"><i class="fas fa-user "></i><span>Profile</span></div>
      <div class="nav-button"><a href="Index.html"><i class="fas fa-times  "></i><span>Sign Out</span></div></a>
      <div id="nav-content-highlight"></div>

    </div>
    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
      <div id="nav-footer-heading">
        <div id="nav-footer-avatar"><img src="images/contact.jpg" /></div>
        <div id="nav-footer-titlebox"><a id="nav-footer-title">Malcolm Lismore</a></div>
        <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
      </div>
      <div id="nav-footer-content">
        <Lorem>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.</Lorem>
      </div>
    </div>
  </div>

  <!--  PHP CODE TO IMPORT DATA -->
  <div class="container mt-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Las Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Date of birth</th>
          <th scope="col">Gender</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>

        </tr>
      </thead>

      <tbody>

        <?php
        $select = "SELECT * FROM register";
        $result = mysqli_query($connection, $select);
        if ($result) {
          while ($record = mysqli_fetch_assoc($result)) {
            $ID = $record["ID"];
            $First_name = $record["First_name"];
            $Last_name = $record["Last_name"];
            $Email = $record["Email"];
            $Mobile = $record["Mobile"];
            $DOB = $record["DOB"];
            $Gender = $record["Gender"];
            $Username = $record["Username"];
            $Password = $record["Password"];



            echo '

        <tr>
          <td>' . $ID . '</td>
          <td>' . $First_name . '</td>
          <td>' . $Last_name . '</td>
          <td>' . $Email . '</td>
          <td>' . $Mobile . '</td>
          <td>' . $DOB . '</td>
          <td>' . $Gender . '</td>
          <td>' . $Username . '</td>
          <td>' . $Password . '</td>
          <td>
            <button type="submit" class="btn btn-outline-success"><a href="updateclient.php?updateid=' . $ID . '"
                class="test-light nav-link">Update Record</a></button>
            <button type="submit" class="btn btn-outline-danger"><a href="deleteclient.php?deleteid=' . $ID . '"
                class="test-light nav-link">Delete Record</a></button>
          </td>
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