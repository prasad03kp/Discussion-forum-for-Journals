<?php

include('connection.php');

$username = $_POST['username'];

$query = "SELECT username FROM users WHERE username = '$username'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1){
    echo 'exists';
}else{
    echo 'not-exists';
}