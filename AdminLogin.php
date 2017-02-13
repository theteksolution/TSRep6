<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			
        });
</script>
<style type="text/css">
    .bs-example{
    	margin-top:20px;
    }
</style>
</head>
<body>
<form id="form1" action="AuthenticateAdmin.php" method="post">
<div class="container">
<h2>Admin Login</h2>
 <fieldset class="form-group">
    <label for="firstName">UserName</label>
    <input type="text" class="form-control" id="UserName" name="UserName" value="TestWeddingRes123"/>
  </fieldset>
<fieldset class="form-group">
    <label for="firstName">Password</label>
    <input type="password" class="form-control" id="Password" name="Password" value="TestWeddingRes123"/>
  </fieldset>
  <input type="submit"  class="btn btn-primary" value="Login" />
  </div>
  </form>
</body>
</html>
