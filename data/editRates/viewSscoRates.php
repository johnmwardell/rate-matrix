<?php
include "../db.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];

// Counter for origin ID's
$i = 0;

$sqlHead = 'SELECT * FROM ssco
WHERE sscoShort = "' . $ssco . '"';
$resultHead = $conn->query($sqlHead);

while($head = $resultHead->fetch_assoc())
{
  echo "<div class='jumbotron jumbotron-fluid'>";
  echo "<div class='row'>";
  echo "<div class='col-3'><h1>" . $head['sscoFull'] . "</h1></div>";

  $sqlContract = 'SELECT * FROM contract WHERE contractShipper = "' . $shipper . '" AND contractSsco = "' . $ssco . '"';
  $resultContract = $conn->query($sqlContract);

  $foundRates = false;

  while($contract = $resultContract->fetch_assoc())
  {
    $linkToContract = "";
    if (strlen($contract['contractFile']) > 0)
    {
      $linkToContract ="(<a href='contract/" . $shipper . "/" . $ssco . "/" . $contract['contractFile'] . "'>View Full Contract</a>)";
    }
    echo "<div class='col-2'>Contract: <br />Effective: <br />Expires: </div>";
    echo "<div class='col'>
    <strong><span id='contractNumberVal'>" . $contract['contractNumber'] . "</span></strong>&nbsp;" . $linkToContract . "<br />
    <span id='contractStartVal'>" . $contract['contractStart'] . "</span><br />
    <span id='contractEndVal'>" . $contract['contractEnd'] . "</span><br />
    <span id='contractFile'></div>";
    echo "<div class='col'><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#editContractModal' onclick='editContract()'>Edit Contract</button><br />
    <button type='button' class='btn btn-dark btn-sm mt-3' onclick='uploadContract()'>Upload Contract</button><br />
    <button type='button' class='btn btn-danger btn-sm mt-3' data-toggle='modal' data-target='#deleteContractModal'>Delete Contract</button></div>";
    $foundRates = true;
  }

  if(!$foundRates)
  {
    echo "<div class='col-2'>Contract: <br />Effective: <br />Expires: </div>";
    echo "<div class='col'><strong>N/A</strong></div>";
    echo "<div class='col'><button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#newContractModal'>Add Contract</button></div>";
    echo "</div>";
    echo "</div>";
  }
  else
  {
    echo "</div>";
    echo "</div>";

    $sqlOrigin = 'SELECT * FROM origin WHERE originShipper = "' . $shipper . '" ORDER BY originShort ASC';
    $resultOrigin = $conn->query($sqlOrigin);
    echo '<div class="row"><div class="col"></div>';

    while($originData = $resultOrigin->fetch_assoc())
    {
      $i++;
      echo '<button type="button" class="btn btn-danger btn-sm" onclick="removeOrigin(\''. $originData['originShort'] .'\')">Delete</button>&nbsp;&nbsp;';
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
    echo '<input type="hidden" id="originCount" value="' . $i . '">';

    $sqlDestination = 'SELECT * FROM destination a INNER JOIN destlist b ON a.destinationShort = b.destListShort WHERE a.destinationShipper = "' . $shipper . '" ORDER BY b.destListCountry, a.destinationShort';
    $resultDestination = $conn->query($sqlDestination);

    while($destinationData = $resultDestination->fetch_assoc())
    {
      $short = $destinationData['destinationShort'];

      echo '<div class="row mb-3"><div class="col"><button type="button" class="btn btn-info btn-sm" onclick="editSscoRates(\''.$short.'\')" data-toggle="modal" data-target="#editRatesModal">Edit</button>&nbsp;&nbsp;';
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
            echo '<div class="col">' . $rateData['oceanfreightRate'] . '</div>';
          }
        }
      }
      echo '</div><hr>';
    }
    if ($i < 5)
    {
      echo '<div class="row mb-2"><div class="col-3"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newOriginModal">Add Origin</button></div></div>';
    }
    echo '<div class="row"><div class="col-3"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newDestinationModal">Add Destination</button></div></div>';
  }
}
?>
