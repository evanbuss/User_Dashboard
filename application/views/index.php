<?
	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <style>
        #footer {
            background-color: black;
            width: 100%;
            margin-top: 200px;
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
                        <a href="/"><h4 id="Kammer">Home</h4></a>
                    </li>
                    <li>
                        <a href="/login"><h4 id="Kammer">Sign In</h4></a>
                    </li>
                    <li>
                        <a href="/register"><h4 id="Kammer">Register</h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="/assets/img/user_dashboard.png" height="280" width="720" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1 id="SanFran">User Dashboard</h1>
                <p>A message board application built with PHP and Codeigniter. Users and Admins are able to post messages and comments to a message board. Users can post and view personal messages to other users and also have the ability to change their profile information. Admins have full control over all users and user information.</p>
                <a class="btn btn-primary btn-lg" href="/login/" id="color">Start</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>


        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h1 id="SanFran">Manage Users</h1>
                <p>Admin’s have a lot of control of the users on the dashboard application. Admins can control user information along with changing their passwords if they choose to. Users do not have these abilities they can only post messages and comments. </p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h1 id="SanFran">Leave Messages & Comments</h1>
                <p>Both users and admins are able to post messages and comments on a message board. Messages and comments can be seen by other users somewhat like a Facebook style message feed. </p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h1 id="SanFran">Edit User Information</h1>
                <p>Users can edit their own information. They can change their name, email and their password if they choose. Admins have the capabilities to change any user’s information.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

        <!-- Footer -->
         <footer class="footer" id="footer">
             <div class="container-fluid">
                <img src="/assets/img/logo.png" height="50" alt="footer-logo">
                <p class="pull-right" id="footer-text"> User Dashboard </p>
             </div>
         </footer>



    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>



</body>
</html>