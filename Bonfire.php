<?php
session_start(); 
	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	$data = "select * from DinnerDescription where DinnerType = 'Bonfire'";
	
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
	$data2 = mysql_fetch_array($query);
	
	$dataCat1 = "select * from DinnerDetail where DinnerType = 'Bonfire' and DinnerNumber = 'Dinner 1'";
	$query2 = mysql_query($dataCat1);
	
	
	$dataBar = "select * from BarPrices Where BarType = 'Bonfire'";
	$queryBar = mysql_query($dataBar);
	$data2Bar = mysql_fetch_array($queryBar);
	
	$oneBefore = false;
	$BarLabelStr = "";
	$BarUnitPrice = 0;
	
	if ($data2Bar['DeluxeBeer'] != 0)
	{
		$BarLabelStr = "Beer @ ".$data2Bar['DeluxeBeer'];
		$oneBefore = true;
		$BarUnitPrice = $data2Bar['DeluxeBeer'];
	}
	if ($data2Bar['DeluxeWine'] != 0)
	{
		if($oneBefore)
		{
			$BarLabelStr = $BarLabelStr." - ";
		}
		$BarLabelStr = $BarLabelStr."Wine @ ".$data2Bar['DeluxeWine'];
		$oneBefore = true;
		$BarUnitPrice = $BarUnitPrice + $data2Bar['DeluxeWine'];
	}
	if ($data2Bar['DeluxeCocktail'] != 0)
	{
		if($oneBefore)
		{
			$BarLabelStr = $BarLabelStr." - ";
		}
		$BarLabelStr = $BarLabelStr."Cocktail @ ".$data2Bar['DeluxeCocktail'];
		$oneBefore = true;
		$BarUnitPrice = $BarUnitPrice + $data2Bar['DeluxeCocktail'];
	}
	
	if ($data2Bar['DeluxeChampagne'] != 0)
	{
		if($oneBefore)
		{
			$BarLabelStr = $BarLabelStr." - ";
		}
		$BarLabelStr = $BarLabelStr."Champagne @ ".$data2Bar['DeluxeChampagne'];
		$BarUnitPrice = $BarUnitPrice + $data2Bar['DeluxeChampagne'];
		
	}
	
	if($data2Bar['Factor'] > 0)
	{
		$BarUnitPrice = $BarUnitPrice * $data2Bar['Factor'];
	
	}
	//echo 'barprice'.$BarUnitPrice;
	
	$numPeople = "";
	if (isset($_SESSION['Bonfire']))
	{
		$a = $_SESSION['Bonfire'];
		$numPeople = $a['NumPeople'];
	}
	
	function SetSelected($item)
	{
		if (isset($_SESSION["Bonfire"]))
		{
			$a = $_SESSION['Bonfire'];
	
			if(strpos($a["hMenuSelections"],$item) !== false)
			{
				return "Y";
			}
			else
			{
				return "N";
			}
		}
		else
		{		
			return "N";
		}
	}
	
	function SetSelectedC($item)
	{
	//$a = $_SESSION['RehearsalDinner'];
	
	if (isset($_SESSION["Bonfire"]))
		{
			$a = $_SESSION['Bonfire'];
	
			if(strpos($a["hBarTitle"],$item) !== false)
			{
				return "Y";
			}
			else
			{
				return "N";
			}
		}
		else
		{		
			return "N";
		}
	
	}
	
	$updateSummary = "";

	if (isset($_SESSION['Bonfire']))
	{
	
		$updateSummary = "updateSummary";
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Bonfire Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {

            $("#btnSub").click(function () {
                //validate here

                if (ValidateDinner() == true) {
                    
					var category = "Bonfire^";
					
					$(".Dinner1Category1MenuItems").each(function() {
						if ($(this).is(':checked'))
						{
							//console.log($(this).attr("name"));
							category = category + $(this).attr("name") + "^";
						}
					});
							
					$("#hMenuSelections").val(category);
					var pricePerPerson = 0;	
					
					pricePerPerson = $("#Dinner1Price").val();
					
					var barCost = "";
					$('#Bar input:checked').each(function () {
                        $("#hBar").val($(this).parent().text());
						$("#hBarTitle").val($(this).parent().text());
						barCost = $(this).val();
					});
			    
				
					var barTotal = 0;
					if (barCost.indexOf('f') == -1)
					{
						barTotal = $("#NumPeople").val() * barCost;
					}
					else
					{
						barTotal = parseInt(barCost.replace('f',''));
					}
				
				
					var foodTotal = $("#NumPeople").val() * pricePerPerson;
					var grandTotal = foodTotal + barTotal;
				
				console.log('foodTotal:' + foodTotal);
				
				console.log('barTotal:' + barTotal);
				console.log('grandTotal:' + grandTotal);
				
					$("#hDinnerCostTotal").val(grandTotal);
					
					$('#hBarTotal').val(barTotal);
		
                    $("#form1").submit();
                }
            });


           function ValidateDinner() {
					
				var okToSubmit = true;	
				var dinnerIsSelected = false;
				
				
				// validate menu selections
				var catNum = 1;
				var numReq = 0;
	
				numReq = $("#Dinner1Category1ReqNum").val();
				var numSelected = 0;
				$(".Dinner1Category1MenuItems").each(function() {
					
					if ($(this).is(':checked'))
					{
						numSelected++;
					}
				});
					
				/*	
				if (numReq != numSelected) {
				    
					ShowError("Please Select " + numReq.toString() + " choices for Bonfire");
					okToSubmit = false;
					return false;
				}
				   
				if ($("#Bar input[type=checkbox]:checked").length != 1) {
                    ShowError("Please Select 1 Bar");
					okToSubmit = false;
					return false;
                }
				
				*/
				
				if ($("#NumPeople").val() == "") {
                    ShowError("Please Enter Number of People");
					okToSubmit = false;
					return false;
                }
          
               return okToSubmit;
           }
		   
		   
		    function ShowError(message) {
               $("#errorMessage").html(message);
               $("#errorDiv").show();
               $("#errorDiv").fadeTo(2000, 500).slideUp(500, function () {
                   $("#errorDiv").hide();
               });
           }

        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
     input,
select,
textarea {
    max-width: 400px;
}
</style>
</head>
<body>
<div class="container">

<h1>Bonfire Menu</h1>
<form id="form1" action="UpdateReservation.php" method="post">
<fieldset class="form-group">
    <label for="firstName">Number of Guests</label>
    <input type="number" class="form-control" id="NumPeople" name="NumPeople" placeholder="Number of Guests"   value="<?= $numPeople ?>">
  </fieldset>
  <input type="hidden" value="<?= $data2['Price'] ?>" name="Dinner1Price" id="Dinner1Price" />
<?
			while($row2 = mysql_fetch_assoc($query2))
			{
				$RequiredLabel1 = ($row2['RequiredNumber'] > 0 ? '(Choose '.$row2['RequiredNumber'].')' : ''); 
?>        
				<b>Please Choose Your Bonfire Items:</b> <?=$RequiredLabel1?>  <br />
				<div id="<?= $row2['Title'] ?>">
				    <input type="hidden" value="<?= $row2['Title'] ?>" name="Category<?= $x ?>" class="Dinner1Categories" />
					<input type="hidden" value="<?= $row2['RequiredNumber'] ?>" name="Category<?= $x ?>ReqNum" id="Dinner1Category1ReqNum" />
<?					for ($y = 1; $y <=8; $y++)
					{	
					    if ($row2['MenuItem'.$y] != "")
						{
							$setSelected2 = SetSelected($row2['MenuItem'.$y]);		
?>							
						<div class="checkbox">
							<label><input id="MenutItem<?= $y ?>" name="<?= $row2['MenuItem'.$y] ?>" type="checkbox" class="Dinner1Category1MenuItems" <?= $setSelected2 == 'Y' ? 'checked="checked"' : ''?>/><?= $row2['MenuItem'.$y] ?></label>
						</div>
<?
						}
					}
?>					
				</div>
				<br />	
<?
			}
?>  
  
<br/>
<h1>Bonfire Bar</h1>

<h3>Choose one option to continue. Open bar costs are based on the number of drinks consumed at a per drink rate that you choose from 2 tiers of offerings. 
For the cash bar option guests pay for their own drinks. Your cost for a cash bar is the set up fee. There is no set up fee for open bar options.</h3> 
<br />
<div id="Bar">
<div class="checkbox">
  <label><input id="Checkbox14" type="checkbox"  value="<?= $BarUnitPrice?>"  <?= SetSelectedC('Include Bonfire Bar: Featuring '.$BarLabelStr) == 'Y' ? 'checked="checked"' : ''?>/>Include Bonfire Bar: Featuring <?= $BarLabelStr ?></label>
</div>
</div>  
  
<br />

<div>
<div style="width:20%;float:left;"><a id="btnSub" class="btn btn-sample">Next</a></div>
<div id="errorDiv" class="alert alert-warning" style="width:80%;display:none;float:right;"><strong>Warning!</strong> <span id="errorMessage">Indicates a warning that might need attention.</span></div>
</div>

<input type="hidden" id="hMenuSelections" name="hMenuSelections" />
<input type="hidden" id="hBarFactor"  name="hBarFactor"  value="<?= $Factor?>"/>
<input type="hidden" id="hBarUnitPrice"  name="hBarUnitPrice" value="<?= $BarUnitPrice?>"/>
<input type="hidden" id="hBar"  name="hBar" />
  <input type="hidden" value="Bonfire" name="formName" />
  <input type="hidden" id="hDinnerCostPerPerson" name="hDinnerCostPerPerson" value="<?= $BarUnitPrice?>"/>
<input type="hidden" id="hDinnerCostTotal" name="hDinnerCostTotal" value="0"/>
<input type="hidden" id="hBarTotal" name="hBarTotal" value="0"/>
<input type="hidden" id="hBarTitle" name="hBarTitle" value="0"/>
<input type="hidden" value="<?= $updateSummary ?>" name="updateSummary" />
  </form>
  </div>
</body>
</html>
