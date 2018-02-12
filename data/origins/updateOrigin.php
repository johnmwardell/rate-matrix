<?php
include "../db.php";

$originShort = $_GET['originShort'];
$originFull = $_GET['originFull'];

$sql = 'UPDATE originList SET originListFull = "' . $originFull . '" WHERE originListShort = "' . $originShort . '"';
if ($conn->query($sql) === TRUE)
{
  $sql2 = 'UPDATE origin SET originFull = "' . $originFull . '" WHERE originShort = "' . $originShort . '"';
  if ($conn->query($sql2) === TRUE) {
    echo "Origin updated!";
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
