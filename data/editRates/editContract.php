<?php
include "../db.php";

$shipper = $_GET['shipper'];
$ssco = $_GET['ssco'];
$contract = $_GET['contract'];
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

$sql = 'UPDATE contract SET contractNumber = "' . $contract . '", contractStart = "' . $startDate . '", contractEnd = "' . $endDate . '" WHERE contractShipper = "' . $shipper . '" AND contractSsco = "' . $ssco . '"';
if ($conn->query($sql) === TRUE)
{
  echo "Contract updated!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
