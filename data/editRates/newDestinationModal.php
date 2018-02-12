<div class="modal fade" id="newDestinationModal" tabindex="-1" role="dialog" aria-labelledby="newDestinationModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="alert alert-success" role="alert" id="newDestinationModalAlert" style="display: none;">
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="newDestinationModalLabel">New Destination</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="newDestinationModalContent">
          <div class="form-group">
            <label class="mr-sm-2" for="newDestinationShort">Destination</label>
            <select class="form-control" id="addDestionationSelect" onchange="clearAlerts()">
              <option>Choose...</option>
<?php
$sqldestList = 'SELECT * FROM destlist ORDER BY destListShort';
$resultdestList = $conn->query($sqldestList);
while($destDataList = $resultdestList->fetch_assoc())
{
echo '<option value="' . $destDataList['destListShort'] . '">' . $destDataList['destListFull'] . '</option>';
}
?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
          <button type="button" class="btn btn-primary" onclick="addDestination()">Add Destination</button>
        </div>
      </div>
    </div>
</div>
