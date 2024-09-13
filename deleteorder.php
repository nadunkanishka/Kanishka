<!-- DELETE OREDER DATA -->
<?php
require_once('assets/DB/connection.php');

$ID = $_GET['deleteid'];
$delete = "DELETE FROM clientorder WHERE ID=$ID";
$result = mysqli_query($connection, $delete);

if ($result) {
  header("Location: adminorders.php");
} else {
  echo '<script> alert("Error!!") </script>';
}

?>