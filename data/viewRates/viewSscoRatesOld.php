<?php
include "../../php.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];

// For the final, printed Matrix, use the below code as a base.
// Then, just set the entire thing into columns.
// Only major change will be displaying the destinations only the first time.
// But that can probably be pulled off with a variable that tracks whether
// they have been printed yet.
$sqlHead = 'SELECT sscoFull FROM ssco
WHERE sscoShort = "' . $ssco . '"';
$resultHead = $conn->query($sqlHead);

while($head = $resultHead->fetch_assoc())
{
  echo "<h3>" . $head['sscoFull'] . "</h3>";

  $sqlOrigin = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '"';
  $resultOrigin = $conn->query($sqlOrigin);
  echo '<div class="row"><div class="col"></div>';
  while($originData = $resultOrigin->fetch_assoc())
  {
    echo '<div class="col"><input type="hidden" id="origin' . $originData['originID'] . '" value="' . $originData['originShort'] . '"><strong>' . $originData['originFull'] . '</strong></div>';
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

  $sqlDestination = 'SELECT * FROM destination WHERE destinationShipper = "' . $shipper . '" ORDER BY destinationShort';
  $resultDestination = $conn->query($sqlDestination);

  while($destinationData = $resultDestination->fetch_assoc())
  {
    echo '<div class="row mb-3"><div class="col">' . $destinationData['destinationFull'] . '</div>';

    $sqlOriginList = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '"';
    $resultOriginList = $conn->query($sqlOriginList);
    while($originDataList = $resultOriginList->fetch_assoc())
    {
      $sqlRate = 'SELECT oceanfreightRate FROM oceanfreight
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
          echo '<div class="col">' . $rateData['oceanfreightRate'] . '</div>';
        }
      }
    }
    echo '</div>';
  }

// Too late, need to sleep. Iterate through the destinations. Then, within that,
// iterate through the origins again to set the 'cell'. Then, iterate through the rates that match that
// cell, plus the shipper/ssco stuff. It should work. It'll need some tuning to determine which origins
// to call at the beginning. Maybe do a check in rates to see if this shipper/ssco
// combo even has a rate before loading it. Something like that.
// Man, I hope this makes sense. I'm tired.

// Below code is for reference. It works, it's just not pretty.
// Once this is done, then we can copy it for use with editing data. editing
// needs to be as easy as possible. Probably an 'Edit' button next to the rate.
// A modal should pop up with the tools for editing a rate, so it's not
// laborious. Javascript will update it live, so that no page refreshing happens.

// It's gonna be great! I hope.
}
?>
