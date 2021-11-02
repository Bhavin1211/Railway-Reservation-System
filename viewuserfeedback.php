<?php
session_start();

require('firstimport.php');

mysqli_select_db($conn, "$db_name") or die("cannot select db");
$sql = "SELECT *  FROM contacts";
$result = mysqli_query($conn,$sql);

if (isset($_GET['del'])) {

	$id = $_GET['del'];
	$sql = "DELETE FROM contacts WHERE id='$id'";
	if ($conn->query($sql)) {
		header('location:viewuserfeedback.php');
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View User Feedback</title>
  <link href="css/Default.css" rel="stylesheet">
	</link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
					<p class="h4 text-center text-white">User Feedback</p>
				</div>
				<div class="card-body">
					<div class="table">
						<table class="table table-bordered table-inverse table-dark table-hover">
							<thead>
								<tr>
									<th class="text-center">SNo.</th>
									<th class="text-center"> Name</th>
								  <th class="text-center">Email</th>
									<th class="text-center">Mobile</th>
									<th class="text-center">Subject</th>
									<th class="text-center">Message</th>
                  <th class="text-center">Delete</th>
								</tr>

							</thead>
							<?php

							$n = 1;
							while ($row = mysqli_fetch_array($result)) {

							?>

								<tr class="text-error">
									<td class="text-center"> <?php echo $n++; ?> </td>
									<td class="text-center"> <?php echo $row['full_name']; ?> </td>
									<td class="text-center"> <?php echo $row['email']; ?> </td>
									<td class="text-center"> <?php echo $row['mobile']; ?> </td>
									<td class="text-center"> <?php echo $row['subject']; ?> </td>
									<td class="text-center"> <?php echo $row['message']; ?> </td>
									<td class="text-center"><a href="viewuserfeedback.php?del=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete Feedback Message? ');" title="Delete">Delete Feedback </a> </td>



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
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>