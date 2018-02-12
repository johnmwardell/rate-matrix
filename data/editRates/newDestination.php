<?php
include "../db.php";

$destinationShort = $_GET['destinationShort'];
$shipper = $_GET['shipper'];

$sqldestList = 'SELECT * FROM destlist WHERE destListShort = "' . $destinationShort . '"';
$resultdestList = $conn->query($sqldestList);
while($destDataList = $resultdestList->fetch_assoc())
{
  $sql = "INSERT INTO destination (destinationShort, destinationFull, destinationShipper) VALUES ('" . $destinationShort. "', '" . $destDataList['destListFull'] . "', '" . $shipper . "')";
  if ($conn->query($sql) === TRUE) {
    echo "Destination added!";
  }
  else
  {
    echo "Error updating record: " . $conn->error;
  }
}
?>
