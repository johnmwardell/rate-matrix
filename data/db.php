<?php
// DB Connection Details
$servername = "localhost";
$username = "*****";
$password = "*****";
$dbname = "*****";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error
);
}

// DB Functions
function sqlQuery($sql, $conn)
{
  $result = $conn->query($sql);
  return $result;
}

// Attempting to make a DB class and object...

class DB {
  private $conn;

  function __construct($servername, $username, $password, $dbname)
  {
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error
    );
    }
  }

  // Perform any SQL query
  public function sqlQuery($sql)
  {
    $result = $this->conn->query($sql);
    return $result;
  }

  // Get a specific SSCO
  public function getSSCO($ssco)
  {
    $sql = 'SELECT * FROM ssco WHERE sscoShort = "' . $ssco . '"';
    $result = $this->sqlQuery($sql);
    return $result;
  }

  // Get a specific contract
  public function getContract($shipper, $ssco)
  {
    $sql = 'SELECT * FROM contract WHERE contractShipper = "' . $shipper . '" AND contractSsco = "' . $ssco . '"';
    $result = $this->sqlQuery($sql);
    return $result;
  }

  // Get a specific rate
  public function getRate($ssco, $shipper, $origin, $destination)
  {
    $sql = 'SELECT oceanfreightRate, oceanfreightID FROM oceanfreight
    WHERE oceanfreightSsco = "' . $ssco . '"
    AND oceanfreightShipper = "' . $shipper . '"
    AND oceanfreightOrigin = "' . $origin . '"
    AND oceanfreightDestination = "' . $destination .'" ORDER BY oceanfreightID DESC LIMIT 1';
    $result = $this->sqlQuery($sql);
    return $result;
  }
}

$db = new DB($servername, $username, $password, $dbname);
 ?>
