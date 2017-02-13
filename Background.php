<?php
session_start(); 
$updateSummary = "";

if (isset($_SESSION['Background']))
{
	
	$updateSummary = "updateSummary";
}

//print_r($_SESSION['Background']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Background Information</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script src="bootstrap/js/bootstrap.min.js"></script>
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
 <script type="text/javascript">
     $(function () {

         $("#btnSub").click(function () {
             //validate here

             if (ValidateDinner() == true) {
                 //window.location.href = "DateSize.html";
                 $("#form1").submit();
             }
         });


         function ValidateDinner() {

             var foundError = true;

             $(".required").each(function () {
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

</head>
<body>

<div class="container">
<h1 >Contact Information</h1><br/>

<form id="form1" action="UpdateReservation.php" method="post">
<div  >
  <fieldset class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control required" id="lastName" name="lastName"  placeholder="First Name" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="address1">Address 1</label>
    <input type="text" class="form-control" id="address1" name="address1"  placeholder="Address 1" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control" id="address2" name="address2"  placeholder="Address 2" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city"  placeholder="City" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state"  placeholder="State" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip"  placeholder="Zip" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control required" id="email" name="email"  placeholder="Email" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone" value="asd">
  </fieldset>
  <fieldset class="form-group">
    <label for="howHear">How did you hear about us?</label>
    <input type="text" class="form-control" id="howHear" name="howHear"  placeholder="How did you hear about us?" value="asd">
  </fieldset>
  <br />

<div style="width:20%;float:left;"><a id="btnSub" class="btn btn-sample"><?= $updateSummary == "" ? 'Next' : 'Update Reservation' ?></a></div>
<div id="errorDiv" class="alert alert-warning" style="width:80%;display:none;float:right;"><strong>Warning!</strong> <span id="errorMessage">Last Name and Email are required.</span></div>

<br /> <br /> <br />
<input type="hidden" value="Background" name="formName" />
<input type="hidden" value="<?= $updateSummary ?>" name="updateSummary" />

</div>
  </form>
  </div>
</body>
</html>
