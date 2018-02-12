<?php
include "../db.php";

$ssco = $_GET['ssco'];
$origin = $_GET['origin'];
$destination = $_GET['destination'];

$sql="SELECT oceanfreightRate, oceanfreightID FROM oceanfreight
WHERE oceanfreightSsco = '" . $ssco . "'
AND oceanfreightOrigin = '" . $origin . "'
AND oceanfreightDestination = '" . $destination . "' ORDER BY oceanfreightID DESC LIMIT 1";
$result = $conn->query($sql);

if (!$result) {
  echo "This didn't work<br />";
}
else {
  while($row = $result->fetch_assoc()) {
    echo "$" . $row['oceanfreightRate'];
  }
}
?>
