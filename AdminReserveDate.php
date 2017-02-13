<?php
 include 'header.php';

$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	if(!empty($_POST)) {
		
		
		$ReservedDate = $_POST["ReservedDate"];
		$ReservedType = $_POST["ReservedType"];
	    
		if ($ReservedType == "Set")
		{
			mysql_query("INSERT INTO `ReservedDates` (ReservedDate) VALUES (STR_TO_DATE('$ReservedDate', '%m/%d/%Y')) ") 
			or die(mysql_error()); 
		}
		else
		{
			mysql_query("DELETE from ReservedDates where ReservedDate = STR_TO_DATE('$ReservedDate', '%m/%d/%Y') ") 
			or die(mysql_error()); 	
		}
		
	}
	
	$data = "select ReservedDate from ReservedDates";
	$query = mysql_query($data);
	//$data2 = mysql_fetch_array($query);
	
	$ResDateValues = "";
	
	while($data2 = mysql_fetch_assoc($query))
	{
		$ResDateValues = $ResDateValues.$data2['ReservedDate'].",";
		//echo $ResDateValues."<br />";
	}
	
	// Load stuff
	
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
			
			//var array = ["2016-07-14","2016-07-15","2016-07-16"];
			
			var array = $("#ResDateValues").val().split(",");
			console.log($("#ResDateValues").val());
			
			$("#calendar").datepicker({
				numberOfMonths:[2,3],
				beforeShowDay: function(date){
					var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
						return [ array.indexOf(string) == -1 ]
				}			
			});
			
			$("#resDate").datepicker({});
			
			$("#setDate").click(function() {
				$("#ReservedDate").val($("#resDate").val());
				$("#ReservedType").val("Set");
				$( "#form1" ).submit();
			});
			
			$("#clearDate").click(function() {
				$("#ReservedDate").val($("#resDate").val());
				$("#ReservedType").val("Delete");
				$( "#form1" ).submit();
			});
        });
</script>
<style type="text/css">
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
<form id="form1" action="AdminReserveDate.php" method="post">
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<h2>Admin Reserve Date</h2>
 <div id="calendar"></div>
 <br /><br />
 <input type="text" id="resDate" name="resDate"  />

  <input type="button"  class="btn btn-primary" id="setDate" value="Set Date"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button"  class="btn btn-primary" id="clearDate" value="Clear Date" />
  <input type="hidden" id="ResDateValues" value="<?= $ResDateValues ?>"/>
  <input type="hidden" id="ReservedDate" name="ReservedDate"/>
  <input type="hidden" id="ReservedType" name="ReservedType"/>
	
  </div>
  </form>
</body>
</html>
