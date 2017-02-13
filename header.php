<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$pageName = basename($_SERVER['PHP_SELF']);

if (!(isset($_SESSION['Authenticated']) && $_SESSION['Authenticated'] != '' && $pageName != "AdminLogin.php")) {
header ("Location: AdminLogin.php");
exit();
}
?>