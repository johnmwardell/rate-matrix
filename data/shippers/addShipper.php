<?php
include "../db.php";

$shipperShort = $_GET['shipperShort'];
$shipperFull = $_GET['shipperFull'];
$shipperAddress = $_GET['shipperAddress'];
$shipperPhone = $_GET['shipperPhone'];
$shipperNote = $_GET['shipperNote'];

$sql = "INSERT INTO shipper (shipperShort, shipperFull, shipperAddress, shipperPhone, shipperNote)
VALUES ('" . $shipperShort. "', '" . $shipperFull . "', '" . $shipperAddress . "', '" . $shipperPhone . "', '" . $shipperNote . "')";
if ($conn->query($sql) === TRUE) {
  echo "Shipper added!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
