<?php
include "../../php.php";
$shipper = $_GET['shipper'];
$ssco = $_GET['ssco'];
 ?>
 <!DOCTYPE html>
 <html>
  <head>
   <title>Upload Contract</title>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
   <script>
     this.resizeTo(500, 300);
   </script>
 </head>
  <body style="text-align: center;">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Upload Contract</h4>
      </div>
      <div class="card-body">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          Select file to upload:
          <div>
            <label class="btn btn-primary btn-sm">
              Browse
              <input type="file" name="fileToUpload" id="fileToUpload" hidden onchange="$('#uploadFileName').html(this.files[0].name)">
            </label>
            <span class="label label-info" id="uploadFileName"></span><br />
            <input type="hidden" name="shipper" value="<?php echo $shipper; ?>">
            <input type="hidden" name="ssco" value="<?php echo $ssco; ?>">
            <input type="submit" class="btn btn-dark" value="Upload Contract" name="submit">
          </div>
        </form>
      </div>
    </div>
  </body>
  <script>
  window.nodeRequire = require;
  delete window.require;
  delete window.exports;
  delete window.module;
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</html>
