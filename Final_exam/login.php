<?php
session_start();
include("conn.php");

if(isset($_POST['btn_login'])){
    $user_name = $_POST['txt_name'];
    $user_pass = $_POST['password'];

    $check_user = $conn->query("SELECT * FROM markups_user WHERE user_name = '$user_name'");
    if($check_user->num_rows > 0){
        $user_data = $check_user->fetch_assoc();
        $hashed_password = $user_data['user_pass'];

        if(password_verify($user_pass, $hashed_password)){
            $_SESSION['user_id'] = $user_data['user_id'];
            header("location: index.php");
            exit();
        } else {
            header("Location: index.php?login_error=1");
            echo "<script>window.alert('Login Failed. Invalid username or password');</script>";
            exit();
        }
    } else {
        header("Location: index.php?login_error=1");
        echo "<script>window.alert('Login Failed. Invalid username or password');</script>";
        exit();
    }
}   
?>
