<?php 
require "config.php";
$showalert=false;
$u_nameerr = $u_passerr = $u_pass2err ="";
$u_name= $_POST["u_name"];
$u_pass= $_POST["u_pass"];
$u_pass1= $_POST["u_pass1"];
$u_email= $_POST["u_email"];
$exists=false;
if(($u_pass == $u_pass1) && $exists==false ){
$sql="INSERT INTO 'user_info'('u_name','u_email','u_pass') VALUES ('$u_name','$u_email','$u_pass')";
$result= mysqli_query($link,$sql);
if($result){
    $showalert = true;
}

if($showalert){
echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong>Account created
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}


}

?>