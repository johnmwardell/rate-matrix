<?php
include "../db.php";

$destination = $_GET['destination'];

$sql = 'SELECT * FROM destlist WHERE destListShort = "' . $destination . '"';
$result = $conn->query($sql);

while($query = $result->fetch_assoc())
{
  echo '<div class="row">';
    echo '<div class="col">';
      echo '<div class="form-group">';
        echo '<label class="mr-sm-2" for="editDestinationShort">Destination Code</label>';
        echo '<input type="text" class="form-control" id="editDestinationShort" placeholder="Destination Code (4 letters)" maxlength="4" value="' . $query['destListShort'] . '" disabled>';
        echo '<small id="editDestinationShortHelp" class="form-text text-muted">Code cannot be longer than 4 letters.</small>';
      echo '</div>';
    echo '</div>';
    echo '<div class="col">';
      echo '<div class="form-group">';
        echo '<label class="mr-sm-2" for="editDestinationCountry">Country Code</label>';
        echo '<input type="text" class="form-control" id="editDestinationCountry" placeholder="Country Code (2-4 letters)" maxlength="4" value="' . $query['destListCountry'] . '">';
        echo '<small id="editDestinationCountryHelp" class="form-text text-muted">CN, KR, JP, TW, ASIA</small>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
  echo '<div class="form-group">';
    echo '<label class="mr-sm-2" for="editDestinationFull">Destination Name</label>';
    echo '<input type="text" class="form-control" id="editDestinationFull" placeholder="Destination Name" maxlength="20" value="' . $query['destListFull'] . '">';
  echo '</div>';
}
?>
