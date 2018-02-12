<script>
// Initialize origin list
viewOrigins();
</script>
      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Origins</h4>
              </div>
              <div class="card-body">
                <form method="get">
                </form>
                <hr>
                <div id="showOriginsHere"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modals -->
        <!-- Add Origin -->
        <div class="modal fade" id="newOriginModal" tabindex="-1" role="dialog" aria-labelledby="newOrigin" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="alert alert-success" role="alert" id="newOriginModalAlert" style="display: none;">
              </div>
              <div class="modal-header">
                <h5 class="modal-title" id="newOriginModalLabel">New Origin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="viewOrigins()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="newOriginModalContent">
                <div class="form-group">
                  <label class="mr-sm-2" for="newOriginShort">Origin Code</label>
                  <input type="text" class="form-control" id="newOriginShort" placeholder="Origin Code (4 letters)" maxlength="4">
                  <small id="newOriginShortHelp" class="form-text text-muted">Code cannot be longer than 4 letters.</small>
                </div>
                <div class="form-group">
                  <label class="mr-sm-2" for="newOriginShort">Origin Name</label>
                  <input type="text" class="form-control" id="newOriginFull" placeholder="Origin Name" maxlength="20">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="viewOrigins()">Close</button>
                <button type="button" class="btn btn-primary" onclick="newOrigin()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Edit Rates -->
        <div class="modal fade" id="editOriginModal" tabindex="-1" role="dialog" aria-labelledby="editOriginModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="alert alert-success" role="alert" id="editOriginModalAlert" style="display: none;">
              </div>
              <div class="modal-header">
                <h5 class="modal-title" id="editOriginModalLabel">Edit Origin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="viewOrigins()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="editOriginModalContent">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="viewOrigins()">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteOrigin()">Delete Origin</button>
                <button type="button" class="btn btn-primary" onclick="updateOrigin()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </main>
