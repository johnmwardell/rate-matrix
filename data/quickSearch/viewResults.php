<?php
include "../db.php";

$shipper = $_GET['shipper'];
$origin = $_GET['origin'];
$destination = $_GET['destination'];

$result = $db->sqlQuery("SELECT * FROM ssco a INNER JOIN contract b ON b.contractSsco = a.sscoShort WHERE b.contractShipper = '" . $shipper . "' ORDER BY sscoShort");

$resultData = array();
while($row = $result->fetch_assoc()) {
  $ssco = $row['sscoShort'];
  $perContainer = $row['sscoPerContainer'];

  $resultRate = $db->getRate($ssco, $shipper, $origin, $destination);

  while($rateData = $resultRate->fetch_assoc())
  {
      $rowData = new stdClass();
      $rowData->ssco = $ssco;
      $rowData->origin = $origin;
      $rowData->destination = $destination;
      $rowData->rate = $rateData['oceanfreightRate'] + $perContainer;
      $resultData[] = $rowData;
  }
}
$json = json_encode($resultData);
echo $json;
?>
