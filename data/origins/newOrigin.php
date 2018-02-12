<?php
include "../db.php";

$originShort = $_GET['originShort'];
$originFull = $_GET['originFull'];


$sql = "INSERT INTO originlist (originListShort, originListFull) VALUES ('" . $originShort. "', '" . $originFull . "')";
if ($conn->query($sql) === TRUE) {
  echo "Origin added!";
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
