<?php
session_start();
require "config.php";
require "admin/functions/redirct.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    redirect("index.php","Welcome Back");
    exit;
}

else if (isset($_POST['login'])) {
    $email = ($_POST["email_id"]);
    $pass = ($_POST["u_pass"]);
    $sql = "SELECT * FROM user WHERE email='$email' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['authn'] =true;
        $row = mysqli_fetch_assoc($result);

        if ($row['email'] === $email && $row['pass'] === $pass) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['id'] = $row['id'];
            redirect('index.php','Logged In!');
            exit();

        } else {
            $_SESSION['auth'] = false;
            redirect('index.php','Something went wrong');
            exit();
        }
    }
    else {
        redirect('index.php','Invalid Credentials');
        exit();
    }
}
else if (isset($_POST['register'])) {
    $uname = $_POST["u_name"];
    $u_pass = $_POST["u_pass"];
    $u_pass1 = $_POST["u_pass1"];
    $u_email = $_POST["u_email"];
    $exists = false;
    $user_check_query = "SELECT * FROM user WHERE email='$u_email' LIMIT 1";
    $search = mysqli_query($link, $user_check_query);
    $user = mysqli_fetch_assoc($search);
    if ($user) { 
        $exists = true;
        if ($user['email'] === $email_id) {
            redirect('index.php','User Already exist');
        }
    }
    if (($u_pass == $u_pass1) && $exists == false) {
        $sql = "INSERT INTO `user` (uname,email,pass) VALUES ('$uname','$u_email','$u_pass')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            redirect("index.php","Registered");
        }
    }
}
?>