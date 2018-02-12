<?php
include "../db.php";

$shipper = $_GET['shipper'];
$ssco = $_GET['ssco'];
$contract = $_GET['contract'];

$sql = "DELETE FROM contract WHERE contractShipper = '" . $shipper . "' AND contractSsco = '" . $ssco . "'";
if ($conn->query($sql) === TRUE) {
  $sql2 = "DELETE FROM oceanfreight WHERE oceanfreightShipper = '" . $shipper . "' AND oceanfreightSsco = '" . $ssco . "'";
  if ($conn->query($sql2) === TRUE) {
    echo "Contract Deleted!";
  }
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
