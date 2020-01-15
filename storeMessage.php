<?php

    include('./connection.php');

    $msg = $_POST['msg'];
    $doi = $_POST['doi'];
    $username = $_POST['username'];

    $result = mysqli_query($conn,"INSERT INTO discussion_forum(`doi`,`username`,`message`) VALUES('$doi','$username','$msg')");

    if($result){
        echo "success";
    }else{
        echo "error";
    }