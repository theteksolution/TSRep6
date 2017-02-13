<?php
 include 'header.php';


$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	if(!empty($_POST)) {
		
		$ActionType = $_POST["ActionType"];
		
		if ($ActionType == "Delete")
		{
			// Get ID to delete
			$DeleteID = $_POST["DeleteID"];
			
			mysql_query("DELETE from SeasonPricing where SeasonPricingID = '$DeleteID'") 
			or die(mysql_error()); 	
		}
		else
		{
			// Get Dates, etc, to add
			
			$StartDate = $_POST["StartDate"];
			$EndDate = $_POST["EndDate"];
			$WedFee = $_POST["WedFee"];
			$RehFee = $_POST["RehFee"];
			$BonFee = $_POST["BonFee"];
			$SeasonName =  $_POST["SeasonName"];
			
			mysql_query("INSERT INTO `SeasonPricing`(`WeddingFee`, `RehearsalFee`, `BonfireFee`, `StartDate`, `EndDate`, `SeasonName`) VALUES ('$WedFee','$RehFee','$BonFee', STR_TO_DATE('$StartDate', '%m/%d/%Y'),STR_TO_DATE('$EndDate', '%m/%d/%Y'),'$SeasonName ' ) ") 
			or die(mysql_error()); 
		}
		
			
	}
	
	$data = "select * from SeasonPricing order by StartDate desc";
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
			
			$("#StartDate").datepicker({});
			$("#EndDate").datepicker({});
			
			$("#SetFee").click(function() {
				$("#ActionType").val('SetFee');
				$( "#form1" ).submit();
			});
			
			$(".DeleteLink").click(function() {
				if(confirm("Delete this?"))
				{
					$("#ActionType").val("Delete");
					$("#DeleteID").val($(this).attr('id'));
					$( "#form1" ).submit();
				}
			});
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
	
	.ui-datepicker-unselectable span.ui-state-default {
		background:#999999 !important;
		border-color:#999999 !important;
		font-weight: bold;
	}

	.ui-datepicker-unselectable span.ui-state-default {
		background: #006400 !important;
		border-color: #006400 !important;
		color: #FFFFFF !important;
		font-weight: bold;
	}
	
</style>
</head>
<body>
<form id="form1" action="AdminSeasonPricing.php" method="post">
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<h2>Admin Season Pricing</h2>
 
 Season Name:&nbsp;
<select id="SeasonName" name="SeasonName">
  <option value="Horse Show">Horse Show</option>
  <option value="Summer">Summer</option>
  <option value="MidWeek Summer">MidWeek Summer</option>
  <option value="Peak">Peak</option>
   <option value="Off Season">Off Season</option>
</select> 
 <br /><br />
 Start Date: <input type="text" id="StartDate" name="StartDate"  />&nbsp;&nbsp;&nbsp;&nbsp; End Date: <input type="text" id="EndDate" name="EndDate"  /><br /><br />
 
 <span class="sLabel">Wedding Rental Fee:</span>&nbsp;<input type="text" id="WedFee" name="WedFee"/><br />
 <span class="sLabel">Rehearsal Rental Fee:</span>&nbsp;<input type="text" id="RehFee" name="RehFee"/><br />
 <span class="sLabel">Bonfire Rental Fee:</span>&nbsp;<input type="text" id="BonFee" name="BonFee"/><br /><br />
   <input type="button"  class="btn btn-primary" id="SetFee" value="Set Date and Fee"/>
 <br />
 <hr />
 
 <table  class="table table-striped">
 <tr>
 <th>Season Name</th><th>Start Date</th><th>End Date</th><th style="text-align:right">Wedding Fee</th><th style="text-align:right">Rehearsal Fee</th><th style="text-align:right">Bonfire Fee</th><th>&nbsp;</th>
 </tr>
 
<?
while($data2 = mysql_fetch_assoc($query))
{
?>
 <tr><td><?=$data2['SeasonName']?></td> <td><?=$data2['StartDate']?></td> <td><?=$data2['EndDate']?></td> <td style="text-align:right"><?="$".number_format($data2['WeddingFee'])?></td> <td style="text-align:right"><?="$".number_format($data2['RehearsalFee'])?></td> <td style="text-align:right"><?="$".number_format($data2['BonfireFee'])?></td><td><a href="#" class="DeleteLink" id="<?=$data2['SeasonPricingID']?>">Delete</a></td></tr>		
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
