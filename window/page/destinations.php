<script>
// Initialize destination list
viewDestinations();
</script>
      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Destinations</h4>
              </div>
              <div class="card-body">
                <form method="get">
                </form>
                <hr>
                <div id="showDestinationsHere"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modals -->
        <!-- Add Destination -->
        <div class="modal fade" id="newDestinationModal" tabindex="-1" role="dialog" aria-labelledby="newDestination" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="alert alert-success" role="alert" id="newDestinationModalAlert" style="display: none;">
              </div>
              <div class="modal-header">
                <h5 class="modal-title" id="newDestinationModalLabel">New Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="viewDestinations();document.getElementById('newDestinationModalAlert').style.display='none'">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="newDestinationModalContent">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="mr-sm-2" for="newDestinationShort">Destination Code</label>
                      <input type="text" class="form-control" id="newDestinationShort" placeholder="Destination Code (4 letters)" maxlength="4">
                      <small id="newDestinationShortHelp" class="form-text text-muted">Code cannot be longer than 4 letters.</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="mr-sm-2" for="newDestinationCountry">Country Code</label>
                      <input type="text" class="form-control" id="newDestinationCountry" placeholder="Country Code (2-4 letters)" maxlength="4">
                      <small id="newDestinationCountryHelp" class="form-text text-muted">CN, KR, JP, TW, ASIA</small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="mr-sm-2" for="newDestinationShort">Destination Name</label>
                  <input type="text" class="form-control" id="newDestinationFull" placeholder="Destination Name" maxlength="20">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="viewDestinations();document.getElementById('newDestinationModalAlert').style.display='none'">Close</button>
                <button type="button" class="btn btn-primary" onclick="newDestination()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Edit Rates -->
        <div class="modal fade" id="editDestinationModal" tabindex="-1" role="dialog" aria-labelledby="editDestinationModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="alert alert-success" role="alert" id="editDestinationModalAlert" style="display: none;">
              </div>
              <div class="modal-header">
                <h5 class="modal-title" id="editDestinationModalLabel">Edit Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="viewDestinations();document.getElementById('editDestinationModalAlert').style.display='none'">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="editDestinationModalContent">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="viewDestinations();document.getElementById('editDestinationModalAlert').style.display='none'">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteDestination()">Delete Destination</button>
                <button type="button" class="btn btn-primary" onclick="updateDestination()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </main>
