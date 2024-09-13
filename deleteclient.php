<!-- DELETE CLIENT DATA -->
<?php
require_once('assets/DB/connection.php');

$ID = $_GET['deleteid'];
$delete = "DELETE FROM register WHERE ID=$ID";
$result = mysqli_query($connection, $delete);

if ($result) {
  header("Location: clients.php");
} else {
  echo '<script> alert("Error!!") </script>';
}

?>