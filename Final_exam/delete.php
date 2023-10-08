<?php 
include("conn.php");

$my_data = $_GET['cd'];
$delete_query = $conn->query("DELETE FROM `markups_user` WHERE `user_id` = '$my_data'");

if($delete_query){
    echo"
        <script>
                window.alert('Successfully Deleted');
                window.location.href = 'index.php';
        </script>
        ";
        header("Location: index.php");
}else{
    echo"
    <script>
         window.alert('Error')
         window.location.href = 'index.php'
    </script>
    ";
}


?>
