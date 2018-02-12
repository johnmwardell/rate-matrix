<?php
include "../db.php";

$shipper = $_GET['shipper'];

$result = $db->sqlQuery("SELECT * FROM destination WHERE destinationShipper = '" . $shipper . "' ORDER BY destinationShort");
if ($result->num_rows > 0) {
  $resultData = array();
  while($row = $result->fetch_assoc()) {
    $rowData = new stdClass();
    $rowData->destinationShort = $row["destinationShort"];
    $rowData->destinationFull = $row["destinationFull"];
    $resultData[] = $rowData;
  }
  $json = json_encode($resultData);
  echo $json;
}
?>
