<?php
$pageName = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?= $pageName == 'AdminRehDinner.php' ? ' class="active"' : '';?>><a href="AdminRehDinner.php">Dinners</a></li>
      <li <?= $pageName == 'AdminBrunch.php' ? ' class="active"' : '';?>><a href="AdminBrunch.php">Brunch</a></li>
      <li <?= $pageName == 'AdminBonfire.php' ? ' class="active"' : '';?>><a href="AdminBonfire.php">Bonfire</a></li> 
      <li <?= $pageName == 'AdminReservations.php' ? ' class="active"' : '';?>><a href="AdminReservations.php">Reservation Requests</a></li> 
	  <li <?= $pageName == 'AdminSeasonPricing.php' ? ' class="active"' : '';?>><a href="AdminSeasonPricing.php">Season Pricing</a></li> 
	  <li <?= $pageName == 'AdminReserveDate.php' ? ' class="active"' : '';?>><a href="AdminReserveDate.php">Reserve Date</a></li> 
	  <li <?= $pageName == 'AdminBar.php' ? ' class="active"' : '';?>><a href="AdminBar.php">Bar Prices</a></li> 
	  <li <?= $pageName == 'AdminLogin.php' ? ' class="active"' : '';?>><a href="AdminLogin.php">Logout</a></li> 
    </ul>
  </div>
</nav>