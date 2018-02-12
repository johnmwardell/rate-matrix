<?php
include "../db.php";

$destination = $_GET['destination'];
$shipper = $_GET['shipper'];

$sql = "DELETE FROM destination WHERE destinationShort = '" . $destination . "' AND destinationShipper = '" . $shipper . "'";
if ($conn->query($sql) === TRUE) {
  echo "Destination deleted!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
