<div class="modal fade" id="editRatesModal" tabindex="-1" role="dialog" aria-labelledby="editRatesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="alert alert-success" role="alert" id="editRatesModalAlert" style="display: none;">
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="editRatesModalLabel">Edit Selected Rate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshRates()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="editRatesModalContent">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshRates()">Close</button>
          <button type="button" class="btn btn-danger" onclick="removeDestination()">Delete Destination</button>
          <button type="button" class="btn btn-primary" onclick="updateSscoRates()">Save changes</button>
        </div>
      </div>
    </div>
</div>
