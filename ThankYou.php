<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (isset($_POST["hEmailText"]) && !empty($_POST["hEmailText"])) {

    //echo $_POST["hEmailText"];

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="zzzzz";
	$dbname="WeddingRes";
	
	
	$a = $_SESSION['Background'];
	$Name = $a['firstName']." ".$a['lastName'];
	$Phone = $a['phone'];
	$Email = $a['email'].",leoncrich@gmail.com";
	$RehearsalNum = ""; 
	$WeddingNum = ""; 
	$BonfireNum = ""; 
	$BrunchNum = ""; 
	$DetailInfo = "";
	$GrandTotal = "";
	
	
	$b = $_SESSION['DateSize'];
	$DateNeeded = $b['resDate'];
	
	if (isset($_SESSION['RehearsalDinner']))
	{
		$c = $_SESSION['RehearsalDinner'];
		$RehearsalNum = $c['NumPeople']; 
	}
	
	if (isset($_SESSION['WeddingDinner']))
	{
		$c = $_SESSION['WeddingDinner'];
		$WeddingNum = $c['NumPeople']; 
	}
	
	if (isset($_SESSION['Bonfire']))
	{
		$c = $_SESSION['Bonfire'];
		$BonfireNum = $c['NumPeople']; 
	}
	
	
	if (isset($_SESSION['Brunch']))
	{
		$c = $_SESSION['Brunch'];
		$BrunchNum = $c['NumPeople']; 
	}
	
	$GrandTotal = $_POST["hGrandTotal"];
	
	//$DetailInfo = rawurlencode($_POST["hEmailText"]);
	$DetailInfo = $_POST["hEmailText"];
	// Update database

	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	
	mysql_query("INSERT INTO ReservationDetails (Name, Phone, Email, WeddingNum, RehearsalNum, BonfireNum, BrunchNum, GrandTotal,ReservationDate,DetailInfo) 
			VALUES ('$Name','$Phone','$Email','$WeddingNum','$RehearsalNum','$BonfireNum','$BrunchNum','$GrandTotal',STR_TO_DATE('$DateNeeded', '%m/%d/%Y'),'$DetailInfo')")
	or die(mysql_error());    
	
	
	
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Now Send Emails
	 // the message1800*4
	$msg = $_POST["hEmailText"];

	// use wordwrap() if lines are longer than 70 characters
	//$msg = wordwrap($msg,70);

	// send email
	mail($Email,"Reservation Request",$msg,$headers);
	


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