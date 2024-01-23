<?php 
session_start();
include"admin/functions/redirct.php";

    if(isset($_SESSION['authn'])) {
        unset($_SESSION['authn']);
        redirect('index.php','Logout');
    }

?>