<?php
include "../db.php";

$shipper = $_GET['shipper'];

$sql = 'DELETE FROM shipper WHERE shipperShort = "' . $shipper . '"';
if ($conn->query($sql) === TRUE)
{
  echo '<div class="alert alert-danger" role="alert"">Shipper Deleted!</div>';
}
else
{
  echo '<div class="alert alert-danger" role="alert"">Error updating record: ' . $conn->error . '</div>';
}
?>
