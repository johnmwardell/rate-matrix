<script>
function showRates()
{
  ssco = document.getElementById("sscoSelect").value;
  origin = document.getElementById("originOptions").value;
  destination = document.getElementById("destinationOptions").value;

  console.log(ssco);
  console.log(origin);
  console.log(destination);

  fetchRates(ssco, origin, destination);

  document.getElementById("showRatesHere").style.display = "block";
}
function fetchRates(ssco, origin, destination) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showRatesHere").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","data/newBooking/getRate.php?ssco=" + ssco + "&origin=" + origin + "&destination=" + destination);
        xmlhttp.send();
}
</script>
      <main>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">New Booking Request</h4>
              </div>
              <div class="card-body">
                <form method="get">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="mr-sm-2" for="shipperSelect">Shipper</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="shipperSelect">
                          <option>Choose...</option>
<?php
                          $sql = "SELECT shipperShort, shipperFull FROM shipper";
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
                    <div class="col">
                      <div class="form-group">
                        <input type="text" class="form-control" id="shipperRefNumInput" placeholder="Shipper Ref #">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="col">
                        <div class="form-group">
                          <label class="mr-sm-2" for="sscoSelect">SSCO</label>
                          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sscoSelect">
                            <option selected>Choose...</option>
  <?php
                            $sql = "SELECT sscoShort, sscoFull FROM ssco";
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
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <div class="form-group">
                        <label for="originOptions">Origin</label>
                        <select multiple class="form-control" id="originOptions">
<?php
                      $sql = "SELECT originShort, originFull FROM origin";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo '<option value="' . $row["originShort"] . '">' . $row["originFull"] . '</option>
';
                        }
                      }
?>
                        </select>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="destinationOptions">Destination</label>
                        <select multiple class="form-control" id="destinationOptions">
<?php
                      $sql = "SELECT destinationShort, destinationFull FROM destination";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo '<option value="' . $row["destinationShort"] . '">' . $row["destinationFull"] . '</option>
';
                        }
                      }
?>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <a class="btn btn-primary" onclick="showRates()" href="#">Check Rates</a>
                      <div class="mt-3 alert alert-info" role="alert"id="showRatesHere" style="display: none;"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Additional Notes</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="emailForm">Contact E-mail Address</label>
                    <input type="email" class="form-control" id="emailForm" placeholder="name@example.com">
                  </div>
                  <button type="submit" class="btn btn-primary">Request Booking</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
