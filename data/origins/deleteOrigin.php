<?php
include "../db.php";

$origin = $_GET['origin'];

$sql = 'DELETE FROM originlist WHERE originListShort = "' . $origin . '"';
if ($conn->query($sql) === TRUE)
{
  $sql2 = "DELETE FROM origin WHERE originShort = '" . $origin . "'";
  if ($conn->query($sql2) === TRUE) {
    echo "Origin deleted!";
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
