<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', '1'); 

echo "here";
echo "here2";
if (isset($_POST["formName"]) && !empty($_POST["formName"])) {
    switch ($_POST["formName"]) {
    case "RehearsalDinner":
        echo "re dinner";
        break;
	case "WeddingDinner":
        nofuncton();
        break;
	case "Bonfire":
       
        break;	
	case "Brunch":
		
        break;	
	}   
}
?>