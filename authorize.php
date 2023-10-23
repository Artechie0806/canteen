<?php 
session_start();
require "config.php"; 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
if(isset($_POST['login'])){
      $email=($_POST["email_id"]);
      $pass=($_POST["u_pass"]);
      $sql = "SELECT * FROM user WHERE email='$email' AND pass='$pass'";

      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['pass'] === $pass) {

                echo "<script>alert('Logged in!');</script>";

                $_SESSION['email'] = $row['email'];

                $_SESSION['uname'] = $row['uname'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();
            }
}
}
if(isset($_POST['register'])){
$email_id= $_POST["email_id"];
$u_pass= $_POST["u_pass"];
$u_pass1= $_POST["u_pass1"];
$email_id= $_POST["email_id"];
$exists=false;
$user_check_query = "SELECT * FROM user WHERE email='$email_id' LIMIT 1";
$search = mysqli_query($link, $user_check_query);
$user = mysqli_fetch_assoc($search);
if ($user) { // if user exists
$exists=true;
if($user['email'] === $email_id) {
      echo'<script>alert("user email already exists")</script>';
      header('location:index.php');
      
}
}
if(($u_pass == $u_pass1) && $exists==false ){
$sql="INSERT INTO `user` (uname,email,pass) VALUES ('$email_id','$email_id','$u_pass')";
$result= mysqli_query($link,$sql);
if($result){
   echo "<script>alert('account created');</script>";  
 header('location:index.php');
}
}
}
?>