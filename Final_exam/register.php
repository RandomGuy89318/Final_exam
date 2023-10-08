<?php
session_start();
include("conn.php");

if(isset($_POST['btn_register'])){
    $user_name = $_POST['txt_name'];
    $user_pass = $_POST['password'];
    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

    $check_user = $conn->query("SELECT * FROM markups_user WHERE user_name = '$user_name'");
    if($check_user->num_rows > 0){
        echo "<script>window.alert('Username already Exists. Please choose another username.');</script>";
    } else {
        $insert_user = $conn->query("INSERT markups_user (user_name, user_pass) VALUES ('$user_name', '$hashed_password')");

        if($insert_user){
            $_SESSION['user_id'] = $conn->insert_id;
            echo "<script>window.alert('Registration successful.');</script>";
            header("Location: index.php");
            exit();
        } else {
            echo "<script>window.alert('Registration failed.');</script>";
        }
    }
}   
?>
