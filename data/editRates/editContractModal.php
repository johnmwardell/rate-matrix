<div class="modal fade" id="editContractModal" tabindex="-1" role="dialog" aria-labelledby="editContract" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-success" role="alert" id="editContractModalAlert" style="display: none;">
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="editContractModalLabel">Update Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editContractModalContent">
        <div class="form-group">
          <label class="mr-sm-2" for="editContractNumber" onchange="clearAlerts()">Contract Number</label>
          <input type="text" class="form-control" id="editContractNumber" placeholder="S/C #" maxlength="20">
        </div>
        <div class="form-group">
          <label class="mr-sm-2" for="editContractStartDate" onchange="clearAlerts()">Start Date</label>
          <input type="date" class="form-control" id="editContractStartDate">
        </div>
        <div class="form-group">
          <label class="mr-sm-2" for="editContractEndDate" onchange="clearAlerts()">Expiry Date</label>
          <input type="date" class="form-control" id="editContractEndDate">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveContract()">Save Changes</button>
      </div>
    </div>
  </div>
</div>
