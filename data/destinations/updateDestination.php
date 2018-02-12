<?php
include "..data/db.php";

$destinationShort = $_GET['destinationShort'];
$destinationFull = $_GET['destinationFull'];
$destinationCountry = $_GET['destinationCountry'];

$sql = 'UPDATE destList SET destListFull = "' . $destinationFull . '", destListCountry = "' . $destinationCountry . '" WHERE destListShort = "' . $destinationShort . '"';
if ($conn->query($sql) === TRUE)
{
  $sql2 = 'UPDATE destination SET destinationFull = "' . $destinationFull . '" WHERE destinationShort = "' . $destinationShort . '"';
  if ($conn->query($sql2) === TRUE) {
    echo "Destination updated!";
  }
  else
  {
    echo "Error updating record: " . $conn->error;
  }
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
