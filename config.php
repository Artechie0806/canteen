<?php 
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD',"");
define('DB_NAME','canteen');

$link=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($link === false)
{die("Error: couldnt connect to DB.".mysqli_connect_error());

}

?>