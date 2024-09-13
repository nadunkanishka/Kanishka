<?php
require_once('assets/DB/connection.php');

$ID = $_GET['updateid'];
$select = "SELECT * FROM register WHERE ID=$ID";
$result = mysqli_query($connection, $select);
if ($result) {
  $record = mysqli_fetch_assoc($result);
  $First_name = $record['First_name'];
  $Last_name = $record['Last_name'];
  $Email = $record['Email'];
  $Mobile = $record['Mobile'];
  $DOB = $record['DOB'];
  $Gender = $record['Gender'];
  $Username = $record['Username'];
  $Password = $record['Password'];
}
if (isset($_POST["update"])) {
  $First_name = $_POST['variable']['First_name'];
  $Last_name = $_POST['Last_name'];
  $Email = $_POST['Email'];
  $Mobile = $_POST['Mobile'];
  $DOB = $_POST['DOB'];
  $Gender = $_POST['Gender'];
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];

  $update = "UPDATE  register  SET First_name='$First_name', Last_name='$Last_name', Email='$Email', Mobile='$Mobile', DOB='$DOB', Gender='$Gender', Username='$Username', Password='$Password' WHERE ID=$ID";
  $result = mysqli_query($connection, $update);

  if ($result) {
    header("Location: clients.php");
  } else {
    echo '<script> alert("Error!!") </script>';
  }
}
?>

<html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Malcolm Lismore</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css'>
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

  <!-- UPDATE CLIENT DETAILS -->

  <div class="container mt-5">
    <form action="" method="post" autocomplete="off">

      <div class="mb-3">
        <label class="form_label">First Name </label>
        <input type="text" class="form-control" name="First_name" value=" <?php echo $First_name; ?>">
      </div>

      <div class="mb-3">
        <label class="form_label">Last Name </label>
        <input type="text" class="form-control" name="Last_name" value="<?php echo $Last_name; ?>">
      </div>

      <div class="mb-3">
        <label class="form_label">Email </label>
        <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
      </div>

      <div class="mb-3">
        <label class="form_label">Mobile No </label>
        <input type="text" class="form-control" name="Mobile" value="<?php echo $Mobile; ?>">
      </div>

      <div class="mb-3">
        <label class="form_label">Date of Birth </label>
        <input type="date" class="form-control" name="DOB" value="<?php echo $DOB; ?>">
      </div>

      <div class="mb-3 field">
        <label class="form_label">Gender </label>
        <select class="form-control" name="Gender" value="<?php echo $Gender; ?>">
          <option>Male</option>
          <option>Female </option>
          <option>Other </option>
        </select>
      </div>


      <div class="mb-3">
        <label class="form_label">Username </label>
        <input type="text" class="form-control" name="Username" value="<?php echo $Username; ?>">
      </div>

      <div class="mb-3">
        <label class="form_label">Password </label>
        <input type="text" class="form-control" name="Password" value="<?php echo $Password; ?>">
      </div>


      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
      </div>
    </form>
  </div>

</body>

</html>

<?php
mysqli_close($connection);
?>