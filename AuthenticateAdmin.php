<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

	$hostname="WeddingRes.db.8866535.hostedresource.com";
	$username="WeddingRes";
	$password="Leon1717!";
	$dbname="WeddingRes";

	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
	$UserName = $_POST['UserName']; 
	$Password = $_POST['Password'];
	
	$data = "select * from Authentication where UserName = '$UserName' and Password = '$Password'";
	
	mysql_connect($hostname,$username, $password) or die (mysql_error());
	mysql_select_db($dbname);
	
    $query = mysql_query($data);
    //$data2 = mysql_fetch_array($query);
	
	if (mysql_num_rows($query)==0) 
	{ 
		header('Location: AdminLogin.php?ok=no');	
	}
	else
	{
		$_SESSION['Authenticated'] = "YES";
		header('Location: AdminRehDinner.php');	
	}
	
	
?>
 