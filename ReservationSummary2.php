<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', '1');


echo '<pre>';
var_dump($_SESSION);
echo '</pre>';




function GetRentalFee($Date, $Type)
{
	$Fee = 1000;
	
	return $Fee;
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

<h1>Reservation Summary</h1>


<h3>Background Information</h3> 
<a href="Background.php">Change</a><br />
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


<h3>Date and Dinner Options </h3>
<a href="DateSize.php">Change</a><br />
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
	$a = $_SESSION['RehearsalDinner'];
	$CategoriesArr = explode("|", ltrim($a["hMenuSelections"],'|'));
	
	$total = $a['hDinnerCostTotal'];
?>
	<h3 >Rehearsal Dinner</h3>
	<a   href="RehearsalDinner.php">Change</a>
	
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
?>		
		<br />
    <label>Bar Selection:</label><span>&nbsp;<?= $a['hBarTitle'] ?></span><br />
	<label>Dinner and Bar Fee:</label>
	<span><?= '$' . number_format($total, 0, '.', ','); ?></span><br />
	<label>Room Fee:</label>
	<span><?= '$' . number_format(GetRentalFee($ReservationDate, 'Rehearsal'), 0, '.', ','); ?></span><br />
	</fieldset>
<?
}
?>


<br />
<br />
<br />
  <a href="ThankYou.php" class="btn btn-primary">Request The Reservation</a>
<br />
<br />  
</div>
</body>
</html>
