<?php
	$user = $this->session->userdata('user');
	// var_dump($user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User Profile</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery Validations -->
    <script src="/assets/js/jquery.validate.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <style>
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
        var data = " <?php echo $user['permission'] ?>";
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
            <h3 class="pull-right" id="move-up"> <?= $user['first_name']." ".$user['last_name']; ?> </h3>
        </div>
        <!-- /.container -->
    </nav>

	<!-- error messages below -->
		<?
    		if($this->session->flashdata('edit_errors')) {
    			echo "<p>".$this->session->flashdata('edit_errors')."</p>";
    		}
		?>
		<?
    		if($this->session->flashdata('pass_errors')) {
    			echo "<p>".$this->session->flashdata('pass_errors')."</p>";
    		}
		?>
    <!-- permissions admin-->
        <?
            if($this->session->userdata['user']['permission'] == 9) {
                echo '<a class="pull-right" href="/dashboard/admin"><button class="btn" id="color">Go Back To Dashboard</button></a>';
            } else {
                echo '<a class="pull-right" href="/dashboard/"><button class="btn" id="color">Go Back To Dashboard</button></a>';
            }
        ?>
    <!-- Current User Info -->
        <div class="col-xs-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th id="SanFran"><h2><?=ucwords($user['first_name'].' '.$user['last_name'])?></h2></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Registered At:</td>
                    <td><?=date('M d Y',strtotime($user['created_at']))?></td>
                </tr>
                <tr>
                    <td>User ID:</td>
                    <td>
                        <?php
                            if($user['permission'] == '9') {
                                echo "Admin Level";
                            } else {
                                echo "User Level";
                            }
                         ?>
                    </td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><?=$user['email']?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?=$user['description']?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container-fluid">


	</div>
		<div class="col-xs-5">
		<h2 id="SanFran">Edit Info</h2>
			<form action="/main/edit_user/<?= $user['id'] ?>" method="post">
			 <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" name="email" id="email" required>
			  </div>
			  <div class="form-group">
			    <label>First Name:</label>
			    <input type="text" class="form-control" name="first_name" required>
			  </div>
				  <div class="form-group">
			    <label>Last Name:</label>
			    <input type="text" class="form-control" name="last_name" required>
			  </div>
                  <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" name="description" required>
              </div>
				<input class="btn" id="color" type="submit" value="Change Info">
			</form>
		</div>

		<div class="col-xs-5">
		<h2 id="SanFran">Change Password</h2>
			<form action="/main/edit_user_password/<?= $user['id'] ?>" method='post'>
			  <div class="form-group">
			    <label>Password:</label>
			    <input type="password" class="form-control" name="password" required>
			  </div>
				  <div class="form-group">
			    <label>Password Confirmation:</label>
			    <input type="password" class="form-control" name="confirm" required>
			  </div>
				<input type="hidden" name="id" value="<?=$user['id']?>">
				<input class="btn" id="color" type="submit" value="Change Password">
			</form>
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