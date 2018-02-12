<?php

include "../db.php";

$shipper = $_POST['shipper'];
$ssco = $_POST['ssco'];
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Upload Contract</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
</head>
 <body style="text-align: center;">
   <div class="card">
     <div class="card-header">
       <h4 class="card-title">Upload Contract</h4>
     </div>
     <div class="card-body">
<?php
$target_dir = "../../contract/" . $shipper . "/" . $ssco . "/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $sql = 'UPDATE contract SET contractFile = "' . basename($_FILES["fileToUpload"]["name"]) . '" WHERE contractShipper = "' . $shipper . '" AND contractSsco = "' . $ssco . '"';
      if ($conn->query($sql) === TRUE)
      {
        echo "Contract updated!";
      }
      else
      {
        echo "Error updating record: " . $conn->error;
      }
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
     </div>
   </div>
 </body>
</html>
