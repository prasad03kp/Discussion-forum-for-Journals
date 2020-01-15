<?php

    include('./connection.php');

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }else{
        echo 'error';
    }
    
?>