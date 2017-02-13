<?php
	
	include 'header.php';

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	
	$data = "select * from DinnerDescription where DinnerType = 'Brunch' and DinnerNumber = 'Dinner 1'";
	$dataCat1 = "select * from DinnerDetail where DinnerType = 'Brunch' and DinnerNumber = 'Dinner 1'";

	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
	$queryCat1 = mysql_query($dataCat1);
	
    $data2 = mysql_fetch_array($query);
	$rdataCat1 = mysql_fetch_array($queryCat1);
	
	if (isset($_GET["Update"]) && !empty($_GET["Update"])) {
		$BrunchUpdated = $_GET['Update'];
	}
	else
	{
		$BrunchUpdated = "";
	}
	
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
	
			
			function CheckIfPostBackUpdate()
			{
				if ($("#UpdateShowMessage").val() == "YES")
				{
					$("#UpdateShowMessage").val('');
					ShowMessage("The Brunch Menu has been updated."); 
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
<h2>Brunch Menu</h2>
 <fieldset class="form-group">
    <label for="firstName">Title</label>
    <input type="text" class="form-control" id="BrunchTitle" name="BrunchTitle" value="<?= $data2['Title']?>"  />
  </fieldset>
<fieldset class="form-group">
    <label for="firstName">Description</label>
    <input type="text" class="form-control" id="BrunchDescription" name="BrunchDescription" value="<?= $data2['Description']?>"   />
  </fieldset>
<fieldset class="form-group">
    <label for="firstName">Price</label>
    <input type="text" class="form-control" id="BrunchPrice" name="BrunchPrice" value="<?= $data2['Price']?>"   />
  </fieldset>

  <div class="row">
  <div class="col-md-6">
  <fieldset class="form-group">
    <label for="firstName">Menu Item 1</label>
    <input type="text" class="form-control" id="Item1" name="Item1" value="<?= $rdataCat1['MenuItem1']?>" />
  </fieldset>
  <fieldset class="form-group">
    <label for="firstName">Menu item 2</label>
    <input type="text" class="form-control" id="Item2" name="Item2" value="<?= $rdataCat1['MenuItem2']?>"  />
  </fieldset>
  <fieldset class="form-group">
    <label for="firstName">Menu Item 3</label>
    <input type="text" class="form-control" id="Item3" name="Item3" value="<?= $rdataCat1['MenuItem3']?>"  />
  </fieldset>
   <fieldset class="form-group">
    <label for="firstName">Menu Item 4</label>
    <input type="text" class="form-control" id="Item4" name="Item4" value="<?= $rdataCat1['MenuItem4']?>"  />
  </fieldset>
  </div>
  <div class="col-md-6">
   <fieldset class="form-group">
    <label for="firstName">Menu Item 5</label>
    <input type="text" class="form-control" id="Item5" name="Item5" value="<?= $rdataCat1['MenuItem5']?>"  />
  </fieldset> 
  <fieldset class="form-group">
    <label for="firstName">Menu Item 6</label>
    <input type="text" class="form-control" id="Item6" name="Item6" value="<?= $rdataCat1['MenuItem6']?>"  />
  </fieldset>
   <fieldset class="form-group">
    <label for="firstName">Menu Item 7</label>
    <input type="text" class="form-control" id="Item7" name="Item7" value="<?= $rdataCat1['MenuItem7']?>"  />
  </fieldset>
   <fieldset class="form-group">
    <label for="firstName">Menu Item 8</label>
    <input type="text" class="form-control" id="Item8" name="Item8" value="<?= $rdataCat1['MenuItem8']?>"  />
  </fieldset>
  </div>
  </div>
  <div>
<div style="width:20%;float:left;"><input type="submit"  class="btn btn-primary" value="Save Brunch" /></div>
<div id="messageDiv" class="alert alert-success" style="width:80%;display:none;float:right;"><strong>Success!</strong> <span id="userMessage">Brunch Saved.</span></div>
</div>
  

  <input type="hidden" value="Brunch" name="formName" />
  <input type="hidden" <?= $BrunchUpdated == 'ok' ? ' value="YES" ' : 'value=" "';?> id="UpdateShowMessage" />
  </div>
  </form>
</body>
</html>
