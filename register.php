<!doctype html>
<html lang="en" class="fullscreen-bg">
	<head>
		<title>Please Login Here</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="assets/css/main.css">
		<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
		<link rel="stylesheet" href="assets/css/demo.css">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	</head>
	<body>
		<!-- WRAPPER -->
		<div id="wrapper">
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle">
					<div class="auth-box ">
						<div class="left">
							<div class="content">
								<form class="form-auth-small" action="member_register.php" method="post">
									<div class="form-group">
										<input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" required="">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" required="">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" required="">
									</div>
									<div class="form-group">
										Last Blood Donation Date<input type="date" class="form-control" name="date" id="date" placeholder="Enter Last Blood Donation Date" required="">
									</div>
									<div class="form-group">
										Blood Group
										<select class="custom-select" name="bloodgroup">
											<option value="" selected>Choose...</option>
											<option value="A+">A+</option>
											<option value="A-">A-</option>
											<option value="B+">B+</option>
											<option value="B-">B-</option>
											<option value="AB+">AB+</option>
											<option value="AB-">AB-</option>
											<option value="O-">O-</option>
											<option value="O+">O+</option>
										</select>
									</div>
									<div class="form-group">
										Division
										<select class="custom-select" name="division">
											<option value="" selected>Choose...</option>
											<?php
																include('connection.php');
																$result = mysqli_query($connection,"select * from Division");
																while($row = mysqli_fetch_array($result )) {
											?>
											<option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
											<?php }
											?>
											
										</select>
									</div>
									<div class="form-group">
										District
										<select class="custom-select" name="district">
											<option value="" selected>Choose...</option>
											<?php
																include('connection.php');
																$result = mysqli_query($connection,"select * from District");
																while($row = mysqli_fetch_array($result )) {
											?>
											<option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
											<?php }
											?>
											
										</select>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
									</div>
									<button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
									<div class="bottom">
										<span class="helper-text"><i class="fa fa-lock"></i> <a href="index.php">Are You A Member? </a></span>
									</div>
								</form>
							</div>
						</div>
						<div class="right">
							<div class="overlay"></div>
							<div class="content text">
								<h1 class="heading">Welcome Blood Links</h1>
								<p>Save a life Give Blood</p>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>