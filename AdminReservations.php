<?php
 include 'header.php';

 //date_default_timezone_set('America/New_York');
	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	$data = "SELECT `ReservationDetailID`, `DateAdded`,`Name`, `Phone`, `Email`, `WeddingNum`, `RehearsalNum`, `BonfireNum`, `BrunchNum`, `GrandTotal`, `ReservationDate` FROM `ReservationDetails` order by DateAdded desc";
	$query = mysql_query($data);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Untitled Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
			
			
        });
</script>
<style type="text/css">
   
.sLabel {
  width:145px;
  display: inline-block;
}

	
	.bs-example{
    	margin-top:20px;
		
    }
	.container {
    width: 1370px !important;
}
	
	
</style>
</head>
<body>
<form id="form1" action="AdminSeasonPricing.php" method="post">
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<h2>Admin Reservations</h2>

 
 <table class="table table-striped">
 <tr>
 <th>Name</th><th>Date Added</th><th>Reservation Date</th><th>Phone</th><th>Email</th><th style="text-align:right">Grand Total</th><th style="text-align:right">Wedding</th><th style="text-align:right">Rehearsal</th><th style="text-align:right">Bonfire</th><th style="text-align:right">Brunch</th><th>Details</th>
 </tr>
 
<?
while($data2 = mysql_fetch_assoc($query))
{
?>
 <tr><td><?=$data2['Name']?></td> <td><?= substr($data2['DateAdded'], 0, 10)?></td><td><?=$data2['ReservationDate']?></td> <td><?=$data2['Phone']?></td> <td><?=$data2['Email']?></td> <td style="text-align:right"><?="$".number_format($data2['GrandTotal'])?></td> <td style="text-align:right"><?=$data2['WeddingNum']?></td><td style="text-align:right"><?=$data2['RehearsalNum']?></td><td style="text-align:right"><?=$data2['BonfireNum']?></td><td style="text-align:right"><?=$data2['BrunchNum']?></td><td><a href="ReservationDetail.php?ID=<?=$data2['ReservationDetailID']?>" class="Detail" id="<?=$data2['ReservationDetailID']?>">Details</a></td></tr>		
<?		
}
?>
 
 </table>
 
 
  <input type="hidden" id="ActionType" name="ActionType"/>
  <input type="hidden" id="DeleteID" name="DeleteID"/>

  <input type="hidden" id="ResDateValues" />
  <input type="hidden" id="ReservedDate" name="ReservedDate"/>
  <input type="hidden" id="ReservedType" name="ReservedType"/>
	
  </div>
  </form>
</body>
</html>
