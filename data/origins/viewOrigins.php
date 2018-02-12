<?php
include "../db.php";

$sql = 'SELECT * FROM originlist ORDER BY originListShort';
$result = $conn->query($sql);

echo '<div class="row mb-3"><div class="col-3"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newOriginModal">Add Origin</button></div></div>';
while($query = $result->fetch_assoc())
{
  $short = $query['originListShort'];
  echo '<div class="row mb-3"><div class="col-1"><button type="button" class="btn btn-info btn-sm" onclick="editOrigin(\''.$short.'\')" data-toggle="modal" data-target="#editOriginModal">Edit</button></div>';
  echo '<div class="col-2">' . $query['originListShort'] . '</div><div class="col">' . $query['originListFull'] . '</div></div>';
}
?>
