<?php
// Enable modals
$modalReg = true;
?>
<main>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">LF Rate Matrix Application</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Rate Search</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label class="mr-sm-2" for="quickShipperSelect">Shipper</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="quickShipperSelect" onchange="refreshOptions()">
                  <option>Choose...</option>
<?php
$result = $db->sqlQuery("SELECT shipperShort, shipperFull FROM shipper ORDER BY shipperShort");
while($row = $result->fetch_assoc())
{
echo '<option value="' . $row["shipperShort"] . '">' . $row["shipperFull"] . '</option>';
}
?>
                </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2" for="quickOriginSelect">Origin</label>
                <select class="form-control" id="quickOriginSelect">
                  <option>Choose...</option>
                </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2" for="quickDestinationSelect">Destination</label>
                <select class="form-control" id="quickDestinationSelect">
                  <option>Choose...</option>
                </select>
              </div>
              <!-- <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#quickSearchModal' onclick="quickSearch()">Search</button> -->
              <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#regularModal' onclick="quickSearch({'method':'call'})">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
