<?php
session_start(); 
// dinnertype = rehearsal
/*
for each dinner number -- 3
   title
   desc
   price
   
   for each category --8
    menu title req num
	item 1- 8
	
	-----
	
	to write to db we needs
	dinner type dinner number title price
	menu title menu items
*/
	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	$data = "select * from DinnerDescription where DinnerType = 'Wedding' and Enabled = 'on' Order by DinnerNumber";
	
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
	
	
	$dataBar = "select * from BarPrices Where BarType = 'Rehearsal'";
	$queryBar = mysql_query($dataBar);
	$data2Bar = mysql_fetch_array($queryBar);
	
	$oneBefore = false;
	$DeluxeBarLabelStr = "";
	$DeluxeBarUnitPrice = 0;
	$GrandBarLabelStr = "";
	$GrandBarUnitPrice = 0;
	$SetBarFee = $data2Bar['SetBarFee'];
	
	
	if ($data2Bar['DeluxeBeer'] != 0)
	{
		$DeluxeBarLabelStr = "Beer @ ".$data2Bar['DeluxeBeer'];
		$oneBefore = true;
		$DeluxeBarUnitPrice = $data2Bar['DeluxeBeer'];
	}
	if ($data2Bar['DeluxeWine'] != 0)
	{
		if($oneBefore)
		{
			$DeluxeBarLabelStr = $DeluxeBarLabelStr." - ";
		}
		$DeluxeBarLabelStr = $DeluxeBarLabelStr."Wine @ ".$data2Bar['DeluxeWine'];
		$oneBefore = true;
		$DeluxeBarUnitPrice = $DeluxeBarUnitPrice + $data2Bar['DeluxeWine'];
	}
	if ($data2Bar['DeluxeCocktail'] != 0)
	{
		if($oneBefore)
		{
			$DeluxeBarLabelStr = $DeluxeBarLabelStr." - ";
		}
		$DeluxeBarLabelStr = $DeluxeBarLabelStr."Cocktail @ ".$data2Bar['DeluxeCocktail'];
		$oneBefore = true;
		$DeluxeBarUnitPrice = $DeluxeBarUnitPrice + $data2Bar['DeluxeCocktail'];
	}
	
	if ($data2Bar['DeluxeChampagne'] != 0)
	{
		if($oneBefore)
		{
			$DeluxeBarLabelStr = $DeluxeBarLabelStr." - ";
		}
		$DeluxeBarLabelStr = $DeluxeBarLabelStr."Champagne @ ".$data2Bar['DeluxeChampagne'];
		$DeluxeBarUnitPrice = $DeluxeBarUnitPrice + $data2Bar['DeluxeChampagne'];
		
	}
	
	if($data2Bar['Factor'] > 0)
	{
		$DeluxeBarUnitPrice = $DeluxeBarUnitPrice * $data2Bar['Factor'];
	}
	
	
	$oneBefore = false;
	if ($data2Bar['GrandBeer'] != 0)
	{
		$GrandBarLabelStr = "Beer @ ".$data2Bar['GrandBeer'];
		$oneBefore = true;
		$GrandBarUnitPrice = $data2Bar['GrandBeer'];
	}
	if ($data2Bar['GrandWine'] != 0)
	{
		if($oneBefore)
		{
			$GrandBarLabelStr = $GrandBarLabelStr." - ";
		}
		$GrandBarLabelStr = $GrandBarLabelStr."Wine @ ".$data2Bar['GrandWine'];
		$oneBefore = true;
		$GrandBarUnitPrice = $GrandBarUnitPrice + $data2Bar['GrandWine'];
	}
	if ($data2Bar['GrandCocktail'] != 0)
	{
		if($oneBefore)
		{
			$GrandBarLabelStr = $GrandBarLabelStr." - ";
		}
		$GrandBarLabelStr = $GrandBarLabelStr."Cocktail @ ".$data2Bar['GrandCocktail'];
		$oneBefore = true;
		$GrandBarUnitPrice = $GrandBarUnitPrice + $data2Bar['GrandCocktail'];
	}
	
	if ($data2Bar['GrandChampagne'] != 0)
	{
		if($oneBefore)
		{
			$GrandBarLabelStr = $GrandBarLabelStr." - ";
		}
		$GrandBarLabelStr = $GrandBarLabelStr."Champagne @ ".$data2Bar['GrandChampagne'];
		$GrandBarUnitPrice = $GrandBarUnitPrice + $data2Bar['GrandChampagne'];
		
	}
	
	if($data2Bar['Factor'] > 0)
	{
		$GrandBarUnitPrice = $GrandBarUnitPrice * $data2Bar['Factor'];
	}
	
	$numPeople = "";
	if (isset($_SESSION['WeddingDinner']))
	{
		$a = $_SESSION['WeddingDinner'];
		$numPeople = $a['NumPeople'];
	}
	
	$updateSummary = "";

	if (isset($_SESSION['WeddingDinner']))
	{
	
		$updateSummary = "updateSummary";
	}
	
	
	function SetSelected($item)
	{
		if (isset($_SESSION["WeddingDinner"]))
		{
			$a = $_SESSION['WeddingDinner'];
	
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
	
	function SetSelectedB($item)
	{
		
		if (isset($_SESSION["WeddingDinner"]))
		{
		
			$a = "";
			foreach ($_SESSION['WeddingDinner'] as $key=>$val)
			{
				$a = $a.$key;
			}
			$a = str_replace('_', ' ', $a);
		    
			if(strpos($a,$item) !== false)
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
	
	if (isset($_SESSION["WeddingDinner"]))
		{
			$a = $_SESSION['WeddingDinner'];
	
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
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Wedding Dinner</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript">
       $(function () {
	 	
			$('.SelectedDinners').change(function() {

					// do stuff here. It will fire on any che
					
					// unchecl all
					// remove all category class selected
					$( ".Dinner1Categories").removeClass( "Selected" );
					$( ".Dinner2Categories").removeClass( "Selected" );
					$( ".Dinner3Categories").removeClass( "Selected" );
					//set above
					var CheckedID = $(this).attr("id");
					
					if ($(this).is(':checked')) {
						$(':checkbox').not(this).attr('checked', false);
						$( "." +  CheckedID + "Categories").addClass( "Selected" );
					}
					else
					{
						$('input[type=checkbox]').removeAttr('checked');
					}

			}); 
		   
		   
           $("#btnSub").click(function () {
		      
				if (!ValidateDinner())
					return 
					
				var totExtraCost = 0;
				var pricePerPerson = 0;	
				
				for (z = 1; z <= 3; z++)
				{
					// Build menu oput for post
					if ($(".Dinner" + z.toString() + "Categories").hasClass("Selected"))
					{
						totExtraCost = 0;
						pricePerPerson = $("#Dinner" + z.toString() + "Price").val();
						
						$("#hDinnerTitle").val($("#Dinner" + z.toString() + "Title").val());
						
						var i = 1;
						var category = "";
						$(".Dinner" + z.toString() + "Categories").each(function() {
							category = category + "|" + $(this).val() + "^";
							numReq = $("#Dinner" + z.toString() + "Category" + i.toString() +"ReqNum").val();
							ppx = $("#Dinner" + z.toString() + "Category" + i.toString() +"PPX").val();
							var extraCostArr = [];
							$(".Dinner" + z.toString() + "Category" + i.toString() + "MenuItems").each(function() {
								if ($(this).is(':checked'))
								{
									extraCostArr.push($(this).attr("extraprice"));	
									category = category + $(this).attr("name") + "^";
								}
							});
					
							// do extra cost processing here, then add to total per person cost
							for (j = 0; j < extraCostArr.length; j++)
							{
								if (extraCostArr[j] > 0)
								{
									totExtraCost = totExtraCost + parseInt(extraCostArr[j]);
								}
								if (extraCostArr[j] == 0 && (j + 1) > numReq)
								{
									totExtraCost = totExtraCost + parseInt(ppx);
								}
							}
							
							i++;
						});	
					
						$("#hMenuSelections").val(category);
							
					}	
				}
				
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
				var extraTotal = $("#NumPeople").val() * totExtraCost;
				var grandTotal = foodTotal + extraTotal + barTotal;
				
				/*
				console.log('foodTotal:' + foodTotal);
				console.log('extraTotal:' + extraTotal);
				console.log('barTotal:' + barTotal);
				console.log('grandTotal:' + grandTotal);
				*/
				$("#hDinnerCostTotal").val(grandTotal);
				$('#hBarTotal').val(barTotal);
			    
			    $("#form1").submit();
           });
           
		   function ShowError(message) {
               $("#errorMessage").html(message);
               $("#errorDiv").show();
               $("#errorDiv").fadeTo(2000, 500).slideUp(500, function () {
                   $("#errorDiv").hide();
               });
           }
           
		   
		   function ValidateDinner() {
					
				var okToSubmit = true;	
				var dinnerIsSelected = false;
				
				
				for (z = 1; z <= 3; z++)
				{
					// Build menu oput for post
					if ($(".Dinner" + z.toString() + "Categories").hasClass("Selected"))
					{
						dinnerIsSelected = true;
						
						// validate menu selections
						var catNum = 0;
						var numReq = 0;

						$(".Dinner" + z.toString() + "Categories").each(function() {
							catNum++;
					
							numReq = $("#Dinner" + z.toString() + "Category" + catNum.toString() +"ReqNum").val();
							ppx = $("#Dinner" + z.toString() + "Category" + catNum.toString() +"PPX").val();
					
							var numSelected = 0;
							$(".Dinner" + z.toString() + "Category" + catNum.toString() + "MenuItems").each(function() {
					
								if ($(this).is(':checked'))
								{
									numSelected++;
								}
							});
					
							/*
							console.log('ppx: ' + ppx);
							console.log('numSelected: ' + numSelected);
							console.log('numReq: ' + numReq);
							*/
							
							if (ppx > 0)
							{
							
								if (numSelected < numReq) {
									ShowError("Please Select " + numReq.toString() + " choices for " +  $(this).val());
									okToSubmit = false;
									return false;
								}
							}
							else
							{
								if (numSelected != numReq) {
									ShowError("Please Select " + numReq.toString() + " choices for " +  $(this).val());
									okToSubmit = false;
									return false;
								}
							}
							
						});
						
					}	
				}
				
				
				if ($("#Bar input[type=checkbox]:checked").length != 1) {
                    ShowError("Please Select 1 Bar");
					okToSubmit = false;
					return false;
                }
				
				if ($("#NumPeople").val() == "") {
                    ShowError("Please Enter Number of People");
					okToSubmit = false;
					return false;
                }
          
               return okToSubmit;
           }
       });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
	.panel-heading 
	{
		background:#3E6D12 !important;
	}
	.panel-title 
	{
		color:white !important;
	}
</style>
</head>
<body>
<div class="container">
<form id="form1" action="UpdateReservation.php" method="post">
<h1>Wedding or Event Dinner</h1>
 <fieldset class="form-group">
    <label for="firstName">Number of Guests</label>
    <input type="number" class="form-control" id="NumPeople" name="NumPeople" placeholder="Number of Guests"  value="<?= $numPeople ?>" >
  </fieldset>
<h3>Dinner options are determined by price per person. Choose one to continue by checking the box in the drop down menu after you've reviewed the options. At the end of the process you can make changes from the summary page.</h3>
<br/>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<? 
$i = 1;
while($row = mysql_fetch_assoc($query))
{
	  
	   $setSelected = SetSelectedB('SelectedDinner:'.$i.'`'.$row['Title']);
	  
?>	
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?= $i ?>">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>" <?= $setSelected == 'Y' ? 'aria-expanded="true"' : 'aria-expanded="false"' ?>  aria-controls="collapse<?= $i ?>">
           Option <?= $i ?>: <?= $row['Title'] ?> <?= $row['Description'] ?> $<?= $row['Price'] ?> per person plus tax and gratuities<span style="padding-left:7px" class="span-title"></span>
			<input type="hidden" value="<?= $row['Title'] ?> - <?= $row['Description'] ?> @<?= $row['Price'] ?>" name="Dinner<?= $i ?>Title" id="Dinner<?= $i ?>Title" />
			<input type="hidden" value="<?= $row['Price'] ?>" name="Dinner<?= $i ?>Price" id="Dinner<?= $i ?>Price" />
        </a>
      </h4>
    </div>
    <div id="collapse<?= $i ?>" class="panel-collapse collapse <?= $setSelected == 'Y' ? 'in' : ' ' ?>" role="tabpanel" aria-labelledby="heading<?= $i ?>"  <?= $setSelected == 'Y' ? 'aria-expanded="true"' : 'aria-expanded="false"' ?>>
      <div class="panel-body">
	    <div class="checkbox">
	    <label style="font-size:larger" ><input id="Dinner<?= $i ?>" name="SelectedDinner:<?= $i.'`'.$row['Title'] ?>" type="checkbox" class="SelectedDinners" <?= $setSelected == 'Y' ? "checked='checked'" : ''?>/><b>Check here to select this option.</b></label>
		</div>
<?
		for ($x = 1; $x <= 8; $x++) {
			$dataCat1 = "select * from DinnerDetail where DinnerType = 'Wedding' and DinnerNumber = '".$row['DinnerNumber']."' and CategoryNumber = '".$x."' and Title <> ''";
			$query2 = mysql_query($dataCat1);
			while($row2 = mysql_fetch_assoc($query2))
			{
				$PriceExtraLabel1 = ($row2['PricePerExtra'] > 0 ? ' (Choose additional '.$row2['Title'].' for $'.$row2['PricePerExtra'].' each pp)' : ''); 
				$RequiredLabel1 = ($row2['RequiredNumber'] > 0 ? 'Choose '.$row2['RequiredNumber'].'' : ''); 
?>        
				<b><?= $row2['Title'] ?>:</b> <?= $RequiredLabel1 ?> <?= $PriceExtraLabel1 ?> <br />
				<div id="<?= $row2['Title'] ?>">
				    <input type="hidden" value="<?= $row2['Title'] ?>" name="Category<?= $x ?>" class="Dinner<?= $i ?>Categories <?= $setSelected == 'Y' ? "Selected" : ''?>" />
					<input type="hidden" value="<?= $row2['RequiredNumber'] ?>" name="Category<?= $x ?>ReqNum" id="Dinner<?= $i ?>Category<?= $x ?>ReqNum" />
					<input type="hidden" value="<?= $row2['PricePerExtra'] ?>" name="Category<?= $x ?>PPX" id="Dinner<?= $i ?>Category<?= $x ?>PPX" />
<?					for ($y = 1; $y <=8; $y++)
					{	
					    if ($row2['MenuItem'.$y] != "")
						{
							$PriceExtraLabel2 = ($row2['Item'.$y.'Price'] > 0 ? ' (Additional $'.$row2['Item'.$y.'Price'].')' : ''); 	
							$setSelected2 = SetSelected($i.'_'.$row2['MenuItem'.$y]);							
?>		
						<div class="checkbox">
							<label><input id="MenuItem<?= $y ?>" name="<?= $i.'_'.$row2['MenuItem'.$y] ?>" extraprice="<?=$row2['Item'.$y.'Price'] ?>" type="checkbox" class="Dinner<?= $i ?>Category<?= $x ?>MenuItems" <?= $setSelected2 == 'Y' ? 'checked="checked"' : ''?>/><?= $row2['MenuItem'.$y] ?></label><label><?=$PriceExtraLabel2?> </label>
						</div>
<?
						}
					}
?>					
				</div>
				<br />	
<?
		}
	}
?>
      </div>
    </div>
  </div>
 <? 
	$i++;
} 
 
 ?>
 </div>
<br/>
<h1>Wedding or Event Bar</h1>


<h3>Choose one option to continue. Open bar costs are based on the number of drinks consumed at a per drink rate that you choose from 2 tiers of offerings. For the cash bar option guests pay for their own drinks. 
Your cost for a cash bar is the set up fee. There is no set up fee for open bar options. </h3> 



<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading999">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-parent="#accordion2" href="#collapse999"  aria-expanded="true" aria-controls="collapse999">
           Bar Options<span style="padding-left:7px" class="span-title"></span>
        </a>
      </h4>
    </div>
    <div id="collapse999" class="panel-collapse collapse in"  role="tabpanel" aria-labelledby="heading999" aria-expanded="true">
      <div class="panel-body">
	  
<div id="Bar">
<div class="checkbox">
  <label><input id="Checkbox14" type="checkbox" value="<?=$GrandBarUnitPrice?>" <?= SetSelectedC('Grand Bar: Featuring '.$GrandBarLabelStr) == 'Y' ? 'checked="checked"' : ''?> />Grand Bar: Featuring <?=$GrandBarLabelStr?></label>
</div>
<div class="checkbox">
  <label><input id="Checkbox15" type="checkbox" value="<?=$DeluxeBarUnitPrice?>" <?= SetSelectedC('Deluxe Bar: Featuring '.$GrandBarLabelStr) == 'Y' ? 'checked="checked"' : ''?> />Deluxe Bar: Featuring <?=$DeluxeBarLabelStr?></label>
</div>
<div class="checkbox">
  <label><input id="Checkbox16" type="checkbox" value="<?=$SetBarFee?>f" <?= SetSelectedC('Cash Bar: Cost of '.$GrandBarLabelStr) == 'Y' ? 'checked="checked"' : ''?> />Cash Bar: Cost of $<?=$SetBarFee?> bar set up fee</label>
</div>
</div>
      </div>
    </div>
  </div>
 </div>

<br/> <br /> <br/>
 
<div>
<div style="width:20%;float:left;"><a id="btnSub" class="btn btn-sample">Next</a></div>
<div id="errorDiv" class="alert alert-warning" style="width:80%;display:none;float:right;"><strong>Warning!</strong> <span id="errorMessage">Indicates a warning that might need attention.</span></div>
</div>
  
 <br /> <br /> <br />

<!-- Submit fields -->
<input type="hidden" id="hMenuSelections" name="hMenuSelections" />
<input type="hidden" id="hBar" name="hBar" />
<input type="hidden" value="WeddingDinner" name="formName" />
<input type="hidden" id="hDinnerCostPerPerson" name="hDinnerCostPerPerson" value="50"/>
<input type="hidden" id="hDinnerCostTotal" name="hDinnerCostTotal" value="500"/>
<input type="hidden" id="hBarTotal" name="hBarTotal" value="500"/>
<input type="hidden" id="hBarTitle" name="hBarTitle" value="500"/>
<input type="hidden" id="hDinnerTitle" name="hDinnerTitle" value="500"/>
<input type="hidden" value="<?= $updateSummary ?>" name="updateSummary" />
</form>
  </div>
</body>
</html>