<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<?php
session_start();

echo "Background <br />";
 
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
 
/* foreach($_SESSION['Background'] as $key=>$value)
{
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
} 
  */

?>
 </body>
</html>