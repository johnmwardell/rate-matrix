<?php
include "../db.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];

$resultHead = $db->getSSCO($ssco);
while($head = $resultHead->fetch_assoc())
{
  $sqlOrigin = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '" ORDER BY originShort ASC';
  $resultOrigin = $conn->query($sqlOrigin);
  echo '<div class="row"><div class="col"></div>';
  $i = 0;
  while($originData = $resultOrigin->fetch_assoc())
  {
    $i++;
    echo '<div class="col"><input type="hidden" id="origin' . $i . '" value="' . $originData['originShort'] . '"><strong>' . $originData['originFull'] . '</strong></div>';
  }
  echo '</div>';
  echo '<input type="hidden" id="originCount" value="' . $i . '">';

  $sqlDestination = 'SELECT * FROM destination a INNER JOIN destlist b ON a.destinationShort = b.destListShort WHERE a.destinationShipper = "' . $shipper . '" ORDER BY b.destListCountry, a.destinationShort';
  $resultDestination = $conn->query($sqlDestination);

  while($destinationData = $resultDestination->fetch_assoc())
  {
    $short = $destinationData['destinationShort'];

    echo '<div class="row mb-3"><div class="col">';
    echo $destinationData['destinationFull'];
    echo '</div>';

    $sqlOriginList = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '" ORDER BY originShort ASC';
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
        echo '<div class="col"></div>';
      }
      else
      {
        while($rateData = $resultRate->fetch_assoc())
        {
          $rate = $rateData['oceanfreightRate'] + $head['sscoPerContainer'];
          echo '<div class="col">' . $rate . '</div>';
        }
      }
    }
    echo '</div><hr>';
  }
}
?>
