<div class="fixed-top bg-primary text-white">
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="<?php echo $image; ?>logo.jpg" style="width: 25px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php" id="homeLink">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=viewRates" id="viewRatesLink">View Rates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=editRates" id="editRatesLink">Edit Rates</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="adminLink">Administration</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=shippers&active=admin">Shippers</a>
            <a class="dropdown-item" href="index.php?page=origins&active=admin">Origins</a>
            <a class="dropdown-item" href="index.php?page=destinations&active=admin">Destinations</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>
