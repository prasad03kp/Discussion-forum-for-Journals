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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">

    <style>
    .table,
    th,
    td {
        text-align: center;
    }

    .card {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
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
                        <i class="fas fa-user"></i> <?php echo $username;?> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                        aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href='guidePage.php?username=<?php echo $username;?>#home'>Home</a>
                        <a class="dropdown-item" href='myTeam.php?username=<?php echo $username;?>#myPapers'>My Team</a>
                        <a class="dropdown-item" href='myPapers.php?username=<?php echo $username;?>#myPapers'>My
                            Papers</a>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" id="studentList" style="display:none;">
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
        $query = "SELECT * FROM users INNER JOIN doi_paper ON users.username = doi_paper.username";
        $result = mysqli_query($conn,$query);

        // while($row = mysqli_fetch_array($result)){
        //     $name = $row['username'];
        //     $email = $row['email'];
        //     $qualification = $row['qualification'];
        //     $paper = "1";

        //     echo "
        //         <tr>
        //             <td>".$name."</td>
        //             <td>".$email."</td>
        //             <td>".$qualification."</td>
        //             <td>".$paper."</td>
        //             <td><button class='btn btn-primary btn-sm' data-username='$name'>send request</button></td>
        //     ";
        // }
    ?>
            </tbody>
        </table>
    </div>

    <!-- uploading new paper -->
    <div class="container" id="uploadNewPaper">
        <div class="card hoverable p-4">

            <p class="h4 mb-4">Upload New Paper</p>

            <input type="text" id="doi" class="form-control mb-4" placeholder="DOI">

            <input type="file" id="paper" required><br>

            <input type="text" id="yop" class="form-control mb-4" placeholder="Year of Publication">

            <input type="text" id="journal_type" class="form-control mb-4" placeholder="Research Title">

            <button class="btn btn-info btn-block my-4" id="upload" type="button"> Upload <i
                    class="fa fa-cloud-upload"></i></button>

        </div>
    </div>
    <!-- ./uploading new paper -->

    <!--/.Navbar -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js">
    </script>
    <script src="assets/js/datatables.min.js"></script>
    <script type="text/javascript"
		src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

        $('#upload').click(function(e) {
            e.preventDefault();

            let username = <?php echo json_encode($username); ?>;
            let doi = $('#doi').val();
            let paper = $('#paper')[0].files[0];
            let yop = $('#yop').val();
            let journal_type = $('#journal_type').val();

            let dataOb = {
                username: username,
                doi: doi,
                paper: paper,
                yop: yop,
                journal_type: journal_type
            };

            let data = new FormData();

            for (key in dataOb) {
                data.append(key, dataOb[key]);
            }

            $.ajax({
                type: 'POST',
                url: 'upload-new-paper.php',
                data: data,
                contentType: false,
                processData: false,

                success: function(response) {
                    if (response == 'success') {
                        Swal.fire(
                            'Success',
                            'Paper Uploaded successfully',
                            'success'
                        )
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        Swal.fire(
                            'Oops...!',
                            'Error while uploading',
                            'error'
                        )
                    }
                },

                error: function(response) {
                    Swal.fire(
                        'Oops...!',
                        'Error while uploading',
                        'error'
                    )
                }
            });
        });
    });
    </script>
</body>

</html>