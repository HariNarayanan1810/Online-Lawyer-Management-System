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
								<a class="navbar-brand cus-a" href="#">Lawyer Management System</a>
								
								
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
							<a href="lawyer_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--lawyer dashboard page-->
							<a href="lawyer_edit_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--lawyer_edit_profile page-->
							<a href="lawyer_booking.php" class="list-group-item list-group-item-action bg-light">Booking requests</a><!--this page-->
						<!--	<a href="update_password_admin.php" class="list-group-item list-group-item-action bg-light">Update Password</a> -->						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<!-- Page Content -->
					<div id="page-content-wrapper">
						<?php if(isset($_GET['done'])){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Welcome!</strong> You are login as Lawyer.
							</div>";
						}?>
						<div class="container-fluid">
							<?php
								$conn = connect();
								$lawyer_id = $_SESSION['lawyer_id'];

								$totalResult = mysqli_query($conn,"SELECT COUNT(*) AS total FROM booking WHERE lawyer_id='$lawyer_id'");
								$totalBookings = mysqli_fetch_assoc($totalResult)['total'];

								$pendingResult = mysqli_query($conn,"SELECT COUNT(*) AS total FROM booking WHERE lawyer_id='$lawyer_id' AND status='Pending'");
								$pendingBookings = mysqli_fetch_assoc($pendingResult)['total'];

								$acceptedResult = mysqli_query($conn,"SELECT COUNT(*) AS total FROM booking WHERE lawyer_id='$lawyer_id' AND status='Accepted'");
								$acceptedBookings = mysqli_fetch_assoc($acceptedResult)['total'];

								$profileResult = mysqli_query($conn,"SELECT speciality, practise_Length, city FROM lawyer WHERE lawyer_id='$lawyer_id'");
								$profile = mysqli_fetch_assoc($profileResult);
							?>
							<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
								<h1 class="mb-0">Lawyer Dashboard</h1>
								<a href="lawyer_booking.php" class="btn btn-primary"><i class="fa fa-calendar-check"></i>&nbsp; View Booking Requests</a>
							</div>
							<div class="row">
								<div class="col-md-3 mb-3">
									<div class="card border-success h-100">
										<div class="card-body">
											<h6 class="card-title text-muted">Total Requests</h6>
											<h2 class="mb-0"><?php echo $totalBookings; ?></h2>
										</div>
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<div class="card border-warning h-100">
										<div class="card-body">
											<h6 class="card-title text-muted">Pending</h6>
											<h2 class="mb-0"><?php echo $pendingBookings; ?></h2>
										</div>
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<div class="card border-info h-100">
										<div class="card-body">
											<h6 class="card-title text-muted">Accepted</h6>
											<h2 class="mb-0"><?php echo $acceptedBookings; ?></h2>
										</div>
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<div class="card border-secondary h-100">
										<div class="card-body">
											<h6 class="card-title text-muted">Profile Status</h6>
											<h2 class="mb-0"><?php echo $_SESSION['status']; ?></h2>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4 mb-4">
									<div class="card h-100">
										<div class="card-body">
											<h5 class="card-title">Professional Details</h5>
											<p class="mb-1"><b>Speciality:</b> <?php echo $profile['speciality']; ?></p>
											<p class="mb-1"><b>Experience:</b> <?php echo $profile['practise_Length']; ?></p>
											<p class="mb-3"><b>City:</b> <?php echo $profile['city']; ?></p>
											<a href="lawyer_edit_profile.php" class="btn btn-sm btn-outline-success"><i class="fa fa-user-edit"></i>&nbsp; Edit Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-8 mb-4">
									<div class="card h-100">
										<div class="card-body">
											<h5 class="card-title">Recent Booking Requests</h5>
											<table class="table table-striped table-bordered table-responsive-md mb-0">
												<thead>
													<tr>
														<th>Client</th>
														<th>Date</th>
														<th>Description</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$recentResult = mysqli_query($conn,"SELECT first_Name,last_Name,date,description,booking.status as statuss
														FROM booking,client,user
														WHERE booking.client_id=client.client_id
														AND client.client_id=user.u_id
														AND booking.lawyer_id='$lawyer_id'
														ORDER BY booking.booking_id DESC
														LIMIT 5");
														while($row = mysqli_fetch_array($recentResult)) {
													?>
													<tr>
														<td><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></td>
														<td><?php echo $row["date"]; ?></td>
														<td><?php echo $row["description"]; ?></td>
														<td><?php echo $row["statuss"]; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /#page-content-wrapper -->
					
				</div>
				<!-- /#wrapper -->
				
				
				
			</body>
			<footer>
				<div class="container bg-success">
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
