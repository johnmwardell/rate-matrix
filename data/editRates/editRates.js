// Search rates based on shipper and SSCO
function viewSscoRates()
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
  xmlhttp.open("GET","widget/editRates/viewSscoRates.php?ssco=" + ssco + "&shipper=" + shipper);
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
  xmlhttp.open("GET","widget/editRates/editSscoRates.php?ssco=" + ssco + "&shipper=" + shipper + "&destination=" + destination);
  xmlhttp.send();
}

// Update database to match input in modal.
function updateSscoRates()
{
  ssco = document.getElementById("sscoSelect").value;
  shipper = document.getElementById("shipperSelect").value;
  destination = document.getElementById("chosenDestination").value;

  originCount = document.getElementById("originCount").value;

  sendData = "widget/editRates/updateSscoRates.php?ssco=" + ssco + "&shipper=" + shipper + "&destination=" + destination + "&originCount=" + originCount;

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
  xmlhttp.open("GET","widget/editRates/newOrigin.php?originShort=" + originShort + "&shipper=" + shipper);
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
  xmlhttp.open("GET","widget/editRates/newDestination.php?destinationShort=" + destinationShort + "&shipper=" + shipper);
  xmlhttp.send();

  document.getElementById("newDestinationModalAlert").style.display = "block";
}

// Delete destination from shipper's list
function deleteDestination()
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
  xmlhttp.open("GET","widget/editRates/deleteDestination.php?destination=" + destination + "&shipper=" + shipper);
  xmlhttp.send();

  document.getElementById("editRatesModalAlert").style.display = "block";
  document.getElementById("editRatesModalAlert").class = "alert alert-danger";
}

// Delete origin from shipper's list
function deleteOrigin(origin)
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
  xmlhttp.open("GET","widget/editRates/deleteOrigin.php?origin=" + origin + "&shipper=" + shipper);
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
  xmlhttp.open("GET","widget/editRates/newContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract + "&startDate=" + startDate + "&endDate=" + endDate);
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
  xmlhttp.open("GET","widget/editRates/editContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract + "&startDate=" + startDate + "&endDate=" + endDate);
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
  xmlhttp.open("GET","widget/editRates/deleteContract.php?shipper=" + shipper + "&ssco=" + ssco + "&contract=" + contract);
  xmlhttp.send();

  document.getElementById("deleteContractModalAlert").style.display = "block";
}

// Refresh page after update.
function refreshRates()
{
  viewSscoRates();
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
