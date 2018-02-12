<?php
include "../db.php";

$shipper = $_GET['shipper'];
$ssco = $_GET['ssco'];
$contract = $_GET['contract'];
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];


$sql = "INSERT INTO contract (contractShipper, contractSsco, contractNumber, contractStart, contractEnd) VALUES ('" . $shipper . "', '" . $ssco . "', '" . $contract . "', '" . $startDate . "', '" . $endDate . "')";
if ($conn->query($sql) === TRUE) {
  echo "Contract added!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
