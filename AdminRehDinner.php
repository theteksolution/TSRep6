<?php
    include 'header.php';
	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	
	

if(empty($_GET)) {
    //No variables are specified in the URL.
    //Do stuff accordingly
    	$data = "select * from DinnerDescription where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1'";
		$dataCat1 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '1'";
		$dataCat2 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '2'";
		$dataCat3 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '3'";
		$dataCat4 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '4'";
		$dataCat5 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '5'";
		$dataCat6 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '6'";
		$dataCat7 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '7'";
		$dataCat8 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '8'";
		$dataCat9 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '9'";
		$dataCat10 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '10'";
		$dataCat11 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '11'";
		$dataCat12 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '12'";
		$dataCat13 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '13'";
		$dataCat14 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '14'";
		$dataCat15 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = 'Dinner 1' and CategoryNumber = '15'";
		$DinnerUpdated = "";
		$DinnerSelect = "Wedding - Dinner 1";
		
} else {
    //Variables are present. Do stuff:
    //print_r($_GET);
	
	$DinnerType = $_GET["typ"];
	$DinnerNumber = $_GET["num"];
	
	if (isset($_GET["Update"]) && !empty($_GET["Update"])) {
		$DinnerUpdated = $_GET['Update'];
	}
	else
	{
		$DinnerUpdated = "";
	}
	
	$DinnerSelect = $DinnerType." - ".$DinnerNumber;
	
	$data = "select * from DinnerDescription where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'";
	$dataCat1 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '1'";
	$dataCat2 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '2'";
	$dataCat3 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '3'";
	$dataCat4 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '4'";
	$dataCat5 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '5'";
	$dataCat6 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '6'";
	$dataCat7 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '7'";
	$dataCat8 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '8'";
	$dataCat9 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '9'";
	$dataCat10 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '10'";
	$dataCat11 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '11'";
	$dataCat12 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '12'";
	$dataCat13 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '13'";
	$dataCat14 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '14'";
	$dataCat15 = "select * from DinnerDetail where DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '15'";
	
}

	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
	$queryCat1 = mysql_query($dataCat1);
	$queryCat2 = mysql_query($dataCat2);
	$queryCat3 = mysql_query($dataCat3);
	$queryCat4 = mysql_query($dataCat4);
	$queryCat5 = mysql_query($dataCat5);
	$queryCat6 = mysql_query($dataCat6);
	$queryCat7 = mysql_query($dataCat7);
	$queryCat8 = mysql_query($dataCat8);
		
	$rdataCatArr = array(8);
	
    $data2 = mysql_fetch_array($query);
	$rdataCatArr[0] = mysql_fetch_array($queryCat1);
	$rdataCatArr[1] = mysql_fetch_array($queryCat2);
	$rdataCatArr[2] = mysql_fetch_array($queryCat3);
	$rdataCatArr[3] = mysql_fetch_array($queryCat4);
	$rdataCatArr[4] = mysql_fetch_array($queryCat5);
	$rdataCatArr[5] = mysql_fetch_array($queryCat6);
	$rdataCatArr[6] = mysql_fetch_array($queryCat7);
	$rdataCatArr[7] = mysql_fetch_array($queryCat8);
	
	
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
           
		    function ShowMessage(message) {
               $("#userMessage").html(message);
               $("#messageDiv").show();

               $("#messageDiv").fadeTo(2000, 500).slideUp(500, function () {
                   $("#messageDiv").hide();
               });
           }
	
			$( "#DinnerType" ).change(function() {
				var str = $("#DinnerType").val();
				var res = str.split("-");
			
				window.location.href = "AdminRehDinner.php?typ=" + $.trim(res[0]) + "&num=" + $.trim(res[1]);
			});
			
			
			function CheckIfPostBackUpdate()
			{
				if ($("#UpdateShowMessage").val() == "YES")
				{
					$("#UpdateShowMessage").val('');
					ShowMessage("The Dinner has been updated."); 
				}
				
			}
			
			CheckIfPostBackUpdate();
			
        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
</style>
</head>
<body>
<form id="form1" action="UpdateAdmin.php" method="post">
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<div class="row">
<div class="col-md-12">
<fieldset  class="form-group">
<label for="DinnerType">Select Dinner Type:</label>
  <select class="form-control" id="DinnerType" name="DinnerType">
    <option value="Rehearsal - Dinner 1"<?= $DinnerSelect == 'Rehearsal - Dinner 1' ? ' selected="selected"' : '';?>>Rehearsal - Dinner 1</option>
	<option value="Rehearsal - Dinner 2"<?= $DinnerSelect == 'Rehearsal - Dinner 2' ? ' selected="selected"' : '';?>>Rehearsal - Dinner 2</option>
	<option value="Rehearsal - Dinner 3"<?= $DinnerSelect == 'Rehearsal - Dinner 3' ? ' selected="selected"' : '';?>>Rehearsal - Dinner 3</option>
	<option value="Wedding - Dinner 1"<?= $DinnerSelect == 'Wedding - Dinner 1' ? ' selected="selected"' : '';?>>Wedding - Dinner 1</option>
	<option value="Wedding - Dinner 2"<?= $DinnerSelect == 'Wedding - Dinner 2' ? ' selected="selected"' : '';?>>Wedding - Dinner 2</option>
	<option value="Wedding - Dinner 3"<?= $DinnerSelect == 'Wedding - Dinner 3' ? ' selected="selected"' : '';?>>Wedding - Dinner 3</option>
  </select>
</fieldset>
  </div>

  </div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
  <li><a data-toggle="tab" href="#item1">Category 1</a></li>
  <li><a data-toggle="tab" href="#item2">Category 2</a></li>
  <li><a data-toggle="tab" href="#item3">Category 3</a></li>
  <li><a data-toggle="tab" href="#item4">Category 4</a></li>
  <li><a data-toggle="tab" href="#item5">Category 5</a></li>
  <li><a data-toggle="tab" href="#item6">Category 6</a></li>
  <li><a data-toggle="tab" href="#item7">Category 7</a></li>
  <li><a data-toggle="tab" href="#item8">Category 8</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Description</h3>
<div class="checkbox">
  <label><input id="EnableDinner" name="EnableDinner" type="checkbox" <?= $data2['Enabled']=='on' ? "checked='checked'" : '';?>/>Enable Dinner</label>
</div>
 <fieldset class="form-group">
    <label for="firstName">Title</label>
    <input type="text" class="form-control" id="DinnerTitle" name="DinnerTitle" value="<?= $data2['Title']?>" />
  </fieldset>
<fieldset class="form-group">
    <label for="firstName">Description</label>
    <input type="text" class="form-control" id="DinnerDescription" name="DinnerDescription" value="<?= $data2['Description']?>" />
  </fieldset>
<fieldset class="form-group">
    <label for="firstName">Price</label>
    <input type="text" class="form-control" id="DinnerPrice" name="DinnerPrice" value="<?= $data2['Price']?>"  />
  </fieldset>
  </div>
  <div id="item1" class="tab-pane fade">
   <br /> <br /> 
  <div class="row">
  
  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat1Title" name="Cat1Title" value="<?= $rdataCatArr[0]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat1ReqNum" name="Cat1ReqNum" value="<?= $rdataCatArr[0]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat1ReqPPX" name="Cat1ReqPPX" value="<?= $rdataCatArr[0]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat1Item<?=$z?>" name="Cat1Item<?=$z?>" value="<?= $rdataCatArr[0]['MenuItem'.$z]?>" /></td><td> <input id="Cat1ItemP<?=$z?>" name="Cat1ItemP<?=$z?>" value="<?= $rdataCatArr[0]['Item'.$z.'Price']?>" type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat1Item<?=$z + 1?>" name="Cat1Item<?=$z + 1?>" value="<?=$rdataCatArr[0]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat1ItemP<?=$z + 1?>" name="Cat1ItemP<?=$z + 1?>" value="<?= $rdataCatArr[0]['Item'.($z + 1).'Price']?>" type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat1Item<?=$z + 2?>" name="Cat1Item<?=$z + 2?>" value="<?= $rdataCatArr[0]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat1ItemP<?=$z + 2?>" name="Cat1ItemP<?=$z + 2?>" value="<?= $rdataCatArr[0]['Item'.($z + 2).'Price']?>" type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>

  </div>
  <div id="item2" class="tab-pane fade">
    <br /><br />
   
  <div class="row">
  
  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat2Title" name="Cat2Title" value="<?= $rdataCatArr[1]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat2ReqNum" name="Cat2ReqNum" value="<?= $rdataCatArr[1]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat2ReqPPX" name="Cat2ReqPPX" value="<?= $rdataCatArr[1]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat2Item<?=$z?>" name="Cat2Item<?=$z?>" value="<?= $rdataCatArr[1]['MenuItem'.$z]?>" /></td><td> <input id="Cat2ItemP<?=$z?>" name="Cat2ItemP<?=$z?>" value="<?= $rdataCatArr[1]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat2Item<?=$z + 1?>" name="Cat2Item<?=$z + 1?>" value="<?=$rdataCatArr[1]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat2ItemP<?=$z + 1?>" name="Cat2ItemP<?=$z + 1?>" value="<?= $rdataCatArr[1]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat2Item<?=$z + 2?>" name="Cat2Item<?=$z + 2?>" value="<?= $rdataCatArr[1]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat2ItemP<?=$z + 2?>" name="Cat2ItemP<?=$z + 2?>" value="<?= $rdataCatArr[1]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>

  <div id="item3" class="tab-pane fade">
   <br /><br />
    <div class="row">

  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat3Title" name="Cat3Title" value="<?= $rdataCatArr[2]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat3ReqNum" name="Cat3ReqNum" value="<?= $rdataCatArr[2]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat3ReqPPX" name="Cat3ReqPPX" value="<?= $rdataCatArr[2]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat3Item<?=$z?>" name="Cat3Item<?=$z?>" value="<?= $rdataCatArr[2]['MenuItem'.$z]?>" /></td><td> <input id="Cat3ItemP<?=$z?>" name="Cat3ItemP<?=$z?>" value="<?= $rdataCatArr[2]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat3Item<?=$z + 1?>" name="Cat3Item<?=$z + 1?>" value="<?=$rdataCatArr[2]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat3ItemP<?=$z + 1?>" name="Cat3ItemP<?=$z + 1?>" value="<?= $rdataCatArr[2]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat3Item<?=$z + 2?>" name="Cat3Item<?=$z + 2?>" value="<?= $rdataCatArr[2]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat3ItemP<?=$z + 2?>" name="Cat3ItemP<?=$z + 2?>" value="<?= $rdataCatArr[2]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>
  <div id="item4" class="tab-pane fade">
   <br /><br />
  <div class="row">

  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat4Title" name="Cat4Title" value="<?= $rdataCatArr[3]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat4ReqNum" name="Cat4ReqNum" value="<?= $rdataCatArr[3]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat4ReqPPX" name="Cat4ReqPPX" value="<?= $rdataCatArr[3]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat4Item<?=$z?>" name="Cat4Item<?=$z?>" value="<?= $rdataCatArr[3]['MenuItem'.$z]?>" /></td><td> <input id="Cat4ItemP<?=$z?>" name="Cat4ItemP<?=$z?>" value="<?= $rdataCatArr[3]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat4Item<?=$z + 1?>" name="Cat4Item<?=$z + 1?>" value="<?=$rdataCatArr[3]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat4ItemP<?=$z + 1?>" name="Cat4ItemP<?=$z + 1?>" value="<?= $rdataCatArr[3]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat4Item<?=$z + 2?>" name="Cat4Item<?=$z + 2?>" value="<?= $rdataCatArr[3]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat4ItemP<?=$z + 2?>" name="Cat4ItemP<?=$z + 2?>" value="<?= $rdataCatArr[3]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>
  <div id="item5" class="tab-pane fade">
   <br /><br />
  <div class="row">

  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat5Title" name="Cat5Title" value="<?= $rdataCatArr[4]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat5ReqNum" name="Cat5ReqNum" value="<?= $rdataCatArr[4]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat5ReqPPX" name="Cat5ReqPPX" value="<?= $rdataCatArr[4]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat5Item<?=$z?>" name="Cat5Item<?=$z?>" value="<?= $rdataCatArr[4]['MenuItem'.$z]?>" /></td><td> <input id="Cat5ItemP<?=$z?>" name="Cat5ItemP<?=$z?>" value="<?= $rdataCatArr[4]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat5Item<?=$z + 1?>" name="Cat5Item<?=$z + 1?>" value="<?=$rdataCatArr[4]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat5ItemP<?=$z + 1?>" name="Cat5ItemP<?=$z + 1?>" value="<?= $rdataCatArr[4]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat5Item<?=$z + 2?>" name="Cat5Item<?=$z + 2?>" value="<?= $rdataCatArr[4]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat5ItemP<?=$z + 2?>" name="Cat5ItemP<?=$z + 2?>" value="<?= $rdataCatArr[4]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>
  <div id="item6" class="tab-pane fade">
   <br /><br />
   <div class="row">

  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat6Title" name="Cat6Title" value="<?= $rdataCatArr[5]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat6ReqNum" name="Cat6ReqNum" value="<?= $rdataCatArr[5]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat6ReqPPX" name="Cat6ReqPPX" value="<?= $rdataCatArr[5]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat6Item<?=$z?>" name="Cat6Item<?=$z?>" value="<?= $rdataCatArr[5]['MenuItem'.$z]?>" /></td><td> <input id="Cat6ItemP<?=$z?>" name="Cat6ItemP<?=$z?>" value="<?= $rdataCatArr[5]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat6Item<?=$z + 1?>" name="Cat6Item<?=$z + 1?>" value="<?=$rdataCatArr[5]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat6ItemP<?=$z + 1?>" name="Cat6ItemP<?=$z + 1?>" value="<?= $rdataCatArr[5]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat6Item<?=$z + 2?>" name="Cat6Item<?=$z + 2?>" value="<?= $rdataCatArr[5]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat6ItemP<?=$z + 2?>" name="Cat6ItemP<?=$z + 2?>" value="<?= $rdataCatArr[5]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>
  <div id="item7" class="tab-pane fade">
    <br /><br />
  <div class="row">
  
  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat7Title" name="Cat7Title" value="<?= $rdataCatArr[6]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat7ReqNum" name="Cat7ReqNum" value="<?= $rdataCatArr[6]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat7ReqPPX" name="Cat7ReqPPX" value="<?= $rdataCatArr[6]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat7Item<?=$z?>" name="Cat7Item<?=$z?>" value="<?= $rdataCatArr[6]['MenuItem'.$z]?>" /></td><td> <input id="Cat7ItemP<?=$z?>" name="Cat7ItemP<?=$z?>" value="<?= $rdataCatArr[6]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat7Item<?=$z + 1?>" name="Cat7Item<?=$z + 1?>" value="<?=$rdataCatArr[6]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat7ItemP<?=$z + 1?>" name="Cat7ItemP<?=$z + 1?>" value="<?= $rdataCatArr[6]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat7Item<?=$z + 2?>" name="Cat7Item<?=$z + 2?>" value="<?= $rdataCatArr[6]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat7ItemP<?=$z + 2?>" name="Cat7ItemP<?=$z + 2?>" value="<?= $rdataCatArr[6]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
  </div>
  <div id="item8" class="tab-pane fade">
   <br /><br />
   <div class="row">

  <!-- Start Tab contents -->
  <div class="col-md-8">
  <fieldset class="form-group">
    <label for="firstName">Menu Title</label>
    <input type="text" class="form-control" id="Cat8Title" name="Cat8Title" value="<?= $rdataCatArr[7]['Title']?>"  />
  </fieldset>
  </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Required Number</label>
    <input type="text" class="form-control" id="Cat8ReqNum" name="Cat8ReqNum" value="<?= $rdataCatArr[7]['RequiredNumber']?>"  />
  </fieldset>
   </div>
  <div class="col-md-2">
   <fieldset class="form-group">
    <label for="firstName">Price Per Extra</label>
    <input type="text" class="form-control" id="Cat8ReqPPX" name="Cat8ReqPPX" value="<?= $rdataCatArr[7]['PricePerExtra']?>"  />
  </fieldset>
   </div>
 <table style="width:100%;border-spacing: 10px;">
 <? 
 $z = 1;
 for ($x = 1; $x < 6; $x++) {
 ?>
 <tr>
  <td style="text-align:right"><?=$z?>.&nbsp;</td><td><input class="form-control" type="text" id="Cat8Item<?=$z?>" name="Cat8Item<?=$z?>" value="<?= $rdataCatArr[7]['MenuItem'.$z]?>" /></td><td> <input id="Cat8ItemP<?=$z?>" name="Cat8ItemP<?=$z?>" value="<?= $rdataCatArr[7]['Item'.$z.'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px" /></td>
  <td style="text-align:right"><?=$z + 1?>.&nbsp; </td><td><input type="text" class="form-control" id="Cat8Item<?=$z + 1?>" name="Cat8Item<?=$z + 1?>" value="<?=$rdataCatArr[7]['MenuItem'.($z + 1)]?>"/> </td> <td><input id="Cat8ItemP<?=$z + 1?>" name="Cat8ItemP<?=$z + 1?>" value="<?= $rdataCatArr[7]['Item'.($z + 1).'Price']?>"  type="text" class="form-control" maxlength="3" style="width:60px" /></td> 
  <td style="text-align:right"><?=$z + 2?>.&nbsp;</td><td><input type="text" class="form-control" id="Cat8Item<?=$z + 2?>" name="Cat8Item<?=$z + 2?>" value="<?= $rdataCatArr[7]['MenuItem'.($z + 2)]?>"/> </td> <td><input id="Cat8ItemP<?=$z + 2?>" name="Cat8ItemP<?=$z + 2?>" value="<?= $rdataCatArr[7]['Item'.($z + 2).'Price']?>"  type="text" class="form-control"  maxlength="3" style="width:60px"/></td>
 </tr>
<?  
	$z = $z + 3;
}
?>  
  </table>
 
 <!-- End Tab contents -->
  </div>
</div>
</div>
<br />
<div>
<div style="width:20%;float:left;"><input type="submit"  class="btn btn-primary" value="Save Dinner" /></div>
<div id="messageDiv" class="alert alert-success" style="width:80%;display:none;float:right;"><strong>Success!</strong> <span id="userMessage">Dinner Saved.</span></div>
</div>



<input type="hidden" <?= $DinnerUpdated == 'ok' ? ' value="YES" ' : 'value=" "';?> id="UpdateShowMessage" />
<input type="hidden" value="Dinner" name="formName" />
<!--<a id="btnSave" class="btn btn-primary">Save Dinner</a>--><br /><br />
</div>
</form>
</body>
</html>
