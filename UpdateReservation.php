<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', '1');


if (isset($_POST["formName"]) && !empty($_POST["formName"])) {
	if ($_POST["formName"] == "Background" || $_POST["formName"] == "DateSize")
	{
		SetSessionVars($_POST["formName"]);
		
		if($_POST["updateSummary"] == "updateSummary")
		{
			header('Location: ReservationSummary.php');
			exit();
		}
		
		
		if($_POST["formName"] == "Background")
		{
			header('Location: DateSize.php');
			exit();
		}
		else
		{
			// if sessions no longer needed delete here
			$a = $_SESSION["DateSize"];
			if (isset($_SESSION['RehearsalDinner']) && strpos($a["DinnerOptions"],"RehearsalDinner") == -1)
			{
				unset($_SESSION['RehearsalDinner']);
			}
			if (isset($_SESSION['WeddingDinner']) && strpos($a["DinnerOptions"],"WeddingDinner") == -1)
			{
				unset($_SESSION['WeddingDinner']);
			}
			if (isset($_SESSION['Bonfire']) && strpos($a["DinnerOptions"],"Bonfire") == -1)
			{
				unset($_SESSION['Bonfire']);
			}
			if (isset($_SESSION['Brunch']) && strpos($a["DinnerOptions"],"Brunch") == -1)
			{
				unset($_SESSION['Brunch']);
			}
			
			
			$NextFormArr = explode(",", $a["DinnerOptions"]);
			//print_r($NextFormArr
			
			for ($i=0; $i < count($NextFormArr) ; $i++)
			{
				if (!isset($_SESSION[$NextFormArr[$i]]))
				{
					header('Location: '.$NextFormArr[$i].'.php');
					exit();
				}
			}
			
			
			// get session dinnerOptions into array
			// get first element and navigate there
		}
	}
	else
	{
	
		/*
		foreach ($_POST as $key => $value)
		echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
		*/
		
		
			// get session dinnerOptions into array
			// get element after current and navigate there
			// if end goto summary
			
			
			SetSessionVars($_POST["formName"]);
			//header('Location: ReservationSummary.php');
			//exit();
			
			// testing comment out
			
		if($_POST["updateSummary"] == "updateSummary")
		{
			header('Location: ReservationSummary.php');
			exit();
		}
			
			$a = $_SESSION["DateSize"];
			$a["DinnerOptions"] = rtrim($a["DinnerOptions"], ',');
			$NextFormArr = explode(",", $a["DinnerOptions"]);
			for ($i = 0; $i < count($NextFormArr) ; $i++) {
			   
			   
				if (($NextFormArr[$i] == $_POST["formName"]))
				{
					
					if ($i != (count($NextFormArr) - 1))
					{
						header('Location: '.$NextFormArr[$i + 1].'.php');
						exit();
					}
					else
					{
						header('Location: ReservationSummary.php');
						exit();
					}
					
				}
				
			}
			
			
	}


/*
    switch ($_POST["formName"]) {
    case "Background":
        SetSessionVars($_POST["formName"]);
        header('Location: DateSize.php');
		exit();
        break;
    case "DateSize":
		//print_r($_POST);
        SetSessionVars($_POST["formName"]);
		//header('Location: RehearsalDinnerQuestion.html');
        break;
    case "RehearsalDinner":
        SetSessionVars($_POST["formName"]);   
        header('Location: WeddingDinnerQuestion.html');		
        break;
	case "WeddingDinner":
        SetSessionVars($_POST["formName"]);
	    header('Location: BonfireMenuQuestion.html');	
        break;
	case "Bonfire":
        SetSessionVars($_POST["formName"]);
		header('Location: CheckoutBrunchQuestion.html');
        break;	
	case "Brunch":
        SetSessionVars($_POST["formName"]);
		header('Location: ReservationSummary.php');
        break;	
	case "CompleteReservation":
        header('Location: postvars.php');
        break;	    
	}   
	*/
	
}

function SetSessionVars($ResForm)  {   
    $a = array();
	foreach ($_POST as $key => $value)
		$a[$key] = $value;
 
	$_SESSION[$ResForm] = $a;

}

 
/* foreach($_SESSION['Background'] as $key=>$value)
{
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
}  */
 
 //foreach ($_POST as $key => $value)
 //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
 
?>
 