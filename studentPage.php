<?php

    include('./connection.php');

    $username = $_GET['username'];
    session_start();
    $_SESSION['username'] = $username;

    $query = "SELECT * FROM student_guide WHERE s_username = '$username' ";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($result);

    $g_username = "";

    if($g_username != ""){
        $g_username = $row['g_username'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
<link href="assets/css/datatables.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">

<style>
    .table,th,td{
        text-align:center;
    }
    </style>
    </head>
    <body>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
  <a class="navbar-brand" href="#">E-Journals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?php echo $username; ?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="#">My account</a>
          <a class="dropdown-item" href="logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Email

      </th>
      <th class="th-sm">Qualification

      </th>
      <th class="th-sm">Paper Published

      </th>
      <th class="th-sm">

      </th>
    </tr>
  </thead>
  <tbody>
    <?php
        $query = "SELECT DISTINCT users.username,email,qualification,count FROM users INNER JOIN doi_paper ON users.username = doi_paper.username";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result)){
            $name = $row['username'];
            $email = $row['email'];
            $qualification = $row['qualification'];
            $count = $row['count'];

            echo "
                <tr>
                    <td>".$name."</td>
                    <td>".$email."</td>
                    <td>".$qualification."</td>
                    <td>".$count."</td>
                    <td><button class='btn btn-primary btn-sm sendRequest' data-guidename=$name>send request</button></td>
            ";
        }
    ?>
</tbody>
</table>
</div>
<!--/.Navbar -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script type="text/javascript"
		src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

      var username = <?php echo json_encode($_GET['username']); ?>;
      $('.sendRequest').click(function(e){
        let guideName = $(this).data('guidename');
        let userName = username;
        let status = 'pending';

        // console.log(typeof guideName +typeof userName +typeof status);
        let data = {
          guideName: guideName,
          userName: userName,
          status: status
        }
        $.ajax({
          type: 'POST',
          url: 'processRequest.php',
          data: data,

          success: function (response) {
            // console.log(JSON.stringify(response));
					if (response == 'success') {
						Swal.fire(
							'Success',
							'Request sent successfully',
							'success'
						)
						setTimeout(function(){
							window.location.reload();
						},2000);
					} else {
						Swal.fire(
							'Oops...!',
							'Error while sending request',
							'error'
						)
					}
				},

				error: function (response) {
					Swal.fire(
						'Oops...!',
            'Error while sending request',
						'error'
					)
				}
        });
      });
    });
</script>
    </body>
</html>