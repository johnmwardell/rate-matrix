<div class="modal fade" id="newContractModal" tabindex="-1" role="dialog" aria-labelledby="newContract" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-success" role="alert" id="newContractModalAlert" style="display: none;">
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="newContractModalLabel">New Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="newContractModalContent">
        <div class="form-group">
          <label class="mr-sm-2" for="newContractNumber">Contract Number</label>
          <input type="text" class="form-control" id="newContractNumber" placeholder="S/C #" maxlength="20">
        </div>
        <div class="form-group">
          <label class="mr-sm-2" for="newContractStartDate">Start Date</label>
          <input type="date" class="form-control" id="newContractStartDate">
        </div>
        <div class="form-group">
          <label class="mr-sm-2" for="newContractEndDate">Expiry Date</label>
          <input type="date" class="form-control" id="newContractEndDate">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
        <button type="button" class="btn btn-primary" onclick="addContract()">Save</button>
      </div>
    </div>
  </div>
</div>
