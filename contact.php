<?php
session_start();
include('firstimport.php');

if(isset($_SESSION['name'])){}
	else{
		header("location:index2.php");
		
	}

$error_name='';
$error_email='';
$error_mobile= '';
$error_subject='';
$error_message= '';


if (isset($_POST['done']))
{

	$name=$_POST['name'];
	$email = $_POST['eid'];
	$mobile = $_POST['mobile'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


	if(empty($name)) {
		$error_name=  "<p class='error'>Please enter your full  name.</p>";
		}
		if(empty($email)) {
			$error_email = "Email is required";
	 }
	 if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)) {
		$error_email = "Email is not valid";
	 }
	 if(empty($mobile)){
		$error_mobile= "<p class='error'>Please enter valide Mobile number</p>";	
		}
		if(!preg_match('/^[0-9]{10}+$/', $mobile) ||strlen($mobile) < 10){
			$error_mobile= "<p class='error'>Please enter valide Mobile number</p>";
		}
		if(empty($subject)) {
			$error_subject=  "<p class='error'>Please enter the subject.</p>";
			}
    if(empty($message)) {
				$error_message=  "<p class='error'>Please enter your message.</p>";
				} 
	else{			
		$q = " INSERT INTO contacts (full_name, email, mobile, subject, message)VALUES('$name', '$email', '$mobile', '$subject', '$message')";
		
		if (mysqli_query($conn, $q)) {
			echo "New record insert successfully";
			}
			else{
			   echo "Error: " . $q . "<br>" . mysqli_error($conn);
			}
	}




}

	?>
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Contact</title>

	<link href="css/Default.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style type="text/css">
		@media (max-width:700px) {
			.abc {
				display: none;
			}
		}

		input[type=text],
		input[type=password],
		input[type=number],
		input[type=date],
		/* select, */
		textarea {
			width: 80%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			resize: vertical;
		}

		/* Style the label to display next to the inputs */
		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		} 

		/* Style the submit button */
		input[type=submit]
		 {
			background-color: #04AA6D;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			margin-left: 50px;
			margin-top :15px;

		}

		/* Style the container */
		.container {
			border-radius: 5px;
			/* background-color: #f2f2f2; */
			padding: 20px;
		}

		/* Floating column for labels: 25% width */
		.col-25 {
			float: left;
			width: 25%;
			margin-top: 6px;
		}

		/* Floating column for inputs: 75% width */
		.col-75 {
			float: left;
			width: 75%;
			margin-top: 6px;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {

			.col-25,
			.col-75,
			input[type=submit]
		    {
				width: 100%;
				margin-top: 0;
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
			<div class="abc col-12 col-sm-12 col-md 12 col-lg-4 col-xl-4 text-center">
				<h1 class="mt-3 text-left"><a href="index.php">Indian Railways</a></h1>
			</div>
			<!-- header button -->
      <div class="col-12 col-sm-12 col-md 12 col-lg-4 col-xl-4 mt-2">
			<?php
    
		if(isset($_SESSION['name']))
		{
		echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
		}
		?>
			
			
	</div>  
			<!-- header button end -->
			
		</div>

		<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2">
			<!-- <a class="navbar-brand" href="#">Navbar</a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="mynav">

				<ul class="navbar-nav mx-auto">

					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="train.php">Find Train</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="reservation.php">Reservation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
				</ul>

			</div>
		</nav>

		<!-- form start -->
		<div class="container mt-3">
			<div class="card">
			<div class="card-header bg-success">
				<p class="h3 text-center text-white">CONTACT FORM</p>
			</div>
			<form action="#" method="post">
  <div class="card-body text-center">

	<div class="row">
						<div class="col-25">
							<label> Name</label>
						</div>
						<div class="col-75">
							<input type="text" name="name" placeholder="Enter your Full name" autocomplete="off" ><br/><span style="color:red;"> <?php  echo $error_name; ?></span>
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Email</label>
						</div>
						<div class="col-75">
						<input type="text" name="eid" placeholder="Enter the email id" autocomplete="off">
						<br/><span style="color:red;"> <?php  echo $error_email; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Mobile No.</label>
						</div>
						<div class="col-75">
							<input type="number" name="mobile" autocomplete="off" placeholder=" Enter your mobile no." >
							<br/><span style="color:red;"> <?php  echo $error_mobile; ?></span>
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Subject </label>
						</div>
						<div class="col-75">
							<input type="text" name="subject" placeholder="Enter your subject" autocomplete="off" >
							<br/><span style="color:red;"> <?php  echo $error_subject; ?></span>
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Message </label>
						</div>
						<div class="col-75">
						<textarea id="message" id="message" class="input-block-level" name="message" autocomplete="off"   placeholder="write something..." style="height:150px; "></textarea>
						<br/><span style="color:red;"> <?php  echo $error_message; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-4">
						</div>
						<div class="col-4">
							<input type="submit" name="done">
							
						</div>

						
						
					</div>
					
				

	</div>
	</form>
			</div>
		<br/><br/>
		
	 <?php include('footer.php'); ?>
	<br/>
		</div>
		
		<!-- form end -->
	
</body>

<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>