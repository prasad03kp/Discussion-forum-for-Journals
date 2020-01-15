<?php
 include('./connection.php');

 $username = $_GET['username'];
 session_start();
 $_SESSION['username'] = $username;


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
          <i class="fas fa-user"></i> <?php echo $username?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
        <a class="dropdown-item" href='guidePage.php?username=<?php echo $username;?>#home'>Home</a>
        <a class="dropdown-item" href='myPapers.php?username=<?php echo $username;?>#myPapers'>My Papers</a>
          <a class="dropdown-item" href='uploadNewpaper.php?username=<?php echo $username;?>#uploadNewpaper'>Upload new Paper</a>
          <a class="dropdown-item" href="logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
<table id="dtBasicExample" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Username

      </th>
      <th class="th-sm">Full Name

      </th>
      <th class="th-sm">Email address

      </th>
      <th class="th-sm">Qualification

      </th>
    </tr>
  </thead>
  <tbody>
     <?php
        $query = "SELECT * FROM student_guide INNER JOIN users ON student_guide.g_username = '$username' AND student_guide.s_username = users.username WHERE student_guide.req_stats = 'accepted'";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result)){
          $s_username = $row['s_username'];
          $fullname = $row['full_name'];
          $qualification = $row['qualification'];
          $email = $row['email'];
          
          echo '
          <tr>
              <td>'.$s_username.'</td>
              <td>'.$fullname.'</td>
              <td>'.$qualification.'</td>
              <td>'.$email.'</td>
          </tr>
          ';
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
<script>
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
    </body>
</html>