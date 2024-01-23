<?php 
include("../functions/redirct.php");

if(isset($_SESSION['auth'])){}
else{
    $_SESSION['message'] = 'You are not authorized to access without login';
    header('Location: ../index.php');
}

?>