<div class="modal fade" id="deleteContractModal" tabindex="-1" role="dialog" aria-labelledby="deleteContract" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" role="alert" id="deleteContractModalAlert" style="display: none;">
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="deleteContractModalLabel">Confirm Delete Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="deleteContractModalContent">
        <p>Are you sure you want to delete this contract? All rates will be deleted.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteContract()">Delete Contract</button>
      </div>
    </div>
  </div>
</div>
