<?php
include "../db.php";

$shipper = $_GET['shipper'];

$result = $db->sqlQuery("SELECT * FROM origin WHERE originShipper = '" . $shipper . "' ORDER BY originShort");
if ($result->num_rows > 0) {
  $resultData = array();
  while($row = $result->fetch_assoc()) {
    $rowData = new stdClass();
    $rowData->originShort = $row["originShort"];
    $rowData->originFull = $row["originFull"];
    $resultData[] = $rowData;
  }
  $json = json_encode($resultData);
  echo $json;
}
?>
