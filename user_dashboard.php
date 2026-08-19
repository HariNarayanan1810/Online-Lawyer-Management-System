<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		
	?>
	<!doctype html>
	<html lang="en">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<!-- Bootstrap CSS -->
			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<link rel="stylesheet" href="css/all.css">
			<link rel="stylesheet" href="css/simple-sidebar.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/media.css">
			<title></title>
		</head>
		<body>
			<header class="customnav bg-success">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-expand-lg ">
								<a class="navbar-brand cus-a" href="index.php">Lawyer Management System</a>
								
								
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav ml-auto ">
										<li class="">
											<a class="nav-link cus-a" href="#">Full Name: <?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?></a>
											</li>
										<li class="">
											<a class="nav-link cus-a" href="logout.php">Log Out</a>
										</li>
										
									</ul>
									
								</div>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<body>
				
				<div class="d-flex" id="wrapper">
					
					<!-- Sidebar -->
					<div class="bg-light border-right" id="sidebar-wrapper">
						<div class="sidebar-heading">My Profile</div>
						<div class="list-group list-group-flush">
							<a href="user_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
							<a href="lawyers.php" class="list-group-item list-group-item-action bg-light">Find Lawyers</a>
							<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
							<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a><!--booking page-->
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<!-- Page Content -->
					<div id="page-content-wrapper">
						<?php if(isset($_GET['done'])){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Welcome!</strong> You are login as a normal user.
							</div>";
						}?>
						<div class="container-fluid">
							<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
								<h1 class="mb-0">Available Lawyers</h1>
								<a href="searchLawyer.php" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp; Search Lawyers</a>
							</div>
							<div class="row">
								<?php
									$conn = connect();
									$result = mysqli_query($conn,"SELECT * FROM user,lawyer WHERE user.u_id=lawyer.lawyer_id AND user.status='Active'");
									while($row = mysqli_fetch_array($result)) {
								?>
								<div class="col-md-4 mb-4">
									<div class="card h-100" style="width: 18rem;">
										<img src="images/upload/20230505190118_21104.png" class="card-img-top cusimg img-fluid" alt="lawyer profile image">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></h5>
											<h6 class="card-title"><?php echo $row["speciality"]; ?></h6>
											<p class="card-text mb-1"><b>Experience:</b> <?php echo $row["practise_Length"]; ?></p>
											<p class="card-text mb-3"><b>City:</b> <?php echo $row["city"]; ?></p>
											<a class="btn btn-sm btn-info" href="single_lawyer.php?u_id=<?php echo $row["u_id"]; ?>"><i class="fa fa-calendar-check"></i>&nbsp; View & Book</a>
										</div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
					</div>
					<!-- /#page-content-wrapper -->
					
				</div>
				<!-- /#wrapper -->
				
				
				
			</body>
			<footer class="bg-success">
				<div class="container">
					<div class="row">
						<div class="col">
							<h5>All rights reserved 2023</h5>
						</div>
					</div>
				</div>
			</footer>
			<!-- Optional JavaScript -->
			<!-- jQuery -->
			
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		</body>
	</html>				
	<?php
		
	}else 
	header('location:login.php?deactivate');
?>
