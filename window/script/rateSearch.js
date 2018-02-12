// Example of how a rate search tool would work.
function Port(name, type) {
  this.name = name;
  this.type = type;
}
var portType = ['Origin', 'Destination'];
function SSCO(name, perContainer) {
  this.name = name;
  this.perContainer = perContainer;
  this.rate = [];
}
// init SSCOs
var APL = new SSCO("APL", 38);
var CSC = new SSCO("Cosco", 12);
var EVR = new SSCO("Evergreen", 12);
var HYD = new SSCO("Hyundai", 36);
var KLN = new SSCO("K-Line", 0);
var MRK = new SSCO("Maersk", 15);
var NYK = new SSCO("NYK", 50);
var OCL = new SSCO("OOCL", 0);
var WWD = new SSCO("Westwood", 353);
var YMG = new SSCO("YangMing", 32);

var sscoList = [APL, CSC, EVR, HYD, KLN, MRK, NYK, OCL, WWD, YMG];

// init origin ports
var PDX = new Port("Portland", portType[0]);
var TAC = new Port("Tacoma", portType[0]);
var SEA = new Port("Seattle", portType[0]);

var portList = [PDX, TAC, SEA];

// init destination ports
var KWNG = new Port("Kwangyang", portType[1]);
var BSN = new Port("Busan", portType[1]);
var TKO = new Port("Tokyo", portType[1]);

var destList = [KWNG, BSN, TKO];

APL.rate[0] = {origin : PDX, destination : KWNG, rate : 1000};
APL.rate[1] = {origin : TAC, destination : KWNG, rate : null};
APL.rate[2] = {origin : SEA, destination : KWNG, rate : null};
APL.rate[3] = {origin : PDX, destination : BSN, rate : 950};
APL.rate[4] = {origin : TAC, destination : BSN, rate : null};
APL.rate[5] = {origin : SEA, destination : BSN, rate : null};
APL.rate[6] = {origin : PDX, destination : TKO, rate: 975};
APL.rate[7] = {origin : TAC, destination : TKO, rate : null};
APL.rate[8] = {origin : SEA, destination : TKO, rate : null};

CSC.rate[0] = {origin : PDX, destination : KWNG, rate: 1040};
CSC.rate[1] = {origin : TAC, destination : KWNG, rate: 590};
CSC.rate[2] = {origin : SEA, destination : KWNG, rate: 590};
CSC.rate[3] = {origin : PDX, destination : BSN, rate: 900};
CSC.rate[4] = {origin : TAC, destination : BSN, rate: 450};
CSC.rate[5] = {origin : SEA, destination : BSN, rate: 450};
CSC.rate[6] = {origin : PDX, destination : TKO, rate: 950};
CSC.rate[7] = {origin : TAC, destination : TKO, rate: 500};
CSC.rate[8] = {origin : SEA, destination : TKO, rate: 550};

EVR.rate[0] = {origin : PDX, destination : KWNG, rate: null};
EVR.rate[1] = {origin : TAC, destination : KWNG, rate: 620};
EVR.rate[2] = {origin : SEA, destination : KWNG, rate: null};
EVR.rate[3] = {origin : PDX, destination : BSN, rate: null};
EVR.rate[4] = {origin : TAC, destination : BSN, rate: 620};
EVR.rate[5] = {origin : SEA, destination : BSN, rate: null};
EVR.rate[6] = {origin : PDX, destination : TKO, rate: null};
EVR.rate[7] = {origin : TAC, destination : TKO, rate: 595};
EVR.rate[8] = {origin : SEA, destination : TKO, rate: null};

HYD.rate[0] = {origin : PDX, destination : KWNG, rate: 1007};
HYD.rate[1] = {origin : TAC, destination : KWNG, rate: 607};
HYD.rate[2] = {origin : SEA, destination : KWNG, rate: null};
HYD.rate[3] = {origin : PDX, destination : BSN, rate: 1007};
HYD.rate[4] = {origin : TAC, destination : BSN, rate: 607};
HYD.rate[5] = {origin : SEA, destination : BSN, rate: null};
HYD.rate[6] = {origin : PDX, destination : TKO, rate: 1091};
HYD.rate[7] = {origin : TAC, destination : TKO, rate: 671};
HYD.rate[8] = {origin : SEA, destination : TKO, rate: null};

KLN.rate[0] = {origin : PDX, destination : KWNG, rate: null};
KLN.rate[1] = {origin : TAC, destination : KWNG, rate: null};
KLN.rate[2] = {origin : SEA, destination : KWNG, rate: null};
KLN.rate[3] = {origin : PDX, destination : BSN, rate: 1000};
KLN.rate[4] = {origin : TAC, destination : BSN, rate: null};
KLN.rate[5] = {origin : SEA, destination : BSN, rate: null};
KLN.rate[6] = {origin : PDX, destination : TKO, rate: 1000};
KLN.rate[7] = {origin : TAC, destination : TKO, rate: 600};
KLN.rate[8] = {origin : SEA, destination : TKO, rate: null};

MRK.rate[0] = {origin : PDX, destination : KWNG, rate: 968};
MRK.rate[1] = {origin : TAC, destination : KWNG, rate: null};
MRK.rate[2] = {origin : SEA, destination : KWNG, rate: 518};
MRK.rate[3] = {origin : PDX, destination : BSN, rate: 968};
MRK.rate[4] = {origin : TAC, destination : BSN, rate: null};
MRK.rate[5] = {origin : SEA, destination : BSN, rate: 968};
MRK.rate[6] = {origin : PDX, destination : TKO, rate: 1450};
MRK.rate[7] = {origin : SEA, destination : TKO, rate: null};
MRK.rate[8] = {origin : SEA, destination : TKO, rate: 1000};

NYK.rate[0] = {origin : PDX, destination : KWNG, rate: 1000};
NYK.rate[1] = {origin : TAC, destination : KWNG, rate: null};
NYK.rate[2] = {origin : SEA, destination : KWNG, rate: null};
NYK.rate[3] = {origin : PDX, destination : BSN, rate: 1000};
NYK.rate[4] = {origin : TAC, destination : BSN, rate: null};
NYK.rate[5] = {origin : SEA, destination : BSN, rate: null};
NYK.rate[6] = {origin : PDX, destination : TKO, rate: 1000};
NYK.rate[7] = {origin : TAC, destination : TKO, rate: null};
NYK.rate[8] = {origin : SEA, destination : TKO, rate: null};

OCL.rate[0] = {origin : PDX, destination : KWNG, rate: null};
OCL.rate[1] = {origin : TAC, destination : KWNG, rate: null};
OCL.rate[2] = {origin : SEA, destination : KWNG, rate: null};
OCL.rate[3] = {origin : PDX, destination : BSN, rate: null};
OCL.rate[4] = {origin : TAC, destination : BSN, rate: null};
OCL.rate[5] = {origin : SEA, destination : BSN, rate: null};
OCL.rate[6] = {origin : PDX, destination : TKO, rate: 1250};
OCL.rate[7] = {origin : TAC, destination : TKO, rate: null};
OCL.rate[8] = {origin : SEA, destination : TKO, rate: null};

WWD.rate[0] = {origin : PDX, destination : KWNG, rate: 772};
WWD.rate[1] = {origin : TAC, destination : KWNG, rate: 383};
WWD.rate[2] = {origin : SEA, destination : KWNG, rate: null};
WWD.rate[3] = {origin : PDX, destination : BSN, rate: 832};
WWD.rate[4] = {origin : TAC, destination : BSN, rate: 383};
WWD.rate[5] = {origin : SEA, destination : BSN, rate: null};
WWD.rate[6] = {origin : PDX, destination : TKO, rate: 782};
WWD.rate[7] = {origin : TAC, destination : TKO, rate: 363};
WWD.rate[8] = {origin : SEA, destination : TKO, rate: null};

YMG.rate[0] = {origin : PDX, destination : KWNG, rate: 1100};
YMG.rate[1] = {origin : TAC, destination : KWNG, rate: null};
YMG.rate[2] = {origin : SEA, destination : KWNG, rate: 600};
YMG.rate[3] = {origin : PDX, destination : BSN, rate: 1100};
YMG.rate[4] = {origin : TAC, destination : BSN, rate: null};
YMG.rate[5] = {origin : SEA, destination : BSN, rate: 600};
YMG.rate[6] = {origin : PDX, destination : TKO, rate: 1100};
YMG.rate[7] = {origin : TAC, destination : TKO, rate: 500};
YMG.rate[8] = {origin : SEA, destination : TKO, rate: null};

function loadSearch() {
  var origin = document.getElementById("origin").value;
  var destination = document.getElementById("destination").value;
  var rateSearch = document.getElementById("rateSearch");
  rateSearch.innerHTML = "";

  for (var a = 0; a < sscoList.length; a++) {
    rateSearch.innerHTML += '<h4 class="card-title" id="' + sscoList[a].name + '" style="display: none;">' + sscoList[a].name + '</h4><br />';
    for (var i = 0; i < sscoList[a].rate.length; i++) {
      if (sscoList[a].rate[i].origin.name == origin && sscoList[a].rate[i].destination.name == destination) {
        if (sscoList[a].rate[i].rate != null) {
          rateSearch.innerHTML += sscoList[a].rate[i].origin.name + "/" + sscoList[a].rate[i].destination.name + ": $" + sscoList[a].rate[i].rate + "<br />";
          document.getElementById(sscoList[a].name).style.display = "block";
        }
      }
    }
  }
}

function loadMatrix() {
  var sscoQuery = document.getElementById("ssco").value;
  var rateMatrix = document.getElementById("rateMatrix");
  rateMatrix.innerHTML = "";

  for (var a = 0; a < sscoList.length; a++) {
    if (sscoList[a].name == sscoQuery){
      rateMatrix.innerHTML += '<h4 class="card-title" id="' + sscoList[a].name + '">' + sscoList[a].name + '</h4><br /><div class="container" id="matrixTable"><div class="row" id="matrixHead"><div class="col">&nbsp;</div></div></div>';

      for (var b = 0; b < portList.length; b++) {
        document.getElementById("matrixHead").innerHTML += '<div class="col">' + portList[b].name + '</div>';
      }
      for (var c = 0; c < destList.length; c++){
        rateMatrix.innerHTML += '<div class="row" id="' + destList[c].name + '"><div class="col">' + destList[c].name + '</div></div>';
        current = document.getElementById(destList[c].name);
        for (var b = 0; b < portList.length; b++) {
          for (var i = 0; i < sscoList[a].rate.length; i++) {
            if (sscoList[a].rate[i].origin.name == portList[b].name && sscoList[a].rate[i].destination.name == destList[c].name) {
              if (sscoList[a].rate[i].rate == null) {
                current.innerHTML += '<div class="col">&nbsp;</div>';
              }
              else {
                current.innerHTML += '<div class="col">$' + sscoList[a].rate[i].rate + "</div>";
              }
            }
          }
        }
      }
    }
  }
}
