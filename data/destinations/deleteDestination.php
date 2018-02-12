<?php
include "../db.php";

$destination = $_GET['destination'];

$sql = 'DELETE FROM destlist WHERE destListShort = "' . $destination . '"';
if ($conn->query($sql) === TRUE)
{
  $sql2 = "DELETE FROM destination WHERE destinationShort = '" . $destination . "'";
  if ($conn->query($sql2) === TRUE) {
    echo "Destination deleted!";
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
