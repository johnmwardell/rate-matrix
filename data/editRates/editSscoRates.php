<?php
include "../db.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];
$destination = $_GET['destination'];

$sqlOrigin = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '"';
$resultOrigin = $conn->query($sqlOrigin);
echo '<div class="row"><div class="col"></div>';
$i = 0;
while($originData = $resultOrigin->fetch_assoc())
{
  $i++;
  echo '<div class="col"><input type="hidden" id="origin' . $i . '" value="' . $originData['originShort'] . '"><strong>' . $originData['originFull'] . '</strong></div>';
/*
  $sqlOriginList = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '"';
  $resultOriginList = $conn->query($sqlOriginList);
  while($originDataList = $resultOriginList->fetch_assoc())
  {
    if ($originData['originShort'] == $originDataList['originShort'])
    {
      echo '<option value="' . $originDataList['originShort'] . '" selected>' . $originDataList['originFull'] . '</option>';
    }
    else
    {
      echo '<option value="' . $originDataList['originShort'] . '">' . $originDataList['originFull'] . '</option>';
    }
  }
  echo '</select></div>';*/
}
echo '</div>';
echo '</div>';

$sqlDestination = 'SELECT * FROM destination WHERE destinationShort = "' . $destination. '" AND destinationShipper = "' . $shipper . '"';
$resultDestination = $conn->query($sqlDestination);

while($destinationData = $resultDestination->fetch_assoc())
{
  $short = $destinationData['destinationShort'];

  echo '<div class="row"><div class="col">';
  echo '<input type="hidden" id="chosenDestination" value="' . $short .'">';
  echo $destinationData['destinationFull'];
  echo '</div>';

  $sqlOriginList = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '"';
  $resultOriginList = $conn->query($sqlOriginList);
  while($originDataList = $resultOriginList->fetch_assoc())
  {
    $sqlRate = 'SELECT oceanfreightRate, oceanfreightID FROM oceanfreight
    WHERE oceanfreightSsco = "' . $ssco . '"
    AND oceanfreightShipper = "' . $shipper . '"
    AND oceanfreightOrigin = "' . $originDataList["originShort"] . '"
    AND oceanfreightDestination = "' . $destinationData["destinationShort"] .'" ORDER BY oceanfreightID DESC LIMIT 1';
    $resultRate = $conn->query($sqlRate);

    if (mysqli_num_rows($resultRate) == 0)
    {
      echo '<div class="col">
      <div class="form-group">
      <input type="text" class="form-control" id="' . $originDataList["originShort"] . '" placeholder="Add Rate" onchange="clearAlerts()">
      </div></div>';
    }
    else
    {
      while($rateData = $resultRate->fetch_assoc())
      {
        echo '<div class="col">
        <div class="form-group">
        <input type="text" class="form-control" id="' . $originDataList["originShort"] . '" value="' . $rateData['oceanfreightRate'] . '" placeholder="Add Rate"  onchange="clearAlerts()">
        </div></div>';
      }
    }
  }
  echo '</div>';
}
?>
