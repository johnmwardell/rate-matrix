<?php
include "../db.php";

echo '<form method="get">';
echo '<div class="row">';
echo '<div class="col-2"><div class="form-group"><label for="shipperShort">Shipper Code</label>';
echo '<input type="text" class="form-control" id="shipperShort" placeholder="Shipper Code (8 letters)" maxlength="8">';
echo '</div>';
echo '</div>';
echo '<div class="col"><div class="form-group"><label for="shipperFull">Name</label>';
echo '<input type="text" class="form-control" id="shipperFull" placeholder="Shipper Name">';
echo '</div>';
echo '</div>';
echo '<div class="col"><div class="form-group"><label for="shipperPhone">Phone Number</label>';
echo '<input type="tel" class="form-control" id="shipperPhone" placeholder="(888)888-8888">';
echo '</div>';
echo '</div></div>';
echo '<div class="row"><div class="col"><div class="form-group"><label for="shipperAddress">Address</label>';
echo '<textarea class="form-control" id="shipperAddress" rows="5"></textarea>';
echo '</div>';
echo '</div></div>';
echo '<div class="row"><div class="col"><div class="form-group"><label for="shipperNote">Notes</label>';
echo '<textarea class="form-control" id="shipperNote" rows="5"></textarea>';
echo '</div>';
echo '</div></div>';
echo '</form>';

echo '<div class="row"><div class="col-3"><button type="button" class="btn btn-success" onclick="addShipper()">Save</button></div>';
echo '<div class="col"><div class="alert alert-success" role="alert" id="updateShipperAlert" style="display: none;"></div></div></div>';
?>
