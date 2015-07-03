<?php
    // var_dump($data['current']);
 ?>


<!DOCTYPE html>
<html>
<head>
    <title>Message Board</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <script>
        var data = " <?php echo $data['current']['permission'];?>";
        $(document).ready(function(){
            if(data === " 9") {
                $('.admin').hide();
                $('.user').show();
            } else {
                $('.user').hide();
                $('.admin').show();
            }
        });
    </script>

    <style>
        #box {
            height: auto;
            margin-top: 15px;
            background: whitesmoke;
            border-radius: 10px;
            box-shadow: 5px 5px 3px grey;
        }
        #move-right {
            margin-left: 5%;
            width: 90%;
        }
        #move-down {
            margin-top: 25px;
            width: 50px;
        }
        #move-up {
            margin-top: -5%;
            color: grey;
            font-family: 'Kammerlander';
        }
        #move-text {
            margin-top: -25px;
            font-family: 'SanFran';
        }
        #color {
            width: 75px;
        }
        #width {
            width: 100%;
        }
        #footer {
            background-color: black;
            width: 100%;
        }
        #footer-text {
            color: grey;
            font-family: 'Kammerlander';
            font-size: 22px;
            margin-top: 15px;
        }
    </style>

</head>
<body>
<div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="/assets/img/logo.png" height="50" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/dashboard" class="admin"><h4 id="Kammer">Dashboard</h4></a>
                        <a href="/dashboard/admin" class="user"><h4 id="Kammer">Dashboard</h4></a>
                    </li>
                    <li>
                        <a href="/profile"><h4 id="Kammer">Profile</h4></a>
                    </li>
                    <li>
                        <a href="/messageBoard"><h4 id="Kammer">Message Board</h4></a>
                    </li>
                    <li>
                        <a href="/main/logoff"><h4 id="Kammer">Log Off</h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <h3 class="pull-right" id="move-up"> <?= $data['current']['first_name']." ".$data['current']['last_name']; ?> </h3>
        </div>
        <!-- /.container -->
    </nav>
<!-- Message Board -->
    <div class="jumbotron">
      <div class="container" id="width">
        <h1 id="SanFran">Message Board</h1>
        <p>Post messages and comments for everyone to see.</p>
            <div class="col-xs-10">
                <form id="message" action="/main/post_message/<?= $data['current']['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="message">Post A Message:</label>
                        <input type="text" name="message" class="form-control" id="logo">
                    </div>
                </div>
                <div class="col-xs-2" id="move-down">
                        <input class="btn" id="color" type="submit" value="Post">
                </form>
            </div>
      </div>
    </div>

<div class="container">
<?php

if (isset($data['messages'])) {

    foreach (array_reverse($data['messages']) as $message) {
    echo '<table class="table table-striped">
        <thead>
            <tr>
                <th>'.$message['author'].'</th>
            </tr>
        </thead>
        <tbody>'.
                 '<tr><td id="box" class="col-xs-8"><h4>'.$message['message'].'</h4><p id="move-text" class="pull-right">'.date('M d Y',strtotime($message['created_at'])).'</p></td></tr>'.
        '</tbody>
        </table>'.
        '<table class="table table-striped" id="move-right">
            <thead>
                <tr>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($data['comments'] as $comment) {
                    if($message['messages_id'] === $comment['messages_id']) {
                         echo '<tr><td id="box" class="col-xs-8"><h4>'.$comment['comment'].'</h4><p class="pull-right control-group">'.$comment['author'].", ".date('M d Y',strtotime($comment['created_at'])).'</p></td></tr>';
                    }
                }
            echo '</tbody>
        </table>';

    echo '<div class="col-xs-10">
        <form id="move-right" action="/main/post_comment/'.$data['current']['id'].'" method="post">
            <div class="form-group">
                <label for="comment">Post A Comment:</label>
                <input id="logo" type="text" name="comment" class="form-control">
            </div>
            <input type="hidden" name="message_id" value="'.$message['messages_id'].'">
        </div>
        <div class="col-xs-2" id="move-down">
                <input class="btn" id="color" type="submit" value="Post">
        </form>
    </div>';
            }
        }
         ?>



    </div>
</div>

    <!-- Footer -->
     <footer class="footer" id="footer">
         <div class="container-fluid">
            <img src="/assets/img/logo.png" height="50" alt="footer-logo">
            <p class="pull-right" id="footer-text"> User Dashboard </p>
         </div>
     </footer>

</body>
</html>