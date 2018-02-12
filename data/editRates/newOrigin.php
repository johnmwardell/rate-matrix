<?php
include "../db.php";

$originShort = $_GET['originShort'];
$shipper = $_GET['shipper'];

$sqloriginList = 'SELECT * FROM originlist WHERE originListShort = "' . $originShort . '"';
$resultoriginList = $conn->query($sqloriginList);
while($originDataList = $resultoriginList->fetch_assoc())
{
  $sql = "INSERT INTO origin (originShort, originFull, originShipper) VALUES ('" . $originShort. "', '" . $originDataList['originListFull'] . "', '" . $shipper . "')";
  if ($conn->query($sql) === TRUE) {
    echo "Origin added!";
  }
  else
  {
    echo "Error updating record: " . $conn->error;
  }
}
?>
