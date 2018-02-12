<?php
include "../db.php";

echo '<option>Choose...</option>';

$sql = "SELECT shipperShort, shipperFull FROM shipper ORDER BY shipperShort";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<option value="' . $row["shipperShort"] . '">' . $row["shipperFull"] . '</option>
';
  }
}
?>
