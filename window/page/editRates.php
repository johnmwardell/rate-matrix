      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Edit Rates</h4>
              </div>
              <div class="card-body">
                <form method="get">
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label class="mr-sm-2" for="shipperSelect">Shipper</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="shipperSelect">
                          <option>Choose...</option>
<?php
                          $sql = "SELECT shipperShort, shipperFull FROM shipper ORDER BY shipperShort";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row["shipperShort"] . '">' . $row["shipperFull"] . '</option>
';
                            }
                          }
?>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="mr-sm-2" for="sscoSelect">SSCO</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sscoSelect" onchange="viewEditSscoRates()">
                          <option selected>Choose...</option>
<?php
                          $sql = "SELECT sscoShort, sscoFull FROM ssco ORDER BY sscoShort";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row["sscoShort"] . '">' . $row["sscoFull"] . '</option>
';
                            }
                          }
?>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
                <hr>
                <div id="showRatesHere"></div>
                <!-- Modals -->
                <!-- Edit Rates -->
                <?php include "data/editRates/editRatesModal.php"; ?>
                <!-- New Destination -->
                <?php include "data/editRates/newDestinationModal.php"; ?>
                <!-- New origin -->
                <?php include "data/editRates/newOriginModal.php"; ?>
                <!-- Add Contract -->
                <?php include "data/editRates/newContractModal.php"; ?>
                <!-- Edit Contract -->
                <?php include "data/editRates/editContractModal.php"; ?>
                <!-- Delete Contract -->
                <?php include "data/editRates/deleteContractModal.php"; ?>
              </div>
            </div>
          </div>
        </div>
      </main>
