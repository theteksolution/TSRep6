<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', '1');

/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
*/
date_default_timezone_set('America/New_York');

$GrandTotal = 0;


function GetRentalFee($Date, $Type)
{

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);

		
	$Fee = 0;	
	
	
	 // call horse show
	 
	$data = "SELECT * FROM  `SeasonPricing` WHERE SeasonName = 'Horse Show' and STR_TO_DATE('$Date', '%m/%d/%Y')  BETWEEN startdate AND enddate";
	$query = mysql_query($data);
	
	$data2 = mysql_fetch_array($query);
	
	if (mysql_num_rows($query) > 0)
	{
		if ($Type == 'Rehearsal')
		{
			$Fee = $data2['RehearsalFee'];	
		}
		if ($Type == 'Wedding')
		{
			$Fee = $data2['WeddingFee'];	
		}
		if ($Type == 'Bonfire')
		{
			$Fee = $data2['BonfireFee'];	
		}
	}
	
	
	 // no, if sat sun call mid summer
	
	if ($Fee == 0 && isWeekend($Date) == false)	
	{
		$data = "SELECT * FROM  `SeasonPricing` WHERE SeasonName = 'MidWeek Summer' and STR_TO_DATE('$Date', '%m/%d/%Y')  BETWEEN startdate AND enddate";
		$query = mysql_query($data);
	
		$data2 = mysql_fetch_array($query);
	
		if (mysql_num_rows($query) > 0)
		{
			if ($Type == 'Rehearsal')
			{
				$Fee = $data2['RehearsalFee'];	
			}
			if ($Type == 'Wedding')
			{
				$Fee = $data2['WeddingFee'];	
			}
			if ($Type == 'Bonfire')
			{
				$Fee = $data2['BonfireFee'];	
			}
		}
	}
	
	
	// no, all summer
	if ($Fee == 0 && isWeekend($Date) == true)	
	{
		$data = "SELECT * FROM  `SeasonPricing` WHERE SeasonName = 'Summer' and STR_TO_DATE('$Date', '%m/%d/%Y')  BETWEEN startdate AND enddate";
		$query = mysql_query($data);
	
		$data2 = mysql_fetch_array($query);
	
		if (mysql_num_rows($query) > 0)
		{
			if ($Type == 'Rehearsal')
			{
				$Fee = $data2['RehearsalFee'];	
			}
			if ($Type == 'Wedding')
			{
				$Fee = $data2['WeddingFee'];	
			}
			if ($Type == 'Bonfire')
			{
				$Fee = $data2['BonfireFee'];	
			}
		}
	}

	 // no, call peak
	if ($Fee == 0)	
	{
		$data = "SELECT * FROM  `SeasonPricing` WHERE SeasonName = 'Peak' and STR_TO_DATE('$Date', '%m/%d/%Y')  BETWEEN startdate AND enddate";
		$query = mysql_query($data);
	
		$data2 = mysql_fetch_array($query);
	
		if (mysql_num_rows($query) > 0)
		{
			if ($Type == 'Rehearsal')
			{
				$Fee = $data2['RehearsalFee'];	
			}
			if ($Type == 'Wedding')
			{
				$Fee = $data2['WeddingFee'];	
			}
			if ($Type == 'Bonfire')
			{
				$Fee = $data2['BonfireFee'];	
			}
		}
	}

 // no, call off season
	if ($Fee == 0)	
	{
		$data = "SELECT * FROM  `SeasonPricing` WHERE SeasonName = 'Off Season'";
		$query = mysql_query($data);
	
		$data2 = mysql_fetch_array($query);
	
		if (mysql_num_rows($query) > 0)
		{
			if ($Type == 'Rehearsal')
			{
				$Fee = $data2['RehearsalFee'];	
			}
			if ($Type == 'Wedding')
			{
				$Fee = $data2['WeddingFee'];	
			}
			if ($Type == 'Bonfire')
			{
				$Fee = $data2['BonfireFee'];	
			}
		}
	}

	return $Fee;
}


function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Reservation Summary</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/jqueryUI/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jqueryUI/jquery-ui.css" />
<script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
			$("#SendRequest").click(function() {
				//alert($("#ReservationDetail").html());
				$(".ChangeInfo").remove();
				$("#hEmailText").val($("#ReservationDetail").html());
				//alert($("#hEmailText").val());
				 $("#form1").submit();
			});
        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
</style>
</head>
<body>
<form  id="form1" action="ThankYou.php" method="post">
<div class="container">
<div id="ReservationDetail">
<h1>Wedding or Event Estimate Summary</h1>
<h3>You can accept this estimate by clicking the button below or you can make changes in each section until you have the estimate you want. 
An email summary will be sent to your email address. 
Please print out the page or take a screen shot to hold onto your information if you are not ready to reserve the date. 
Until you reserve the date your information is not stored and will be lost once you leave the site. 
This is not a binding estimate but allows us to start the planning process. 
After you have booked your reservation, please call the Wilburton Inn to confirm at 802.362.2500. 
</h3>
<br/>
<h3>Contact Information</h3> 
<a class="ChangeInfo" href="Background.php">Change</a><br />
<?php
$a = $_SESSION['Background'];
?>
<fieldset class="form-group">
    <label for="resDate">Name:</label>
    <span><?= $a['firstName'].' '.$a['firstName']; ?></span>
    <br />
    <label for="resDate">Address:</label>
    <span><?= $a['address1']." ".$a['address2']; ?></span>
	<span><?= $a['city'].", ".$a['state'].' '.$a['zip']; ?></span>
    <br />
    <label for="resDate">Email:</label>
    <span><?= $a['email']; ?></span>
	<br />
	<label for="resDate">Phone:</label>
    <span><?= $a['phone']; ?></span>
</fieldset>
<?
/*

foreach($_SESSION['RehearsalDinner'] as $key=>$value)
{
    
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
} 
*/
?>
<h3>Date of Your Wedding or Event</h3>
<a  class="ChangeInfo" href="DateSize.php">Change</a><br />
<?php
$a = $_SESSION['DateSize'];
$ReservationDate = $a['resDate'];
?>
<fieldset class="form-group">
<label>Date:</label>
<span><?= $a['resDate']; ?></span><br />
<label>Dinner Options:</label>
<span><?= rtrim($a['DinnerOptions'],','); ?></span><br />
</fieldset>
<?
if (isset($_SESSION['RehearsalDinner']))
{
    //print_r($_SESSION['RehearsalDinner']);
	$a = $_SESSION['RehearsalDinner'];
	$CategoriesArr = explode("|", ltrim($a["hMenuSelections"],'|'));
	
	$total = $a['hDinnerCostTotal'];
?>
	<h3>Rehearsal or Welcome Dinner</h3>
	<a  class="ChangeInfo"   href="RehearsalDinner.php">Change</a>
	<fieldset class="form-group">
		<label for="resDate">Number of People:</label>
		<span> <?= $a['NumPeople'] ?></span><br />
		<label>Dinner Name:</label>
		<span><?= $a['hDinnerTitle'] ?></span><br />
		<label>Menu Selections:</label><br />
<?
		foreach($CategoriesArr as $Cat)
		{
			$MenuItemsArr = explode("^", rtrim($Cat,'^'));

			if(count($MenuItemsArr) > 1)
			{
				echo "<span>".$MenuItemsArr[0]." -- ";
				for ($i=1;$i < count($MenuItemsArr);$i++)
				{
				    $MenuItemsArr[$i] = str_replace("1_","",$MenuItemsArr[$i]);
					$MenuItemsArr[$i] = str_replace("2_","",$MenuItemsArr[$i]);
					$MenuItemsArr[$i] = str_replace("3_","",$MenuItemsArr[$i]);
					if ($i == count($MenuItemsArr) - 1)
					{
						echo $MenuItemsArr[$i];
					}
					else
					{
						echo $MenuItemsArr[$i].", ";
					}
				}		
				echo "</span><br />";
			}
		}
		
		$RentalFee = GetRentalFee($ReservationDate, 'Rehearsal');
?>
	<br />
    <label>Bar Selection:</label><span>&nbsp;<?= $a['hBarTitle'] ?></span><br />
	<label>Dinner and Bar Fee:</label>
	<span><?= '$' . number_format($total, 0, '.', ','); ?></span><br />
	<label>Room Fee:</label>
	<span><?= '$' . number_format($RentalFee , 0, '.', ','); ?></span><br />
	<label>Total:</label>
	<span><?= '$' . number_format($RentalFee + $total, 0, '.', ','); ?></span><br />
	</fieldset>
<?

	$GrandTotal =  $GrandTotal + $RentalFee + $total;

}
?>
<?
if (isset($_SESSION['WeddingDinner']))
{
	
	$a = $_SESSION['WeddingDinner'];
	$CategoriesArr = explode("|", ltrim($a["hMenuSelections"],'|'));
	
	$total = $a['hDinnerCostTotal'] ;
?>
	<h3>Wedding or Event Dinner</h3>
	<a  class="ChangeInfo" href="WeddingDinner.php">Change</a><br />
	<fieldset class="form-group">
		<label for="resDate">Number of People:</label>
		<span> <?= $a['NumPeople'] ?></span><br />
		<label>Dinner Name:</label>
		<span><?= $a['hDinnerTitle'] ?></span><br />
		<label>Menu Selections:</label><br />
<?
		foreach($CategoriesArr as $Cat)
		{
			$MenuItemsArr = explode("^", rtrim($Cat,'^'));

			if(count($MenuItemsArr) > 1)
			{
				echo "<span>".$MenuItemsArr[0]." -- ";
				for ($i=1;$i < count($MenuItemsArr);$i++)
				{
				
					$MenuItemsArr[$i] = str_replace("1_","",$MenuItemsArr[$i]);
					$MenuItemsArr[$i] = str_replace("2_","",$MenuItemsArr[$i]);
					$MenuItemsArr[$i] = str_replace("3_","",$MenuItemsArr[$i]);
					if ($i == count($MenuItemsArr) - 1)
					{
						echo $MenuItemsArr[$i];
					}
					else
					{
						echo $MenuItemsArr[$i].", ";
					}
				}		
				echo "</span><br />";
			}
		}
		
		$RentalFee = GetRentalFee($ReservationDate, 'Wedding');
?>
	<br />
    <label>Bar Selection:</label><span>&nbsp;<?= $a['hBarTitle'] ?></span><br />
	<label>Dinner and Bar Fee:</label>
	<span><?= '$' . number_format($total, 0, '.', ','); ?></span><br />
	<label>Room Fee:</label>
	<span><?= '$' . number_format($RentalFee , 0, '.', ','); ?></span><br />
	<label>Total:</label>
	<span><?= '$' . number_format($RentalFee + $total, 0, '.', ','); ?></span><br />
	</fieldset>
<?
	$GrandTotal =  $GrandTotal + $RentalFee + $total;
}
?>

<?
if (isset($_SESSION['Bonfire']))
{
	$a = $_SESSION['Bonfire'];
	
	$total = $a['hDinnerCostTotal'];
?>
	<h3>Bonfire Menu</h3>
	<a  class="ChangeInfo" href="Bonfire.php">Change</a><br />
	<fieldset class="form-group">
		<label for="resDate">Number of People:</label>
		<span> <?= $a['NumPeople'] ?></span><br />
		<label>Menu Selections:</label><br />
<?
		
			$MenuItemsArr = explode("^", rtrim($a['hMenuSelections'],'^'));

			if(count($MenuItemsArr) > 1)
			{
				echo "<span>".$MenuItemsArr[0]." -- ";
				for ($i=1;$i < count($MenuItemsArr);$i++)
				{
					if ($i == count($MenuItemsArr) - 1)
					{
						echo $MenuItemsArr[$i];
					}
					else
					{
						echo $MenuItemsArr[$i].", ";
					}
				}		
				echo "</span><br />";
			}
			else
			{
				echo "<span>No Selections</span><br />";
			}
			
			$RentalFee = GetRentalFee($ReservationDate, 'Bonfire');
		
?>
   <br />
    <label>Bar Selection:</label><span>&nbsp;<?= $a['hBarTitle'] ?></span><br />
	<label>Bar Fee:</label>
	<span><?= '$' . number_format($total, 0, '.', ','); ?></span><br />
	<label>Bonfire Fee:</label>
	<span><?= '$' . number_format($RentalFee , 0, '.', ','); ?></span><br />
	<label>Total:</label>
	<span><?= '$' . number_format($RentalFee + $total, 0, '.', ','); ?></span><br />
	</fieldset>
<?
	$GrandTotal =  $GrandTotal + $RentalFee + $total;
}
?>


<?
if (isset($_SESSION['Brunch']))
{
	$a = $_SESSION['Brunch'];
	
	$total = $a['hDinnerCostTotal'];
?>
	<h3>Brunch</h3>
	<a  class="ChangeInfo" href="Brunch.php">Change</a><br />
	<fieldset class="form-group">
		<label for="resDate">Number of People:</label>
		<span> <?= $a['NumPeople'] ?></span><br />
		<label>Menu Selections:</label><br />
<?
		
			$MenuItemsArr = explode("^", rtrim($a['hMenuSelections'],'^'));

			echo "<span>".$MenuItemsArr[0]." -- ";
			for ($i=1;$i < count($MenuItemsArr);$i++)
			{
				if ($i == count($MenuItemsArr) - 1)
				{
					echo $MenuItemsArr[$i];
				}
				else
				{
					echo $MenuItemsArr[$i].", ";
				}
			}		
			echo "</span><br />";
		
?>
	<label>Brunch Fee:</label>
	<span><?= '$' . number_format($total, 0, '.', ','); ?></span><br />
	</fieldset>
<?
	$GrandTotal =  $GrandTotal + $total;
}
?>
<br />
<h2>Grand Total: <?= '$'.number_format($GrandTotal); ?></h2>
</div>
<br />
<h1>Book Your Reservation!</h1>
<h3>After you have booked your reservation, please call the Wilburton Inn to confirm at 802.362.2500. 
By booking this reservation, you will receive an email copy of the summary information and so will we. 
This summary estimate is not binding but allows us to reserve your date and start the discussion to help you achieve your dream wedding or event.
</h3>


<br />
  <input type="button" id="SendRequest" class="btn btn-sample" value="Book Your Reservation!" />
   <input type="hidden" id="hGrandTotal" name="hGrandTotal" value="<?= $GrandTotal ?>"/>
  <input type="hidden" id="hEmailText" name="hEmailText" />
 
<br />
<br />  
</div>
</body>
</html>
