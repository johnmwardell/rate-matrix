      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">View Rates</h4>
              </div>
              <div class="card-body">
                <form method="get">
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label class="mr-sm-2" for="shipperSelect">Shipper</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="shipperSelect" onchange="updateSscoList({'method':'call'});enablePrintMatrix()">
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
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sscoSelect" onchange="viewSscoRates({'method':'call'})">
                          <option selected>Choose...</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <button id='printRateMatrixButton' type='button' class='btn btn-info btn-sm' onclick='printMatrix()' disabled>Print Rate Matrix</button>
                    </div>
                  </div>
                </form>
                <hr>
                <div id="showRatesHere">
                  <div id="ratesContractInfoBox"></div>
                  <div class="row" id="ratesColumnOrigins"></div>
                  <div id="ratesMatrixData"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
