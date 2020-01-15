<?php

    include('./connection.php');

    $guideName = $_POST['guideName'];
    $userName = $_POST['userName'];
    $status = $_POST['status'];

    $query = "INSERT INTO student_guide(`s_username`,`g_username`,`req_stats`) VALUES('$userName','$guideName','$status')";
    $result = mysqli_query($conn,$query);

    if($result){
        echo 'success';
    }else{
        echo 'error';
    }
?>