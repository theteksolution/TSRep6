<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// loop through selections
// write to db
// send emails


/*

    Date needed
	Name, number , email
	Rehearsal #
	Wedding #
	Bonfire #
	Brunch #
	Total
	



	$hostname="localhost";
	$username="WeddingResUser";
	$password="W3ddingR3s";
	$dbname="WeddingRes";
	
	
	$a = $_SESSION['Background'];
	$FirstName = $a['firstName'];
	$LastName = $a['lastName'];
	$Phone = $a['phone'];
	$Email = $a['email'];
	
	
	
	$Address1 = $a['address1'];
	$Address2 = $a['address2'];
	$City = $a['city'];
	$State = $a['state'];
	$Zip = $a['zip'];
	$HowHeard = $a['howHear'];
	
	$b = $_SESSION['DateSize'];
	$DateNeeded = $b['resDate'];
	
	
	
	$RentalFee = 2000;
	$DinnerOptions = $b['DinnerOptions'];
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	
	mysql_query("INSERT INTO `BackgroundInfo` (FirstName, LastName, Address1, Address2, City, State, Zip, Phone, Email, DateNeeded, HowHeard, RentalFee, DinnerOptions) 
                               VALUES ('$FirstName', '$LastName', '$Address1', '$Address2', '$City', '$State', '$Zip', '$Phone', '$Email', '$DateNeeded', '$HowHeard', '$RentalFee', '$DinnerOptions')")
	or die(mysql_error());    

	
	if (isset($_SESSION['RehearsalDinner']))
	{
		$c = $_SESSION['RehearsalDinner'];
		$CategoriesArr = explode("|", ltrim($c["hMenuSelections"],'|'));

		$NumberPeople = $c['NumPeople']; 
		
		$j = 0;
		$MenuSelectionArr = array('','','','','','','','');
		
		foreach($CategoriesArr as $Cat)
		{
			$MenuItemsArr = explode("^", rtrim($Cat,'^'));

			$MenuSelectionArr[$j] = $MenuItemsArr[0]." -- ";
			for ($i=1;$i < count($MenuItemsArr);$i++)
			{
				if ($i == count($MenuItemsArr) - 1)
				{
					$MenuSelectionArr[$j] = $MenuSelectionArr[$j].$MenuItemsArr[$i];
					
				}
				else
				{
					$MenuSelectionArr[$j] = $MenuSelectionArr[$j].$MenuItemsArr[$i].", ";
				}
			}		
			
			$j++;
			
		}
		
		// write db here
		
		$ReservationID = 0;
		$DinnerType = "Rehearsal";
		$DinnerNumber = "Dinner 1";
		$DinnerCostPerPerson = 23;
		$DinnerCostTotal = 230;
		$NumberPeople = $c['NumPeople'];
		$MenuSelection1 = $MenuSelectionArr[0];
		$MenuSelection2 = $MenuSelectionArr[1];
		$MenuSelection3 = $MenuSelectionArr[2];
		$MenuSelection4 = $MenuSelectionArr[3];
		$MenuSelection5 = $MenuSelectionArr[4];
		$MenuSelection6 = $MenuSelectionArr[5];
		$MenuSelection7 = $MenuSelectionArr[6];
		$MenuSelection8 = $MenuSelectionArr[7];
		$BarTotal = 200;
		$BarSelection = "Ya!";
		
		
		mysql_query("INSERT INTO `MenuSelections` (ReservationID, DinnerType, DinnerNumber, DinnerCostPerPerson, DinnerCostTotal, NumberPeople, MenuSelection1, MenuSelection2, MenuSelection3, MenuSelection4, MenuSelection5, MenuSelection6, MenuSelection7,MenuSelection8, BarTotal, BarSelection) 
                               VALUES ('$ReservationID', '$DinnerType', '$DinnerNumber', '$DinnerCostPerPerson', '$DinnerCostTotal', '$NumberPeople', '$MenuSelection1', '$MenuSelection2', '$MenuSelection3', '$MenuSelection4','$MenuSelection5', '$MenuSelection6', '$MenuSelection7','$MenuSelection8', '$BarTotal', '$BarSelection')")
		or die(mysql_error());    

	}
	
	
	if (isset($_SESSION['WeddingDinner']))
	{
		$c = $_SESSION['WeddingDinner'];
		$CategoriesArr = explode("|", ltrim($c["hMenuSelections"],'|'));

		$NumberPeople = $c['NumPeople']; 
		
		$j = 0;
		$MenuSelectionArr = array('','','','','','','','');
		
		foreach($CategoriesArr as $Cat)
		{
			$MenuItemsArr = explode("^", rtrim($Cat,'^'));

			$MenuSelectionArr[$j] = $MenuItemsArr[0]." -- ";
			for ($i=1;$i < count($MenuItemsArr);$i++)
			{
				if ($i == count($MenuItemsArr) - 1)
				{
					$MenuSelectionArr[$j] = $MenuSelectionArr[$j].$MenuItemsArr[$i];
				}
				else
				{
					$MenuSelectionArr[$j] = $MenuSelectionArr[$j].$MenuItemsArr[$i].", ";
				}
			}		
			
			$j++;
			
		}
		
		// write db here
		
		$ReservationID = 0;
		$DinnerType = "Wedding";
		$DinnerNumber = "Dinner 1";
		$DinnerCostPerPerson = 23;
		$DinnerCostTotal = 230;
		$NumberPeople = $c['NumPeople'];
		$MenuSelection1 = $MenuSelectionArr[0];
		$MenuSelection2 = $MenuSelectionArr[1];
		$MenuSelection3 = $MenuSelectionArr[2];
		$MenuSelection4 = $MenuSelectionArr[3];
		$MenuSelection5 = $MenuSelectionArr[4];
		$MenuSelection6 = $MenuSelectionArr[5];
		$MenuSelection7 = $MenuSelectionArr[6];
		$MenuSelection8 = $MenuSelectionArr[7];
		$BarTotal = 200;
		$BarSelection = "Ya!";
		
		
		mysql_query("INSERT INTO `MenuSelections` (ReservationID, DinnerType, DinnerNumber, DinnerCostPerPerson, DinnerCostTotal, NumberPeople, MenuSelection1, MenuSelection2, MenuSelection3, MenuSelection4, MenuSelection5, MenuSelection6, MenuSelection7,MenuSelection8, BarTotal, BarSelection) 
                               VALUES ('$ReservationID', '$DinnerType', '$DinnerNumber', '$DinnerCostPerPerson', '$DinnerCostTotal', '$NumberPeople', '$MenuSelection1', '$MenuSelection2', '$MenuSelection3', '$MenuSelection4','$MenuSelection5', '$MenuSelection6', '$MenuSelection7','$MenuSelection8', '$BarTotal', '$BarSelection')")
		or die(mysql_error());    

	}
	
	if (isset($_SESSION['Bonfire']))
	{
		$c = $_SESSION['Bonfire'];
	
		$NumberPeople = $c['NumPeople']; 
			
		$MenuSelection = "";
		
		$MenuItemsArr = explode("^", rtrim($c["hMenuSelections"],'^'));

		$MenuSelection = $MenuItemsArr[0]." -- ";
		for ($i=1;$i < count($MenuItemsArr);$i++)
		{
			if ($i == count($MenuItemsArr) - 1)
			{
				$MenuSelection = $MenuSelection.$MenuItemsArr[$i];
			}
			else
			{
				$MenuSelection = $MenuSelection.$MenuItemsArr[$i].", ";
			}
		}		
		
		// write db here
		
		$ReservationID = 0;
		$DinnerType = "Bonfire";
		$DinnerNumber = "Dinner 1";
		$DinnerCostPerPerson = 23;
		$DinnerCostTotal = 230;
		$NumberPeople = $c['NumPeople'];
		$MenuSelection1 = $MenuSelection;
		$BarTotal = 200;
		$BarSelection = "Ya!";
		
		
		mysql_query("INSERT INTO `MenuSelections` (ReservationID, DinnerType, DinnerNumber, DinnerCostPerPerson, DinnerCostTotal, NumberPeople, MenuSelection1, BarTotal, BarSelection) 
                               VALUES ('$ReservationID', '$DinnerType', '$DinnerNumber', '$DinnerCostPerPerson', '$DinnerCostTotal', '$NumberPeople', '$MenuSelection1', '$BarTotal', '$BarSelection')")
		or die(mysql_error());    

	}
	
	
	if (isset($_SESSION['Brunch']))
	{
		$c = $_SESSION['Brunch'];
	
		$NumberPeople = $c['NumPeople']; 
			
		$MenuSelection = "";
		
		$MenuItemsArr = explode("^", rtrim($c["hMenuSelections"],'^'));

		$MenuSelection = $MenuItemsArr[0]." -- ";
		for ($i=1;$i < count($MenuItemsArr);$i++)
		{
			if ($i == count($MenuItemsArr) - 1)
			{
				$MenuSelection = $MenuSelection.$MenuItemsArr[$i];
			}
			else
			{
				$MenuSelection = $MenuSelection.$MenuItemsArr[$i].", ";
			}
		}		
		
		// write db here
		
		$ReservationID = 0;
		$DinnerType = "Brunch";
		$DinnerNumber = "Dinner 1";
		$DinnerCostPerPerson = 23;
		$DinnerCostTotal = 230;
		$NumberPeople = $c['NumPeople'];
		$MenuSelection1 = $MenuSelection;
		$BarTotal = 200;
		$BarSelection = "Ya!";
		
		
		mysql_query("INSERT INTO `MenuSelections` (ReservationID, DinnerType, DinnerNumber, DinnerCostPerPerson, DinnerCostTotal, NumberPeople, MenuSelection1, BarTotal, BarSelection) 
                               VALUES ('$ReservationID', '$DinnerType', '$DinnerNumber', '$DinnerCostPerPerson', '$DinnerCostTotal', '$NumberPeople', '$MenuSelection1', '$BarTotal', '$BarSelection')")
		or die(mysql_error());    

	}

*/




if (isset($_POST["hEmailText"]) && !empty($_POST["hEmailText"])) {


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Now Send Emails
	 // the message1800*4
	$msg = $_POST["hEmailText"];

	// use wordwrap() if lines are longer than 70 characters
	//$msg = wordwrap($msg,70);

	// send email
	mail("leoncrich@gmail.com","My subject",$msg,$headers);

}
     


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#resDate").datepicker();
        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
</style>
</head>
<body>
<div class="container">
<h1>Thank You</h1>
<div>
Your Reservation Request has been forwarded. You will receive an email, and will be contacted soon.
</div>
</div>
</body>
</html>