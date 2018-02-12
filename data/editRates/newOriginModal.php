<div class="modal fade" id="newOriginModal" tabindex="-1" role="dialog" aria-labelledby="newOriginModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="alert alert-success" role="alert" id="newOriginModalAlert" style="display: none;">
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="newOriginModalLabel">New Origin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="newOriginModalContent">
          <div class="form-group">
            <label class="mr-sm-2" for="newOriginShort">Origin</label>
            <select class="form-control" id="addOriginSelect" onchange="clearAlerts()">
              <option>Choose...</option>
<?php
$sqloriginList = 'SELECT * FROM originlist ORDER BY originListShort';
$resultoriginList = $conn->query($sqloriginList);
while($originDataList = $resultoriginList->fetch_assoc())
{
echo '<option value="' . $originDataList['originListShort'] . '">' . $originDataList['originListFull'] . '</option>';
}
?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
          <button type="button" class="btn btn-primary" onclick="addOrigin()">Add Origin</button>
        </div>
      </div>
    </div>
</div>
