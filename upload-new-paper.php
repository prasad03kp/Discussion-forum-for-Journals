<?php

    include('./connection.php');
    
    $doi = $_POST['doi'];
    $yop = $_POST['yop'];
    $journal_type = $_POST['journal_type'];
    $username = $_POST['username'];

    $paper = $_FILES['paper']['name'];

    if(isset($_FILES['paper'])){
      $file_name = $_FILES['paper']['name'];
      $file_tmp = $_FILES['paper']['tmp_name'];

      $file_name = $doi.$file_name;      
      move_uploaded_file($file_tmp,"assets/img/papers/".$file_name);
    }

    $query2 = "INSERT INTO doi_paper(`username`,`doi`,`paper`,`yop`,`journal_type`) VALUES('$username','$doi','$file_name','$yop','$journal_type')";
    $result2 = mysqli_query($conn,$query2);

    if($result2){
        echo 'success';
    }else{
        echo 'error';
    }
?>