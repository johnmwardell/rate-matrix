<?php
include "../db.php";

$shipper = $_GET['shipper'];

$result = $db->sqlQuery("SELECT a.sscoShort, a.sscoFull, b.contractSsco FROM ssco a INNER JOIN contract b ON b.contractSsco = a.sscoShort WHERE b.contractShipper = '" . $shipper . "' ORDER BY sscoShort");
if ($result->num_rows > 0) {
  $resultData = array();
  while($row = $result->fetch_assoc()) {
    $rowData = new stdClass();
    $rowData->sscoShort = $row['sscoShort'];
    $rowData->sscoFull = $row['sscoFull'];
    $resultData[] = $rowData;
  }
  $json = json_encode($resultData);
  echo $json;
}
?>
