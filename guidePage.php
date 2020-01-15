<?php
 include('./connection.php');

 $username = $_GET['username'];
 session_start();
 $_SESSION['username'] = $username;

 $getRequests = mysqli_query($conn,"SELECT * FROM student_guide WHERE `g_username` = '$username' AND `req_stats` = 'pending' ");
$count = mysqli_num_rows($getRequests);

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
    <li class="nav-item">
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#basicExampleModal">
      <i class="far fa-bell"></i> <span class="badge badge-danger ml-2"><?php echo $count; ?></span>
    </button>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?php echo $username?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href='myTeam.php?username=<?php echo $username;?>#myPapers'>My Team</a>
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
      <th class="th-sm">Research Title

      </th>
      <th class="th-sm">Author Name

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
        $query = "SELECT * FROM doi_paper INNER JOIN users ON doi_paper.username = users.username WHERE doi_paper.username != '$username' ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result)){
          $fullname = $row['full_name'];
          $doi = $row['doi'];
          $paper = $row['paper'];
          $yop = $row['yop'];
          $journal_type = $row['journal_type'];
          
          echo '
          <tr>
              <td>'.$journal_type.'</td>
              <td>'.$fullname.'</td>
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

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">All Requests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
          <thead class="black white-text">
            <tr>
              <th scope="col">Name</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($row = mysqli_fetch_array($getRequests)){
                $student_name = $row['s_username'];
                echo '
                <tr>
                  <td>'.$student_name.'</td>
                  <td><button type="button" class="btn btn-sm btn-outline-success waves-effect acceptRequest" data-sname='.$student_name.'> add <i class="fas fa-plus-circle"></i></button></td>
                </tr>
                ';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
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

      $('.acceptRequest').click(function(e){
        e.preventDefault();

        let s_username = $(this).data('sname');

        let data = {
          username: s_username
        }

        $.ajax({
            type: 'POST',
            url: 'acceptRequest.php',
            data: data,

            success: function(res){
              if (res == 'success') {
						Swal.fire(
							'Success',
							'Request Accepted successfully',
							'success'
						)
						setTimeout(function(){
							window.location.reload();
						},2000);
					} else {
						Swal.fire(
							'Oops...!',
							'Error while accepting request',
							'error'
						)
					}
				},

				error: function (res) {
					Swal.fire(
						'Oops...!',
            'Error while accepting request',
						'error'
					)
				}
        });
      });
    });
</script>
    </body>
</html>