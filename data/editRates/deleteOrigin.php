<?php
include "../db.php";

$origin = $_GET['origin'];
$shipper = $_GET['shipper'];

$sql = "DELETE FROM origin WHERE originShort = '" . $origin . "' AND originShipper = '" . $shipper . "'";
if ($conn->query($sql) === TRUE) {
echo '<div class="container" id="alert">';
  echo '<div class="alert alert-danger" role="alert">';
    echo 'Origin Deleted!';
    echo '<button type="button" class="close" aria-label="Close" onclick="removeAlert()">';
      echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
  echo '</div>';
echo '</div>';
}
else
{
  echo "Error updating record: " . $conn->error;
}
?>
