<?php
include "../db.php";

$shipperShort = $_GET['shipperShort'];
$shipperFull = $_GET['shipperFull'];
$shipperAddress = $_GET['shipperAddress'];
$shipperPhone = $_GET['shipperPhone'];
$shipperNote = $_GET['shipperNote'];

$sql = 'UPDATE shipper SET
shipperFull = "' . $shipperFull . '",
shipperAddress = "' . $shipperAddress . '",
shipperPhone = "' . $shipperPhone . '",
shipperNote = "' . $shipperNote . '"
WHERE shipperShort = "' . $shipperShort . '"';
if ($conn->query($sql) === TRUE)
{
  echo "Saved!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
