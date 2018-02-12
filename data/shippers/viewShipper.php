<?php
include "../db.php";

$shipper = $_GET['shipper'];

$sql = 'SELECT * FROM shipper WHERE shipperShort = "' . $shipper . '"';
$result = $conn->query($sql);

while($query = $result->fetch_assoc())
{
  echo '<form method="get">';
  echo '<div class="row"><div class="col"><div class="form-group"><label for="shipperFull">Name</label>';
  echo '<input type="text" class="form-control" id="shipperFull" value="' . $query['shipperFull'] . '">';
  echo '</div>';
  echo '</div>';
  echo '<div class="col"><div class="form-group"><label for="shipperPhone">Phone Number</label>';
  echo '<input type="text" class="form-control" id="shipperPhone" value="' . $query['shipperPhone'] . '">';
  echo '</div>';
  echo '</div></div>';
  echo '<div class="row"><div class="col"><div class="form-group"><label for="shipperAddress">Address</label>';
  echo '<textarea class="form-control" id="shipperAddress" rows="5">' . $query['shipperAddress'] . '</textarea>';
  echo '</div>';
  echo '</div></div>';
  echo '<div class="row"><div class="col"><div class="form-group"><label for="shipperNote">Notes</label>';
  echo '<textarea class="form-control" id="shipperNote" rows="5">' . $query['shipperNote'] . '</textarea>';
  echo '</div>';
  echo '</div></div>';
  echo '</form>';


}
  echo '<div class="row"><div class="col-3"><button type="button" class="btn btn-success" onclick="updateShipper()">Save</button></div>';
  echo '<div class="col-3"><button type="button" class="btn btn-danger" onclick="deleteShipper()">Delete</button></div>';
  echo '<div class="col"><div class="alert alert-success" role="alert" id="updateShipperAlert" style="display: none;"></div></div></div>';
?>
