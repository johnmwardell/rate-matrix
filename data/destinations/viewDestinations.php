<?php
include "../db.php";

$sql = 'SELECT * FROM destlist ORDER BY destListShort';
$result = $conn->query($sql);

echo '<div class="row mb-3"><div class="col-3"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newDestinationModal">Add Destination</button></div></div>';
while($query = $result->fetch_assoc())
{
  $short = $query['destListShort'];
  echo '<div class="row mb-3"><div class="col-1"><button type="button" class="btn btn-info btn-sm" onclick="editDestination(\''.$short.'\')" data-toggle="modal" data-target="#editDestinationModal">Edit</button></div>';
  echo '<div class="col-2">' . $query['destListShort'] . '</div><div class="col">' . $query['destListFull'] . '</div></div>';
}
?>
