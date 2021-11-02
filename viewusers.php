<?php
session_start();

require('firstimport.php');

$tbl_name = "users";
mysqli_select_db($conn, "$db_name") or die("cannot select db");
$sql = "SELECT *  FROM $tbl_name";
$result = mysqli_query($conn, $sql);
// $row = mysqli_num_rows($result);
// $row = mysqli_fetch_array($result);
// echo "no " . $row;
if (isset($_GET['del'])) {

	$id = $_GET['del'];
	$sql = "DELETE FROM $tbl_name WHERE id='$id'";
	if ($conn->query($sql)) {
		header('location:viewusers.php');
	}
}





?>
<!DOCTYPE html>


<head>
	<title>View Users </title>
	<link rel="shortcut icon" href="images/favicon.png">
	</link>
	<meta http-equiv="content-Type" content="text/html" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1,user-scalable=0" />
	<meta name="description" content="global" />
	<meta name="author" content="Anupam Tiwari" />
	<meta name="distribution" content="global" />
	<meta http-equiv="X-UA-compatible" content="IE=edge,chrome=1" />
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/bootstrap.css" rel="stylesheet">
	</link> -->
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			var x = (($(window).width()) - 1024) / 2;
			$('.wrap').css("left", x + "px");
		});
	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>

	<style>
		@media (max-width:700px) {
			.abc {
				display: none;
			}
		}
	</style>
</head>

<body>
	<div class="container-fluid ">
		<div class="row">
			<div class="col-12 col-sm-12 col-md 12 col-lg-4 col-xl-4 text-center">
				<img src="img/logo.jpg" width="80" height="80" class="d-inline-block align-top" alt="" />
			</div>
			<div class="abc col-12 col-sm-12 col-md 12 col-lg-8 col-xl-8 text-center">
				<h1 class="mt-3 text-left"><a href="index.php">Indian Railways</a></h1>
			</div>
		</div>

		<!-- heading table -->
		<div class="container mt-3">
			<div class="card">
				<div class="card-header bg-success">
					<p class="h4 text-center text-white">Users Account History</p>
				</div>
				<div class="card-body">
					<div class="table">
						<table class="table table-bordered table-inverse table-dark table-hover">
							<thead>
								<tr>
									<th class="text-center">SNo.</th>
									<th class="text-center">First Name</th>
									<th class="text-center">Last Name</th>
									<th class="text-center">Email</th>
									<th class="text-center">Gender</th>
									<th class="text-center">Date Of Birth</th>
									<th class="text-center">Delete</th>
								</tr>

							</thead>
							<?php

							$n = 1;
							while ($row = mysqli_fetch_array($result)) {

							?>

								<tr class="text-error">
									<td class="text-center"> <?php echo $n++; ?> </td>
									<td class="text-center"> <?php echo $row['f_name']; ?> </td>
									<td class="text-center"> <?php echo $row['l_name']; ?> </td>
									<td class="text-center"> <?php echo $row['email']; ?> </td>
									<td class="text-center"> <?php echo $row['gender']; ?> </td>
									<td class="text-center"> <?php echo $row['dob']; ?> </td>
									<td class="text-center"><a href="viewusers.php?del=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete user account? ');" title="Delete">Delete Account </a> </td>



								</tr>

							<?php
							}
							?>
						</table>




					</div>

				</div>
			</div>
		</div>
</body>

</html>