<?php

    include('./connection.php');
    $s_username = $_POST['s_username'];

    $result = mysqli_query($conn,"SELECT * FROM student_guide WHERE s_username = '$s_username'");

    $row = mysqli_fetch_array($result);

    $req_status = $row['req_stats'];

    echo $req_status;