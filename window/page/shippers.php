<script>
loadShippers();
</script>
      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Shippers</h4>
              </div>
              <div class="card-body">
                <form method="get">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="mr-sm-2" for="shipperSelect">Shipper</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="shipperSelect" onchange="viewShipper()">
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <a class="btn btn-success" onclick="newShipper()" href="#">New Shipper</a>
                    </div>
                  </div>
                </form>
                <hr>
                <div id="showShipperHere"></div>
              </div>
            </div>
          </div>
        </div>
      </main>
