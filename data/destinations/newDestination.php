<?php
include "../db.php";

$destinationShort = $_GET['destinationShort'];
$destinationFull = $_GET['destinationFull'];
$destinationCountry = $_GET['destinationCountry'];


$sql = "INSERT INTO destlist (destListShort, destListFull, destListCountry) VALUES ('" . $destinationShort. "', '" . $destinationFull . "', '" . $destinationCountry . "')";
if ($conn->query($sql) === TRUE) {
  echo "Destination added!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
