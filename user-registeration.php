<?php

    include('./connection.php');

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];
    $password = md5($_POST['password']);
    $doi = $_POST['doi'];
    $yop = $_POST['yop'];
    $journal_type = $_POST['journal_type'];
    $status = $_POST['status'];

    if($status == 1){
        $paper = $_FILES['paper']['name'];
    }else{
        $paper = $_POST['paper'];
    }

    if(isset($_FILES['paper'])){
      $file_name = $_FILES['paper']['name'];
      $file_tmp = $_FILES['paper']['tmp_name'];

      $file_name = $doi.$file_name;      
      move_uploaded_file($file_tmp,"assets/img/papers/".$file_name);
    }

    $query1 = "INSERT INTO users(`username` ,`full_name`,`email`,`qualification`,`password`,`status`)VALUES('$username','$fullname','$email','$qualification','$password','$status')";
    $result1 = mysqli_query($conn,$query1);

    if($status == 1){
        $query2 = "INSERT INTO doi_paper(`username`,`doi`,`paper`,`yop`,`journal_type`) VALUES('$username','$doi','$paper','$yop','$journal_type')";
        $result2 = mysqli_query($conn,$query2);
    }

    if($result1 || $result2){
        echo 'success';
    }else{
        echo 'error';
    }

?>