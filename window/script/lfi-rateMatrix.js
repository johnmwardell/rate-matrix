/**********************************
*           QUICK SEARCH          *
***********************************/
function ajaxGet(location, returnFunction, method)
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      var result = JSON.parse(this.responseText);
      returnFunction({"method":method, "data":result})
    }
  };
  xmlhttp.open("GET",location);
  xmlhttp.send();
}

// Refresh lists of available origins and destinations for the Quick Search.
function refreshOptions()
{
  loadOrigins({"method":"call"});
  loadDestinations({"method":"call"});
}
// Loads a list of origins for the Quick Search. Uses JSON object for data.
function loadOrigins(container)
{
  switch (container.method)
  {
    case "call":
      shipper = document.getElementById("quickShipperSelect").value;
      ajaxGet("data/quickSearch/originSelect.php?shipper=" + shipper, loadOrigins, "load");
      break;
    case "load":
      var result = container.data;
      document.getElementById("quickOriginSelect").innerHTML = "<option>Choose...</option>";
      for (var i = 0; i < result.length; i++)
      {
        document.getElementById("quickOriginSelect").innerHTML += '<option value="' + result[i].originShort + '">' + result[i].originFull + '</option>';
      }
      break;
  }
}
// Loads a list of destinations for the Quick Search. Uses JSON object for data.
function loadDestinations(container)
{
  switch (container.method)
  {
    case "call":
      shipper = document.getElementById("quickShipperSelect").value;
      ajaxGet("data/quickSearch/destinationSelect.php?shipper=" + shipper, loadDestinations, "load");
      break;
    case "load":
      var result = container.data;
      document.getElementById("quickDestinationSelect").innerHTML = "<option>Choose...</option>";
      for (var i = 0; i < result.length; i++)
      {
        document.getElementById("quickDestinationSelect").innerHTML += '<option value="' + result[i].destinationShort + '">' + result[i].destinationFull + '</option>';
      }
      break;
  }
}
// Load results of Quick Search
function quickSearch(container)
{
  switch (container.method)
  {
    case "call":
      shipper = document.getElementById("quickShipperSelect").value;
      origin = document.getElementById("quickOriginSelect").value;
      destination = document.getElementById("quickDestinationSelect").value;
      ajaxGet("data/quickSearch/viewResults.php?shipper=" + shipper + "&origin=" + origin + "&destination=" + destination, quickSearch, "load");
      break;
    case "load":
      var result = container.data;

      document.getElementById("regularModalLabel").innerHTML = "Search Results";
      var content = "";
      for (var i = 0; i < result.length; i++) {
        content += "<p><strong>" + result[i].ssco + "</strong> - " + result[i].origin + "/" + result[i].destination + " - $" + result[i].rate + "</p>";
      }
      document.getElementById("regularModalContent").innerHTML = content;
      document.getElementById("regularModalFooter").innerHTML = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
      break;
  }
}
/**********************************
*           VIEW RATES            *
***********************************/

// Create list of SSCOs for shipper
function updateSscoList(container)
{
  switch (container.method)
  {
    case "call":
      shipper = document.getElementById("shipperSelect").value;
      ajaxGet("data/viewRates/shipperSelect.php?shipper=" + shipper, updateSscoList, "load");
      break;
    case "load":
      var result = container.data;
      document.getElementById("sscoSelect").innerHTML = "<option>Choose...</option>";
      for (var i = 0; i < result.length; i++)
      {
        document.getElementById("sscoSelect").innerHTML += '<option value="' + result[i].sscoShort + '">' + result[i].sscoFull + '</option>';
      }
      break;
  }
}

// Search rates based on shipper and SSCO
function viewSscoRates(container)
{
  switch (container.method)
  {
    case "call":
      ssco = document.getElementById("sscoSelect").value;
      shipper = document.getElementById("shipperSelect").value;
      //ajaxGet("data/viewRates/viewSscoRates.php?ssco=" + ssco + "&shipper=" + shipper, viewSscoRates, "load");
      ajaxGet("data/viewRates/loadContract.php?ssco=" + ssco + "&shipper=" + shipper, viewSscoRates, "loadContract");
      break;
    case "loadContract":
      var result = container.data;
      var content = "<div class='jumbotron jumbotron-fluid'><div class='row'>";
      content += "<div class='col-3'><h1>" + result.sscoFull + "</h1></div>";
      content += "<div class='col-2'>Contract: <br />Effective: <br />Expires: </div>";
      content += "<div class='col'><strong><span id=\'contractNumberVal\'>" + result.contractNumber + "</span></strong><br />";
      content += "<span id=\'contractStartVal\'>" + result.contractStart + "</span><br />";
      content += "<span id=\'contractEndVal\'>" + result.contractEnd + "</span></div>";
      content += "</div></div>";
      document.getElementById("ratesContractInfoBox").innerHTML = content;
      break;
  }

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("ratesMatrixData").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/viewRates/viewSscoRates.php?ssco=" + ssco + "&shipper=" + shipper);
  xmlhttp.send();
}

// Enable the Print Rate Matrix button
function enablePrintMatrix()
{
  document.getElementById("printRateMatrixButton").disabled = false;
}

// Open printable Rate Matrix
function printMatrix()
{
  shipper = document.getElementById("shipperSelect").value;

  window.open(dialog + "rateMatrix.php?shipper=" + shipper);
}

/**********************************
*           EDIT RATES            *
***********************************/

// Search rates based on shipper and SSCO
function viewEditSscoRates()
{
  ssco = document.getElementById("sscoSelect").value;
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showRatesHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/viewSscoRates.php?ssco=" + ssco + "&shipper=" + shipper);
  xmlhttp.send();
}

// Open modal window to edit rates for a particular destination.
function editSscoRates(destination)
{
  ssco = document.getElementById("sscoSelect").value;
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editRatesModalContent").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/editSscoRates.php?ssco=" + ssco + "&shipper=" + shipper + "&destination=" + destination);
  xmlhttp.send();
}

// Update database to match input in modal.
function updateSscoRates()
{
  ssco = document.getElementById("sscoSelect").value;
  shipper = document.getElementById("shipperSelect").value;
  destination = document.getElementById("chosenDestination").value;

  originCount = document.getElementById("originCount").value;

  sendData = "data/editRates/updateSscoRates.php?ssco=" + ssco + "&shipper=" + shipper + "&destination=" + destination + "&originCount=" + originCount;

  console.log("Total origins: " + originCount);

  if (document.getElementById("origin1"))
  {
    origin1 = document.getElementById("origin1").value;
    origin1Price = document.getElementById(origin1).value;
    console.log(origin1 + ": " + origin1Price);
    sendData += "&origin1=" + origin1 + "&origin1Price=" + origin1Price;
  }
  if (document.getElementById("origin2"))
  {
    origin2 = document.getElementById("origin2").value;
    origin2Price = document.getElementById(origin2).value;
    console.log(origin2 + ": " + origin2Price);
    sendData += "&origin2=" + origin2 + "&origin2Price=" + origin2Price;
  }
  if (document.getElementById("origin3"))
  {
    origin3 = document.getElementById("origin3").value;
    origin3Price = document.getElementById(origin3).value;
    console.log(origin3 + ": " + origin3Price);
    sendData += "&origin3=" + origin3 + "&origin3Price=" + origin3Price;
  }
  if (document.getElementById("origin4"))
  {
    origin4 = document.getElementById("origin4").value;
    origin4Price = document.getElementById(origin4).value;
    console.log(origin4 + ": " + origin4Price);
    sendData += "&origin4=" + origin4 + "&origin4Price=" + origin4Price;
  }
  if (document.getElementById("origin5"))
  {
    origin5 = document.getElementById("origin5").value;
    origin5Price = document.getElementById(origin5).value;
    console.log(origin5 + ": " + origin5Price);
    sendData += "&origin5=" + origin5 + "&origin5Price=" + origin5Price;
  }

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editRatesModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", sendData);
  xmlhttp.send();

  document.getElementById("editRatesModalAlert").style.display = "block";
}

// Adds new origin to shipper's list
function addOrigin()
{
  shipper = document.getElementById("shipperSelect").value;
  originShort = document.getElementById("addOriginSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("newOriginModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/newOrigin.php?originShort=" + originShort + "&shipper=" + shipper);
  xmlhttp.send();

  document.getElementById("newOriginModalAlert").style.display = "block";
}

// Adds new destination to shipper's list
function addDestination()
{
  shipper = document.getElementById("shipperSelect").value;
  destinationShort = document.getElementById("addDestionationSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("newDestinationModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/newDestination.php?destinationShort=" + destinationShort + "&shipper=" + shipper);
  xmlhttp.send();

  document.getElementById("newDestinationModalAlert").style.display = "block";
}

// Delete destination from shipper's list
function removeDestination()
{
  destination = document.getElementById("chosenDestination").value;
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editRatesModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/deleteDestination.php?destination=" + destination + "&shipper=" + shipper);
  xmlhttp.send();

  document.getElementById("editRatesModalAlert").style.display = "block";
  document.getElementById("editRatesModalAlert").class = "alert alert-danger";
}

// Delete origin from shipper's list
function removeOrigin(origin)
{
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementsByTagName("header").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/deleteOrigin.php?origin=" + origin + "&shipper=" + shipper);
  xmlhttp.send();

  refreshRates();
}

// Adds new contract with SSCO for shipper
function addContract()
{
  shipper = document.getElementById("shipperSelect").value;
  ssco = document.getElementById("sscoSelect").value;
  contract = document.getElementById("newContractNumber").value;
  startDate = document.getElementById("newContractStartDate").value;
  endDate = document.getElementById("newContractEndDate").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("newContractModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/newContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract + "&startDate=" + startDate + "&endDate=" + endDate);
  xmlhttp.send();

  document.getElementById("newContractModalAlert").style.display = "block";

  document.getElementById("newContractNumber").value = "";
  document.getElementById("newContractStartDate").value = "";
  document.getElementById("newContractEndDate").value = "";
}

// Passes contract values into a form for editing
function editContract()
{
  document.getElementById("editContractNumber").value = document.getElementById("contractNumberVal").innerHTML;
  document.getElementById("editContractStartDate").value = document.getElementById("contractStartVal").innerHTML;
  document.getElementById("editContractEndDate").value = document.getElementById("contractEndVal").innerHTML;
}

// Adds new contract with SSCO for shipper
function saveContract()
{
  shipper = document.getElementById("shipperSelect").value;
  ssco = document.getElementById("sscoSelect").value;
  contract = document.getElementById("editContractNumber").value;
  startDate = document.getElementById("editContractStartDate").value;
  endDate = document.getElementById("editContractEndDate").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editContractModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/editContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract + "&startDate=" + startDate + "&endDate=" + endDate);
  xmlhttp.send();

  document.getElementById("editContractModalAlert").style.display = "block";
}

// Delete a contract
function deleteContract()
{
  shipper = document.getElementById("shipperSelect").value;
  ssco = document.getElementById("sscoSelect").value;
  contract = document.getElementById("editContractNumber").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("deleteContractModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/editRates/deleteContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract);
  xmlhttp.send();

  document.getElementById("deleteContractModalAlert").style.display = "block";
}

// Upload a new contract
function uploadContract()
{
  shipper = document.getElementById("shipperSelect").value;
  ssco = document.getElementById("sscoSelect").value;

  window.open("data/contractUpload/uploadForm.php?shipper=" + shipper + "&ssco=" + ssco);
}

// Refresh page after update.
function refreshRates()
{
  viewEditSscoRates();
  clearAlerts();
}

// Clear alerts
function clearAlerts()
{
  document.getElementById("editRatesModalAlert").style.display = "none";
  document.getElementById("editRatesModalAlert").class = "alert alert-success";

  document.getElementById("newDestinationModalAlert").style.display = "none";
  document.getElementById("newOriginModalAlert").style.display = "none";

  document.getElementById("newContractModalAlert").style.display = "none";
  document.getElementById("editContractModalAlert").style.display = "none";
  document.getElementById("deleteContractModalAlert").style.display = "none";
}

/**********************************
*           DESTINATIONS          *
***********************************/

function viewDestinations()
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showDestinationsHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/destinations/viewDestinations.php");
  xmlhttp.send();
}
// Open modal window to edit a particular destination.
function editDestination(destination)
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editDestinationModalContent").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/destinations/editDestination.php?destination=" + destination);
  xmlhttp.send();
}

// Add destination to primary list
function newDestination()
{
  destinationShort = document.getElementById("newDestinationShort").value;
  destinationFull = document.getElementById("newDestinationFull").value;
  destinationCountry = document.getElementById("newDestinationCountry").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("newDestinationModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/destinations/newDestination.php?destinationShort=" + destinationShort + "&destinationFull=" + destinationFull + "&destinationCountry=" + destinationCountry);
  xmlhttp.send();

  document.getElementById("newDestinationModalAlert").style.display = "block";

  document.getElementById("newDestinationShort").value = "";
  document.getElementById("newDestinationFull").value = "";
  document.getElementById("newDestinationCountry").value = "";
}

// Delete destination from both primary list and all shipper's lists.
function deleteDestination()
{
  destination = document.getElementById("editDestinationShort").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editDestinationModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/destinations/deleteDestination.php?destination=" + destination);
  xmlhttp.send();

  document.getElementById("editDestinationModalAlert").style.display = "block";
  document.getElementById("editDestinationModalAlert").class = "alert alert-danger";
}

// Update destination on both primary list and all shipper's lists.
function updateDestination()
{
  destinationShort = document.getElementById("editDestinationShort").value;
  destinationFull = document.getElementById("editDestinationFull").value;
  destinationCountry = document.getElementById("editDestinationCountry").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editDestinationModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/destinations/updateDestination.php?destinationShort=" + destinationShort + "&destinationFull=" + destinationFull + "&destinationCountry=" + destinationCountry);
  xmlhttp.send();

  document.getElementById("editDestinationModalAlert").style.display = "block";
}

/**********************************
*             ORIGINS             *
***********************************/

function viewOrigins()
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showOriginsHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/origins/viewOrigins.php");
  xmlhttp.send();
}
// Open modal window to edit a particular origin.
function editOrigin(origin)
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editOriginModalContent").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/origins/editOrigin.php?origin=" + origin);
  xmlhttp.send();
}

// Add origin to primary list
function newOrigin()
{
  originShort = document.getElementById("newOriginShort").value;
  originFull = document.getElementById("newOriginFull").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("newOriginModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/origins/newOrigin.php?originShort=" + originShort + "&originFull=" + originFull);
  xmlhttp.send();

  document.getElementById("newOriginModalAlert").style.display = "block";

  document.getElementById("newOriginShort").value = "";
  document.getElementById("newOriginFull").value = "";
}

// Delete origin from both primary list and all shipper's lists.
function deleteOrigin()
{
  origin = document.getElementById("editOriginShort").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editOriginModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/origins/deleteOrigin.php?origin=" + origin);
  xmlhttp.send();

  document.getElementById("editOriginModalAlert").style.display = "block";
  document.getElementById("editOriginModalAlert").class = "alert alert-danger";
}

// Update origin on both primary list and all shipper's lists.
function updateOrigin()
{
  originShort = document.getElementById("editOriginShort").value;
  originFull = document.getElementById("editOriginFull").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("editOriginModalAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/origins/updateOrigin.php?originShort=" + originShort + "&originFull=" + originFull);
  xmlhttp.send();

  document.getElementById("editOriginModalAlert").style.display = "block";
}

/**********************************
*            SHIPPERS             *
***********************************/

function loadShippers()
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("shipperSelect").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/loadShippers.php");
  xmlhttp.send();
}
function viewShipper()
{
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showShipperHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/viewShipper.php?shipper=" + shipper);
  xmlhttp.send();
}
function newShipper()
{
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showShipperHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/newShipper.php");
  xmlhttp.send();
}
function addShipper()
{
  document.getElementById("updateShipperAlert").style.display = "none";

  shipperShort = document.getElementById("shipperShort").value;
  shipperFull = document.getElementById("shipperFull").value;
  shipperAddress = document.getElementById("shipperAddress").value;
  shipperPhone = document.getElementById("shipperPhone").value;
  shipperNote = document.getElementById("shipperNote").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("updateShipperAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/addShipper.php?shipperShort=" + shipperShort + "&shipperFull=" + shipperFull + "&shipperAddress=" + shipperAddress + "&shipperPhone=" + shipperPhone + "&shipperNote=" + shipperNote, false);
  xmlhttp.send();

  document.getElementById("updateShipperAlert").style.display = "block";

  loadShippers();
}
function updateShipper()
{
  document.getElementById("updateShipperAlert").style.display = "none";

  shipperShort = document.getElementById("shipperSelect").value;
  shipperFull = document.getElementById("shipperFull").value;
  shipperAddress = document.getElementById("shipperAddress").value;
  shipperPhone = document.getElementById("shipperPhone").value;
  shipperNote = document.getElementById("shipperNote").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("updateShipperAlert").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/updateShipper.php?shipperShort=" + shipperShort + "&shipperFull=" + shipperFull + "&shipperAddress=" + shipperAddress + "&shipperPhone=" + shipperPhone + "&shipperNote=" + shipperNote);
  xmlhttp.send();

  document.getElementById("updateShipperAlert").style.display = "block";
}
function deleteShipper()
{
  shipper = document.getElementById("shipperSelect").value;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("showShipperHere").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","data/shippers/deleteShipper.php?shipper=" + shipper, false);
  xmlhttp.send();

  loadShippers();
}
