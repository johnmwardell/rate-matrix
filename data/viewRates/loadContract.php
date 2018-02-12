<?php
include "../db.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];

$result = $db->getSSCO($ssco);

$rowData = new stdClass();
while($row = $result->fetch_assoc())
{
  $rowData->sscoFull = $row['sscoFull'];

  $resultContract = $db->getContract($shipper, $ssco);
  while($contract = $resultContract->fetch_assoc())
  {
    $rowData->contractNumber = $contract['contractNumber'];
    $rowData->contractStart = $contract['contractStart'];
    $rowData->contractEnd = $contract['contractEnd'];
  }
}
$json = json_encode($rowData);
echo $json;
?>
