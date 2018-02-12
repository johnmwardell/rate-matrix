<?php
include "../db.php";

$ssco = $_GET['ssco'];
$shipper = $_GET['shipper'];
$destination = $_GET['destination'];

date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d');

$originCount = $_GET['originCount'];

if (isset($_GET['origin1']))
{
  $origin1 = $_GET['origin1'];
  $origin1Price = $_GET['origin1Price'];
}
else {
  $origin1 = "";
  $origin1Price = "";
}
if (isset($_GET['origin2']))
{
  $origin2 = $_GET['origin2'];
  $origin2Price = $_GET['origin2Price'];
}
else {
  $origin2 = "";
  $origin2Price = "";
}
if (isset($_GET['origin3']))
{
  $origin3 = $_GET['origin3'];
  $origin3Price = $_GET['origin3Price'];
}
else {
  $origin3 = "";
  $origin3Price = "";
}
if (isset($_GET['origin4']))
{
  $origin4 = $_GET['origin4'];
  $origin4Price = $_GET['origin4Price'];
}
else {
  $origin4 = "";
  $origin4Price = "";
}
if (isset($_GET['origin5']))
{
  $origin5 = $_GET['origin5'];
  $origin5Price = $_GET['origin5Price'];
}
else {
  $origin5 = "";
  $origin5Price = "";
}

$err = false;

if (!empty($origin1Price))
{
  $sql1 = "INSERT INTO oceanfreight (oceanfreightShipper, oceanfreightSsco, oceanfreightOrigin, oceanfreightDestination, oceanfreightRate, oceanfreightUpdated) VALUES
  ('" . $shipper . "', '" . $ssco . "', '" . $origin1 . "', '" . $destination . "', " . $origin1Price . ", '" . $date . "')";
  if ($conn->query($sql1) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}
else
{
  $sql1 = "DELETE FROM oceanfreight
  WHERE oceanfreightSsco = '" . $ssco . "'
  AND oceanfreightShipper = '" . $shipper . "'
  AND oceanfreightDestination = '" . $destination . "'
  AND oceanfreightOrigin = '" . $origin1 . "'";
  if ($conn->query($sql1) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}

if (!empty($origin2Price))
{
  $sql2 = "INSERT INTO oceanfreight (oceanfreightShipper, oceanfreightSsco, oceanfreightOrigin, oceanfreightDestination, oceanfreightRate, oceanfreightUpdated) VALUES
  ('" . $shipper . "', '" . $ssco . "', '" . $origin2 . "', '" . $destination . "', " . $origin2Price . ", '" . $date . "')";
  if ($conn->query($sql2) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}
else
{
  $sql2 = "DELETE FROM oceanfreight
  WHERE oceanfreightSsco = '" . $ssco . "'
  AND oceanfreightShipper = '" . $shipper . "'
  AND oceanfreightDestination = '" . $destination . "'
  AND oceanfreightOrigin = '" . $origin2 . "'";
  if ($conn->query($sql2) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}

if (!empty($origin3Price))
{
  $sql3 = "INSERT INTO oceanfreight (oceanfreightShipper, oceanfreightSsco, oceanfreightOrigin, oceanfreightDestination, oceanfreightRate, oceanfreightUpdated) VALUES
  ('" . $shipper . "', '" . $ssco . "', '" . $origin3 . "', '" . $destination . "', " . $origin3Price . ", '" . $date . "')";
  if ($conn->query($sql3) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}
else
{
  $sql3 = "DELETE FROM oceanfreight
  WHERE oceanfreightSsco = '" . $ssco . "'
  AND oceanfreightShipper = '" . $shipper . "'
  AND oceanfreightDestination = '" . $destination . "'
  AND oceanfreightOrigin = '" . $origin3 . "'";
  if ($conn->query($sql3) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}

if (!empty($origin4Price))
{
  $sql4 = "INSERT INTO oceanfreight (oceanfreightShipper, oceanfreightSsco, oceanfreightOrigin, oceanfreightDestination, oceanfreightRate, oceanfreightUpdated) VALUES
  ('" . $shipper . "', '" . $ssco . "', '" . $origin4 . "', '" . $destination . "', " . $origin4Price . ", '" . $date . "')";
  if ($conn->query($sql4) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}
else
{
  $sql4 = "DELETE FROM oceanfreight
  WHERE oceanfreightSsco = '" . $ssco . "'
  AND oceanfreightShipper = '" . $shipper . "'
  AND oceanfreightDestination = '" . $destination . "'
  AND oceanfreightOrigin = '" . $origin4 . "'";
  if ($conn->query($sql4) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}

if (!empty($origin5Price))
{
  $sql3 = "INSERT INTO oceanfreight (oceanfreightShipper, oceanfreightSsco, oceanfreightOrigin, oceanfreightDestination, oceanfreightRate, oceanfreightUpdated) VALUES
  ('" . $shipper . "', '" . $ssco . "', '" . $origin5 . "', '" . $destination . "', " . $origin5Price . ", '" . $date . "')";
  if ($conn->query($sql5) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}
else
{
  $sql5 = "DELETE FROM oceanfreight
  WHERE oceanfreightSsco = '" . $ssco . "'
  AND oceanfreightShipper = '" . $shipper . "'
  AND oceanfreightDestination = '" . $destination . "'
  AND oceanfreightOrigin = '" . $origin5 . "'";
  if ($conn->query($sql5) === TRUE) {
  } else
  {
      echo "Error updating record: " . $conn->error;
      $err = true;
  }
}

if (!$err)
{
  echo "Rates updated successfully!";
}
?>
