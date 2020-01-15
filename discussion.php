<?php

    include('./connection.php');
    $username = $_GET['username'];
    $doi = $_GET['doi'];
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
   .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 500px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
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
          <a class="dropdown-item" href="logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:0%;">
    <div class="panel-collapse">
        <div class="panel-body">
            <ul class="chat">
                <li class="left clearfix"><span class="chat-img pull-left">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="right clearfix"><span class="chat-img pull-right">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="left clearfix"><span class="chat-img pull-left">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="right clearfix"><span class="chat-img pull-right">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="left clearfix"><span class="chat-img pull-left">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="right clearfix"><span class="chat-img pull-right">
                    <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                            dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>

                <?php
                        $result = mysqli_query($conn,"SELECT * FROM discussion_forum WHERE `doi` = '$doi' ORDER BY time");

                        while($row = mysqli_fetch_array($result)){
                            $username = $row['username'];
                            $msg = $row['message'];
                            $time = $row['time'];

                            echo '
                            <li class="right clearfix"><span class="chat-img pull-right">
                                <img src="assets/img/user.jpg" alt="User Avatar" class="img-circle" style="width:50px;height:50px;"/>
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$time.'</small>
                                        <strong class="pull-right primary-font">'.$username.'</strong>
                                    </div>
                                    <p>
                                        '.$msg.'
                                    </p>
                                </div>
                            </li>
                            ';

                        }
                ?>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                <span class="input-group-btn">
                    <button class="btn btn-outline-success waves-effect btn-sm" id="btn-chat">
                        Send <i class="far fa-paper-plane"></i></button>
                </span>
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
            $(document).ready(function(){
                $('#btn-chat').click(function(e){
                    e.preventDefault();

                    let msg = $('#btn-input').val();
                    let username = <?php echo json_encode($_GET['username']); ?>;
                    let doi = <?php echo json_encode($doi); ?>;

                    let data = {
                        msg: msg,
                        username: username,
                        doi: doi
                    }

                    $.ajax({
                        type: 'POST',
                        url: 'storeMessage.php',
                        data: data,

                        success: function(response){
                            console.log(response);
                            if(response === "success"){
                                window.location.reload();
                            }else{

                            }
                        },
                        error: function(response){

                        }
                    })
                });
            })
        </script>
        
        </body>
</html>