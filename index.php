<?php include ("php.php"); ?>
<?php include ($frame . "head.php"); ?>
<script>document.write('<script src="<?php echo $script; ?>lfi-rateMatrix.js?dev=' + Math.floor(Math.random() * 100) + '"\><\/script>');</script>
<body>
  <?php include ($frame . "nav.php"); ?>
  <div class="mx-3" id="mainContent">
    <?php
    if (isset($_GET['page']))
    {
      if(isset($_GET['active']))
      {
        echo '<script>document.getElementById("' . $_GET["active"] . 'Link").className += " active";</script>';
      }
      else {
        echo '<script>document.getElementById("' . $_GET["page"] . 'Link").className += " active";</script>';
      }
      include ($page . $_GET['page'] . ".php");
    }
    else
    {
      echo '<script>document.getElementById("homeLink").className += " active";</script>';
      include ($page . "home.php");
    }
    ?>
  </div>
<?php include ($frame . "modal.php"); ?>
</body>
<?php include ($frame . "footer.php"); ?>
