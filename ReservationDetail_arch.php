<?php
 include 'header.php';

	$hostname="localhost";
	$username="WeddingResUser";
	$password="W3ddingR3s";
	$dbname="WeddingRes";
	

	$DetailInfo = "";
	if(!empty($_GET)) {
		
		$DetailID = $_GET["ID"];
		
		
	
		mysql_connect($hostname,$username, $password) or die (mysql_error());
		mysql_select_db($dbname);
	

		
		
	
		$data = "select DetailInfo from ReservationDetails where ReservationDetailID = $DetailID";
	
		$query = mysql_query($data);
	
		$data2 = mysql_fetch_array($query);
	
		if (mysql_num_rows($query) > 0)
		{
			//$DetailInfo = htmlspecialchars_decode($data2['DetailInfo']);	
			//$DetailInfo = htmlentities(rawurldecode($data2['DetailInfo']), ENT_QUOTES, "UTF-8");
			$DetailInfo = $data2['DetailInfo'];
			//$DetailInfo = substr($DetailInfo, 0, -3);
			//echo $DetailInfo;
		}
		
	}
			
?>
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
			
			function LoadDetailInfo()
			{
				
				
				$("#ReservationDetail").html($("#ResValue").val());
				
				//$('#ReservationDetail').html($('ResValue').val().replace(/\n/g, "<br />"));
				
			
				
				//alert($("#ReservationDetail").html());
			}
			
			LoadDetailInfo();
        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
		
    }
	.container {
    width: 1370px !important;
}
	
</style>
</head>
<body>
<div class="container">
<div class="menu">
<?php include 'Menu.php';?>
</div>
<div id="ReservationDetail" ></div>
<input type="hidden" id="ResValue" value="<?= $DetailInfo ?>"/>
</div>
</body>
</html>