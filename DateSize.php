<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
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
	$updateSummary = "";
	
	$RehearsalDinner = "";
	$WeddingDinner = "";
	$Bonfire = "";
	$Brunch = "";
	
	
	$resDate = "";
	
	$updateSummary = "";

	
	
	if (isset($_SESSION["DateSize"]))
	{
		//$updateSummary = "updateSummary";
		$a = $_SESSION["DateSize"];
		
		$resDate = $a['resDate'];
		
		//print_r($a);
		
		if(strpos($a["DinnerOptions"],"RehearsalDinner") !== false)
		{
			$RehearsalDinner = "ok";
		}
		if(strpos($a["DinnerOptions"],"WeddingDinner") !== false)
		{
			$WeddingDinner = "ok";
		}
		if(strpos($a["DinnerOptions"],"Bonfire") !== false)
		{
			$Bonfire = "ok";
		}
		if(strpos($a["DinnerOptions"],"Brunch") !== false)
		{
			$Brunch = "ok";
		}
	}
	
	
	
			if (isset($_SESSION['RehearsalDinner']) && strpos($a["DinnerOptions"],"RehearsalDinner") == -1)
			{
				unset($_SESSION['RehearsalDinner']);
			}
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Date Event</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
           
	var array = $("#ResDateValues").val().split(",");
			console.log($("#ResDateValues").val());
			
			$("#resDate").datepicker({
				beforeShowDay: function(date){
					var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
						return [ array.indexOf(string) == -1 ]
				}			
			});

			$('input[type=checkbox]').change(function () {
				$("#DinnerOptions").val("");
				var DinOptions = "";
				$('input[type=checkbox]').each(function () {
					if ($(this).prop("checked")) {
						DinOptions = DinOptions + $(this).attr("id") + ",";
					}
				});
				$("#DinnerOptions").val(DinOptions);
			});


            $("#btnSub").click(function () {
                //validate here

                if (ValidateDinner() == true) {
                    //window.location.href = "RehearsalDinnerQuestion.html";
						
					
                    $("#form1").submit();
                }
            });


            function ValidateDinner() {

                var foundError = true;

                $("#form1 input[type=text]").each(function () {
                    if (this.value == "") {
                        $("#errorDiv").show();

                        $("#errorDiv").fadeTo(2000, 500).slideUp(500, function () {
                            $("#errorDiv").hide();
                        });
                        console.log('false');
                        foundError = false;
                    }
                });

                return foundError;
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

	.ui-datepicker-unselectable span.ui-state-default {
		background: #8B0000 !important;
		border-color: #8B0000 !important;
		color: #FFFFFF !important;
		font-weight: bold;
	}
	
	.fontLarger {
		font-size: larger;
	}
	
</style>
</head>
<body>
<div class="container">

<h1>Date of Your Wedding or Event</h1>
<form id="form1" action="UpdateReservation.php" method="post">
 <fieldset class="form-group">
    <h3 for="resDate">Dates marked in <span style="color:#8B0000">Red</span> are already reserved. Please Choose another date.</h3>
    <!-- <label for="resDate">Dates marked in <span style="color:#8B0000">Red</span> are already reserved. Please Choose another date.</label>  -->
    <input type="text" class="form-control" id="resDate" name="resDate" placeholder="Date" value="<?= $resDate ?>"/>
  </fieldset><br/>
  <h1>Select the Dining Events You Want</h1>
  <h3>Choose at least one to continue. You can make changes at the end of the process.</h3>
  <div class="checkbox">
     <label class="fontLarger" ><input id="RehearsalDinner" type="checkbox" <?= $RehearsalDinner =='ok' ? "checked='checked'" : '';?>/>Rehearsal or Welcome Dinner</label>
  </div>
  <div class="checkbox">
     <label class="fontLarger"><input id="WeddingDinner" type="checkbox"  <?= $WeddingDinner =='ok' ? "checked='checked'" : '';?>/>Wedding or Event Dinner</label>
  </div>
   <div class="checkbox">
     <label class="fontLarger"><input id="Bonfire" type="checkbox"  <?= $Bonfire =='ok' ? "checked='checked'" : '';?>/>Bonfire</label>
  </div>
   <div class="checkbox">
     <label class="fontLarger"><input id="Brunch" type="checkbox"  <?= $Brunch =='ok' ? "checked='checked'" : '';?>/>Brunch</label>
  </div>
 <!-- <fieldset class="form-group">
    <label for="numPeople">Size of Party</label>
    <input type="text" class="form-control" id="numPeople" name="numPeople" placeholder="Size" />
  </fieldset>-->

  <br />

<!-- <div style="width:20%;float:left;"><a id="btnBack" class="btn btn-primary">Back</a></div> -->
<div style="width:20%;float:left;"><a id="btnSub" class="btn btn-sample">Next</a></div>
<div id="errorDiv" class="alert alert-warning" style="width:60%;display:none;float:right;"><strong>Warning!</strong> <span id="errorMessage">Please complete all fields.</span></div>

<br /> <br /> <br />
<input type="hidden" value="DateSize" name="formName" />
<input type="hidden" id="DinnerOptions" name="DinnerOptions" />
<input type="hidden" id="RentalFee" name="RentalFee" value="2000"/>
<input type="hidden" id="ResDateValues" value="<?= $ResDateValues ?>"/>
<input type="hidden" value="<?= $updateSummary ?>" name="updateSummary" />
 </form>
  </div>
</body>
</html>
