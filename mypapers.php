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
        <a class="dropdown-item" href='myTeam.php?username=<?php echo $username;?>#myPapers'>My Team</a>
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
      <th class="th-sm">Research Title

      </th>
      <th class="th-sm">DOI Number

      </th>
      <th class="th-sm">Year Of Publication

      </th>
      <th class="th-sm">Paper

      </th>
      <th class="th-sm">Discuss

</th>
    </tr>
  </thead>
  <tbody>
     <?php
        $query = "SELECT * FROM doi_paper WHERE username = '$username' ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result)){
          $doi = $row['doi'];
          $paper = $row['paper'];
          $yop = $row['yop'];
          $journal_type = $row['journal_type'];
          
          echo '
          <tr>
              <td>'.$journal_type.'</td>
              <td>'.$doi.'</td>
              <td>'.$yop.'</td>
              <td><a href="assets/img/papers/'.$paper.'">Click Here  <i class="fas fa-angle-double-right"></i></a></td>
              <td> <a href="discussion.php?username='.$username.'&&doi='.$doi.'"> Discuss <i class="far fa-comments"></i></a> </td>
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