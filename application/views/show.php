<?php
	$current = $this->session->userdata('user');
	// var_dump($user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <style>
		#box {
			height: auto;
			margin-top: 15px;
			background: whitesmoke;
			border-radius: 10px;
			box-shadow: 5px 5px 3px grey;
		}
		#color {
			width: 100px;
		}
		#message-font{
			font-family: 'SanFran';
		}
        #move-up {
            margin-top: -5%;
            color: grey;
            font-family: 'Kammerlander';
        }
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
    <script>
        var data = " <?php echo $current['permission'] ?>";
        console.log(data);
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
            <h3 class="pull-right" id="move-up"> <?= $current['first_name']." ".$current['last_name']; ?> </h3>
        </div>
        <!-- /.container -->
    </nav>

	<div class="main">
		<div class="col-xs-5">
			<table class="table table-striped">
				<thead>
					<tr>
						<th id="SanFran"><h2><?=ucwords($user['user']['first_name'].' '.$user['user']['last_name'])?></h2></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Registered At:</td>
						<td><?=date('M d Y',strtotime($user['user']['created_at']))?></td>
					</tr>
					<tr>
						<td>User ID:</td>
						<td><?=$user['user']['id']?></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><?=$user['user']['email']?></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><?=$user['user']['description']?></td>
					</tr>
				</tbody>
			</table>
		</div>
	<div class="col-xs-12">
		<h5>Leave A Message for <?=ucwords($user['user']['first_name'])?></h5>

		<form id="message" action="/main/post_private_message/<?= $user['user']['id'] ?>" method="post">
			<div class="form-group">
				<textarea id="textarea" type="text" name="message" cols="60"></textarea>
			</div>
				<input class="btn" id="color" type="submit" value="Post">
		</form>

		<?php
			foreach ($user['messages'] as $dat) {
				if($dat['user_id'] == $user['user']['id']) {
				 	echo '<div id="box" class="col-xs-8"><h4 id="message-font">'.$dat['message'].'</h4><br><p class="pull-right" id="move-up">- '.$dat['author'].'</p></div>';
				 }
			}
		 ?>

			   </p>
		</div>

		</div>
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