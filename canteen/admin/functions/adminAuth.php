<?php 

session_start();
include('../config/dbcon.php');

if(isset($_POST['Login_btn'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $Login_query = "SELECT * FROM adminauth WHERE email = '$email' AND password = '$pass' ";

    $Login_query_run = mysqli_query($con, $Login_query);

    if(mysqli_num_rows($Login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($Login_query_run);
        $username = $userdata['name'];
        $role_as = $userdata['role'];

        $_SESSION['auth_user'] = [
            'name' => $username
        ];

        $_SESSION['role_as'] = $role_as;

        header('Location: ../panel/index.php');
    }
    else{
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../index.php');
    }
}

?>