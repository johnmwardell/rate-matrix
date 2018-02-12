<?php
include "../db.php";

$origin = $_GET['origin'];

$sql = 'SELECT * FROM originlist WHERE originListShort = "' . $origin . '"';
$result = $conn->query($sql);

while($query = $result->fetch_assoc())
{
  echo '<div class="form-group">';
    echo '<label class="mr-sm-2" for="editOriginShort">Origin Code</label>';
    echo '<input type="text" class="form-control" id="editOriginShort" placeholder="Origin Code (4 letters)" maxlength="4" value="' . $query['originListShort'] . '" disabled>';
    echo '<small id="editOriginShortHelp" class="form-text text-muted">Code cannot be longer than 4 letters.</small>';
  echo '</div>';
  echo '<div class="form-group">';
    echo '<label class="mr-sm-2" for="editOriginFull">Origin Name</label>';
    echo '<input type="text" class="form-control" id="editOriginFull" placeholder="Origin Name" maxlength="20" value="' . $query['originListFull'] . '">';
  echo '</div>';
}
?>
