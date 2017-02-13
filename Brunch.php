<?php
session_start(); 

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	$data = "select * from DinnerDescription where DinnerType = 'Brunch'";
	
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
	$data2 = mysql_fetch_array($query);
	
	$dataCat1 = "select * from DinnerDetail where DinnerType = 'Brunch' and DinnerNumber = 'Dinner 1'";
	$query2 = mysql_query($dataCat1);
	
	$numPeople = "";
	if (isset($_SESSION['Brunch']))
	{
		$a = $_SESSION['Brunch'];
		$numPeople = $a['NumPeople'];
	}
	
	$updateSummary = "";

	if (isset($_SESSION['Brunch']))
	{
	
		$updateSummary = "updateSummary";
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Brunch Menu</title>
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
                   
				   	var category = "Brunch^";
					
					$(".BrunchItem").each(function() {
						category = category + $(this).attr("name") + "^";
					});
							
					$("#hMenuSelections").val(category);
					
					var pricePerPerson = 0;	
					pricePerPerson = $("#hDinnerCostPerPerson").val();	
					
					var foodTotal = $("#NumPeople").val() * pricePerPerson;
				
					$("#hDinnerCostTotal").val(foodTotal);
				   
                    $("#form1").submit();
                }
            });


            function ValidateDinner() {

				var okToSubmit = true;	
			
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

<h1>Wedding or Event Brunch</h1>
<h3>Brunch is a full buffet of the items below and is included in the room price for all guests staying in the Wilburton Mansion, Maxwell House or the Equinox Views Villa. 
Guests that are staying elsewhere may be included in the brunch for $18 per person.</h3>
<br/>
<form id="form1" action="UpdateReservation.php" method="post">
<fieldset class="form-group">
    <label for="firstName">Number of Guests not staying at the Wilburton Inn, Maxwell House or Equinox Views Villa</label>
    <input type="number" class="form-control" id="NumPeople" name="NumPeople" placeholder="Number of Guests not staying at the Wilburton Inn, Maxwell House or Equinox Views Villa"   value="<?= $numPeople ?>">
  </fieldset>
<?
			while($row2 = mysql_fetch_assoc($query2))
			{
?>        
				<b>Your Brunch Items:</b><br /><br />
				<div id="<?= $row2['Title'] ?>">
				    
<?					for ($y = 1; $y <=8; $y++)
					{	
					    if ($row2['MenuItem'.$y] != "")
						{
?>							
							<div >
								<span class="BrunchItem" name="<?= $row2['MenuItem'.$y] ?>"><?= $row2['MenuItem'.$y] ?></span>
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
  
<br />

<div>
<div style="width:20%;float:left;"><a id="btnSub" class="btn btn-sample">Next</a></div>
<div id="errorDiv" class="alert alert-warning" style="width:80%;display:none;float:right;"><strong>Warning!</strong> <span id="errorMessage">Indicates a warning that might need attention.</span></div>
</div>
	<input type="hidden" id="hMenuSelections" name="hMenuSelections" />
  <input type="hidden" value="Brunch" name="formName" />
  <input type="hidden" id="hDinnerCostPerPerson" name="hDinnerCostPerPerson" value="<?=$data2['Price']?>"/>
<input type="hidden" id="hDinnerCostTotal" name="hDinnerCostTotal" value="500"/>
<input type="hidden" value="<?= $updateSummary ?>" name="updateSummary" />
  </form>
  </div>
</body>
</html>
