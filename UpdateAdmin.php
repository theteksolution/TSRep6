<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (isset($_POST["formName"]) && !empty($_POST["formName"])) {
    switch ($_POST["formName"]) {
    case "Dinner":
        UpdateDinner();
        break;
	case "Brunch":
        UpdateBrunch();
        break;	
	case "Bonfire":
        UpdateBonfire();
        break;		
	}   
}

function UpdateDinner()
{
	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	$usertable="BackgroundInfo";
	$yourfield = "FirstName";
	

	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	$DinnerArr = explode(" - ", $_POST['DinnerType']);
	
	$DinnerType = trim($DinnerArr[0]); 
	$DinnerNumber = trim($DinnerArr[1]);
	$Description = $_POST['DinnerDescription']; 
	$Title = $_POST['DinnerTitle'];
	$Price = $_POST['DinnerPrice']; 
	if (isset($_POST["EnableDinner"]) && !empty($_POST["EnableDinner"])) {
		$Enabled = $_POST['EnableDinner'];
	}
	else
	{
		$Enabled = "";
	}
	
	
	mysql_query("UPDATE DinnerDescription SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', Description = '$Description', Title = '$Title', 
			Price = '$Price', Enabled = '$Enabled' WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'") 							
	or die(mysql_error());                           
								
	// mysql_query("INSERT INTO `DinnerDescription` (DinnerType, DinnerNumber, Description, Title, Price, Enabled) 
    //                           VALUES ('$DinnerType', '$DinnerNumber', '$Description', '$Title', '$Price', '$Enabled') ") 
    

	
	for ($x = 1; $x <= 8; $x++) {
	
		$CategoryNumber = $x;
		$Title = $_POST['Cat'.$x.'Title'];
		$RequiredNumber = $_POST['Cat'.$x.'ReqNum'];
		$PricePerExtra = $_POST['Cat'.$x.'ReqPPX'];
		$MenuItem1 = $_POST['Cat'.$x.'Item1'];
		$MenuItem2 = $_POST['Cat'.$x.'Item2'];
		$MenuItem3 = $_POST['Cat'.$x.'Item3'];
		$MenuItem4 = $_POST['Cat'.$x.'Item4'];
		$MenuItem5 = $_POST['Cat'.$x.'Item5'];
		$MenuItem6 = $_POST['Cat'.$x.'Item6'];
		$MenuItem7 = $_POST['Cat'.$x.'Item7'];
		$MenuItem8 = $_POST['Cat'.$x.'Item8'];
		$MenuItem9 = $_POST['Cat'.$x.'Item9'];
		$MenuItem10 = $_POST['Cat'.$x.'Item10'];
		$MenuItem11 = $_POST['Cat'.$x.'Item11'];
		$MenuItem12 = $_POST['Cat'.$x.'Item12'];
		$MenuItem13 = $_POST['Cat'.$x.'Item13'];
		$MenuItem14 = $_POST['Cat'.$x.'Item14'];
		$MenuItem15 = $_POST['Cat'.$x.'Item15'];
		$Item1Price = $_POST['Cat'.$x.'ItemP1'];
		$Item2Price = $_POST['Cat'.$x.'ItemP2'];
		$Item3Price = $_POST['Cat'.$x.'ItemP3'];
		$Item4Price = $_POST['Cat'.$x.'ItemP4'];
		$Item5Price = $_POST['Cat'.$x.'ItemP5'];
		$Item6Price = $_POST['Cat'.$x.'ItemP6'];
		$Item7Price = $_POST['Cat'.$x.'ItemP7'];
		$Item8Price = $_POST['Cat'.$x.'ItemP8'];
		$Item9Price = $_POST['Cat'.$x.'ItemP9'];
		$Item10Price = $_POST['Cat'.$x.'ItemP10'];
		$Item11Price = $_POST['Cat'.$x.'ItemP11'];
		$Item12Price = $_POST['Cat'.$x.'ItemP12'];
		$Item13Price = $_POST['Cat'.$x.'ItemP13'];
		$Item14Price = $_POST['Cat'.$x.'ItemP14'];
		$Item15Price = $_POST['Cat'.$x.'ItemP15'];
	
	
		mysql_query("UPDATE DinnerDetail SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', CategoryNumber = '$CategoryNumber', Title = '$Title', RequiredNumber = '$RequiredNumber',
						MenuItem1 = '$MenuItem1', MenuItem2 = '$MenuItem2', MenuItem3 = '$MenuItem3', MenuItem4 = '$MenuItem4', MenuItem5 = '$MenuItem5', MenuItem6 = '$MenuItem6', MenuItem7 = '$MenuItem7', MenuItem8 = '$MenuItem8',
						MenuItem9 = '$MenuItem9', MenuItem10 = '$MenuItem10', MenuItem11 = '$MenuItem11', MenuItem12 = '$MenuItem12', MenuItem13 = '$MenuItem13', MenuItem14 = '$MenuItem14', MenuItem15 = '$MenuItem15',
                        Item1Price = '$Item1Price', Item2Price = '$Item2Price', Item3Price = '$Item3Price', Item4Price = '$Item4Price', Item5Price = '$Item5Price', Item6Price = '$Item6Price', Item7Price = '$Item7Price', Item8Price = '$Item8Price', 
                        Item9Price = '$Item9Price', Item10Price = '$Item10Price', Item11Price = '$Item11Price', Item12Price = '$Item12Price', Item13Price = '$Item13Price', Item14Price = '$Item14Price', Item15Price = '$Item15Price', PricePerExtra = '$PricePerExtra' 						
						  WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber' and CategoryNumber = '$CategoryNumber'") 
		or die(mysql_error());  
	
		//mysql_query("INSERT INTO `DinnerDetail` (DinnerType, DinnerNumber, CategoryNumber, Title, RequiredNumber, MenuItem1, MenuItem2, MenuItem3, MenuItem4, MenuItem5, MenuItem6, MenuItem7, MenuItem8) 
        //                       VALUES ('$DinnerType', '$DinnerNumber', '$CategoryNumber', '$Title', '$RequiredNumber', '$MenuItem1', '$MenuItem2', '$MenuItem3', '$MenuItem4', '$MenuItem5', '$MenuItem6', '$MenuItem7', '$MenuItem8') ") 
		
	}

	header('Location: AdminRehDinner.php?Update=ok&typ='.$DinnerType.'&num='.$DinnerNumber);
	exit();		
	  	
}

function UpdateBonfire()
{
	$hostname="localhost";
	$username="WeddingResUser";
	$password="W3ddingR3s";
	$dbname="WeddingRes";

	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	$DinnerType = "Bonfire"; 
	$DinnerNumber = "Dinner 1";
	$Description = $_POST['BonfireDescription']; 
	$Title = $_POST['BonfireTitle'];
	$Price = $_POST['BonfirePrice']; 
	$Enabled = "on";
	
	mysql_query("UPDATE DinnerDescription SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', Description = '$Description', Title = '$Title', 
			Price = '$Price', Enabled = '$Enabled' WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'") 							
	or die(mysql_error());                

	// header('Location: DateSize.html');
		// exit();	
    
	$Title = "BonfireTitleHolder";
	$RequiredNumber = 0;
	$MenuItem1 = $_POST['Item1'];
	$MenuItem2 = $_POST['Item2'];
	$MenuItem3 = $_POST['Item3'];
	$MenuItem4 = $_POST['Item4'];
	$MenuItem5 = $_POST['Item5'];
	$MenuItem6 = $_POST['Item6'];
	$MenuItem7 = $_POST['Item7'];
	$MenuItem8 = $_POST['Item8'];
	
	mysql_query("UPDATE DinnerDetail SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', CategoryNumber = '1', Title = '$Title', RequiredNumber = '$RequiredNumber',
						MenuItem1 = '$MenuItem1', MenuItem2 = '$MenuItem2', MenuItem3 = '$MenuItem3', MenuItem4 = '$MenuItem4', MenuItem5 = '$MenuItem5', MenuItem6 = '$MenuItem6', MenuItem7 = '$MenuItem7', MenuItem8 = '$MenuItem8'
						  WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'") 
	or die(mysql_error());  
	
	header('Location: AdminBonfire.php?Update=ok');
	exit();		
	
}

function UpdateBrunch()
{

	$hostname="localhost";
	$username="WeddingResUser";
	$password="W3ddingR3s";
	$dbname="WeddingRes";

	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	$DinnerType = "Brunch"; 
	$DinnerNumber = "Dinner 1";
	$Description = $_POST['BrunchDescription']; 
	$Title = $_POST['BrunchTitle'];
	$Price = $_POST['BrunchPrice']; 
	$Enabled = "on";
	
	mysql_query("UPDATE DinnerDescription SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', Description = '$Description', Title = '$Title', 
			Price = '$Price', Enabled = '$Enabled' WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'") 							
	or die(mysql_error());               
	
	$Title = "BrunchTitleHolder";
	$RequiredNumber = 0;
	$MenuItem1 = $_POST['Item1'];
	$MenuItem2 = $_POST['Item2'];
	$MenuItem3 = $_POST['Item3'];
	$MenuItem4 = $_POST['Item4'];
	$MenuItem5 = $_POST['Item5'];
	$MenuItem6 = $_POST['Item6'];
	$MenuItem7 = $_POST['Item7'];
	$MenuItem8 = $_POST['Item8'];
	
	
	mysql_query("UPDATE DinnerDetail SET DinnerType = '$DinnerType', DinnerNumber = '$DinnerNumber', CategoryNumber = '1', Title = '$Title', RequiredNumber = '$RequiredNumber',
						MenuItem1 = '$MenuItem1', MenuItem2 = '$MenuItem2', MenuItem3 = '$MenuItem3', MenuItem4 = '$MenuItem4', MenuItem5 = '$MenuItem5', MenuItem6 = '$MenuItem6', MenuItem7 = '$MenuItem7', MenuItem8 = '$MenuItem8'
						  WHERE DinnerType = '$DinnerType' and DinnerNumber = '$DinnerNumber'") 
	or die(mysql_error());  
	
	header('Location: AdminBrunch.php?Update=ok');
	exit();		
	
}
 
?>
 