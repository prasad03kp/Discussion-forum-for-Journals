<?php
    include('./connection.php');

    $s_username = $_POST['username'];

    $result = mysqli_query($conn,"UPDATE student_guide SET req_stats = 'accepted' WHERE s_username = '$s_username'");

    if($result){
        echo "success";
    }else{
        echo "error";
    }
?>