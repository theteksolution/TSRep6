<?php
 include 'header.php';

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	$BarType = "Wedding";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	if(!empty($_POST)) {
			// Get Dates, etc, to add
			
			$BarType = $_POST["BarType"];
			$DeluxeBeer = $_POST["DBeerPrice"];
			$DeluxeWine = $_POST["DWinePrice"];
			$DeluxeCocktail = $_POST["DCocktailPrice"];
			$DeluxeChampagne = $_POST["DChampagnePrice"];
			$GrandBeer = $_POST["GBeerPrice"];
			$GrandWine = $_POST["GWinePrice"];
			$GrandCocktail = $_POST["GCocktailPrice"];
			$GrandChampagne = $_POST["GChampagnePrice"];
			$SetUpFee = $_POST["SetUpFee"];
			$Factor =  $_POST["Factor"];
			
			mysql_query("UPDATE `BarPrices` set GrandBeer = '$GrandBeer', GrandWine = '$GrandWine', GrandCocktail = '$GrandCocktail', GrandChampagne = '$GrandChampagne', 
			DeluxeBeer = '$DeluxeBeer', DeluxeWine = '$DeluxeWine', DeluxeCocktail = '$DeluxeCocktail', DeluxeChampagne = '$DeluxeChampagne',Factor = '$Factor',SetBarFee = '$SetUpFee' where BarType = '$BarType'") 
			or die(mysql_error()); 
			
	}
	
	if (!empty ($_GET))
	{
		$BarType = $_GET["type"];
	}
	
	$data = "select * from BarPrices Where BarType = '$BarType'";
	$query = mysql_query($data);
	$data2 = mysql_fetch_array($query);
	//echo "here";
	//print_r($data2);
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
			
			$("#SetFee").click(function() {
				$( "#form1" ).submit();
			});
			
			$("#BarType").change(function() {
				var str = $("#BarType").val();
				window.location.href = "AdminBar.php?type=" + $.trim(str);
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
<form id="form1" action="AdminBar.php" method="post">
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<h2>Bar Prices</h2>
 
 Bar Name:&nbsp;
<select id="BarType" name="BarType">
  <option value="Wedding"<?= $BarType == 'Wedding' ? ' selected="selected"' : '';?>>Wedding Bar</option>
  <option value="Rehearsal"<?= $BarType == 'Rehearsal' ? ' selected="selected"' : '';?>>Rehearsal Bar</option>
  <option value="Bonfire"<?= $BarType == 'Bonfire' ? ' selected="selected"' : '';?>>Bonfire Bar</option>
</select> 
 <br /><br />
 
 <span class="sLabel">Grand Beer:</span>&nbsp;<input type="number" id="GBeerPrice" name="GBeerPrice" value="<?=$data2['GrandBeer']?>"/><br />
 <span class="sLabel">Grand Wine:</span>&nbsp;<input type="number" id="GWinePrice" name="GWinePrice" value="<?=$data2['GrandWine']?>"/><br />
 <span class="sLabel">Grand Cocktail:</span>&nbsp;<input type="number" id="GCocktailPrice" name="GCocktailPrice" value="<?=$data2['GrandCocktail']?>"/><br />
 <span class="sLabel">Grand Champagne:</span>&nbsp;<input type="number" id="GChampagnePrice" name="GChampagnePrice" value="<?=$data2['GrandChampagne']?>"/><br />
 <span class="sLabel">Deluxe Beer:</span>&nbsp;<input type="number" id="DBeerPrice" name="DBeerPrice" value="<?=$data2['DeluxeBeer']?>"/><br />
 <span class="sLabel">Deluxe Wine:</span>&nbsp;<input type="number" id="DWinePrice" name="DWinePrice" value="<?=$data2['DeluxeWine']?>"/><br />
 <span class="sLabel">Deluxe Cocktail:</span>&nbsp;<input type="number" id="DCocktailPrice" name="DCocktailPrice" value="<?=$data2['DeluxeCocktail']?>"/><br />
 <span class="sLabel">Deluxe Champagne:</span>&nbsp;<input type="number" id="DChampagnePrice" name="DChampagnePrice" value="<?=$data2['DeluxeChampagne']?>"/><br />
 <span class="sLabel">Set Up Fee:</span>&nbsp;<input type="number" id="SetUpFee" name="SetUpFee" value="<?=$data2['SetBarFee']?>"/><br />
 <span class="sLabel">Factor:</span>&nbsp;<input type="number" step="any" id="Factor" name="Factor" value="<?=$data2['Factor']?>"/><br /><br />
   <input type="button"  class="btn btn-primary" id="SetFee" value="Set Bar Price"/>
 <br />
 
 

 
 
  <input type="hidden" id="ActionType" name="ActionType"/>
  <input type="hidden" id="DeleteID" name="DeleteID"/>

  <input type="hidden" id="ResDateValues" />
  <input type="hidden" id="ReservedDate" name="ReservedDate"/>
  <input type="hidden" id="ReservedType" name="ReservedType"/>
	
  </div>
  </form>
</body>
</html>
