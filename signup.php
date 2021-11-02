<?php
// session_start();
include('firstimport.php');

$error_fname='';
$error_lname='';
$error_pass= '';
$error_pass3='';
$emailErr= '';
$error_mobile= '';
$error_answer= '';
$error_gender= '';
$error_mrt = '';
$error_question = '';

if (isset($_POST['done']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['psd'];
$pass2=$_POST['cpsd'];
$mail=$_POST['eid'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$ans=$_POST['ans'];

  

 
 $number = preg_match('@[0-9]@', $pass);
 $uppercase = preg_match('@[A-Z]@', $pass);
 $lowercase = preg_match('@[a-z]@', $pass);
 $specialChars = preg_match('@[^\w]@', $pass);

 if(empty($fname)) {
	$error_fname=  "<p class='error'>Please enter your first  name.</p>";
	}
	if(empty($lname)){
		$error_lname=  "<p class='error'>Please enter your last name.</p>";
	}
	if(strlen($pass) < 7 || !$number || !$uppercase || !$lowercase || !$specialChars) {
		 $error_pass =  "<p>Password must be at least 7 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.</p>";
		 }
		 if($pass != $pass2) {
	$error_pass3=  "<p class='error'> password and confirm password are not match</p>";
	}
	if(empty($mail)) {
		$emailErr = "Email is required";
 }
 if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$mail)) {
	$emailErr = "Email is not valid";
 }
 

	if(empty($mobile)){
	$error_mobile= "<p class='error'>Please enter valide Mobile number</p>";	
	}
	if(!preg_match('/^[0-9]{10}+$/', $mobile) ||strlen($mobile) < 10){
		$error_mobile= "<p class='error'>Please enter valide Mobile number</p>";
	}
	if(empty($ans)) {
	$error_answer=  "<p class='error'>Please enter your answer.</p>";
	}
	if(!isset($_POST['gnd'])){
		 $error_gender = "<p>You forgot to select your Gender!</p>";
		 }
		 if(!isset($_POST['mrt'])){
		 $error_mrt = "<p>You forgot to select your maritial status</p>";
		 }
		 if(!isset($_POST['ques'])){
		 $error_question = "<p>You forgot to select your Questions!</p>";
		 }
		 
		
		 
		 else{
			$gender=$_POST['gnd'];
			$marital=$_POST['mrt'];
			$ques=$_POST['ques'];

			mysqli_select_db($conn,"$db_name")or die("cannot select DB");
		

		 $myemail = "select * from users where email ='$mail' OR mobile = '$mobile'";
			$utsav = mysqli_query($conn,$myemail);
     $count =  mysqli_num_rows($utsav);

		 if($count > 0){
			 echo  '<script>alert("user already exit"); </script>';

		 }
		 else{
			$q = " INSERT INTO users (f_name,l_name,password,email,gender,marital,dob,mobile,ques,ans,role_id)
		VALUES ('$fname','$lname','$pass','$mail','$gender','$marital','$dob','$mobile','$ques','$ans',2)";
		
		if (mysqli_query($conn, $q)) {
		 echo "New record insert successfully";
		 }
		 else{
			echo "Error: " . $q . "<br>" . mysqli_error($conn);
		 }
		}
		}
}


?>

<!DOCTYPE html>
<html>

<head>
	<title> Registration </title>
	<link rel="shortcut icon" href="img/favicon.png">
	</link>
	<meta http-equiv="content-Type" content="text/html" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1,user-scalable=0" />
	<meta name="description" content="global" />
		<meta http-equiv="X-UA-compatible" content="IE=edge,chrome=1" />
	
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			//alert($(window).width());
			var x = (($(window).width()) - 1024) / 2;
			//alert(x);
			$('.wrap').css("left", x + "px");
		});
	</script>
	
	<style>
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
		input[type=submit],
		input[type=reset] {
			background-color: #04AA6D;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			margin-left: 50px;

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
			input[type=submit],
			input[type=reset] {
				width: 100%;
				margin-top: 0;
			}
		}

		select {
			display: inline-block;
			width: 80%;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: 70%;

		}

		/*.error{
			color:red;
		}
	*/
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
					<li class="nav-item">
						<a class="nav-link" href="#">Find Train</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Reservation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">About</a>
					</li>
				</ul>

			</div>
		</nav>
	</div>

	<!-- card -->
	<div class="container mt-3">
		<div class="card">
			<div class="card-header bg-success">
				<p class="h4 text-center text-white">SignUp</p>
			</div>
			<form name="signup" method="post" action = "#">
				<div class="card-body text-center">

					<div class="row">
						<div class="col-25">
							<label>First Name</label>
						</div>
						<div class="col-75">
							<input type="text" name="fname" placeholder="Enter the First name" autocomplete="off" ><span style="color:red;"> <?php  echo $error_fname; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Last Name</label>
						</div>
						<div class="col-75">
							<input type="text" name="lname" placeholder="Enter the Last name" autocomplete="off"><span style="color:red;"> <?php  echo $error_lname; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Email ID</label>
						</div>
						<div class="col-75">
							<input type="text" name="eid" placeholder="Enter the email id" autocomplete="off"><br/><span style="color:red;"> <?php  echo $emailErr; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Password</label>
						</div>
						<div class="col-75">
							<input type="password" name="psd" placeholder="Enter the password" autocomplete="off" ><span style="color:red;"> <?php  echo $error_pass; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Confirm Password</label>
						</div>
						<div class="col-75">
							<input type="password" name="cpsd" autocomplete="off" placeholder="Re-type the password"><span style="color:red;"> <?php  echo $error_pass3; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Gender</label>
						</div>
						<div class="col-75">
							<select name="gnd">
							    <option selected="true" disabled="disabled">-- select a gender --</option>
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
								<option value="transgender">TRANSGENDER</option>
							</select>
							<span style="color:red;"> <?php  echo $error_gender; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Marital Status</label>
						</div>
						<div class="col-75">
							<select name="mrt">
							<option selected="true" disabled="disabled">-- select a Marital status --</option>
								<option value="married">Married</option>
								<option value="unmarried">Unmarried</option>
							</select>
							<span style="color:red;"> <?php  echo $error_mrt; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Date of Birth</label>
						</div>
						<div class="col-75">
							<input type="date" name="dob" max="<?php echo date('Y-m-d', time() - 60 * 60 * 24 * 365 * 18); ?>" value="<?php echo date('Y-m-d', time() - 60 * 60 * 24 * 365 * 18); ?>">
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Mobile No.</label>
						</div>
						<div class="col-75">
							+91 <input type="number" name="mobile" autocomplete="off" placeholder=" Enter your mobile no." ><span style="color:red;"> <?php  echo $error_mobile; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Security Question</label>
						</div>
						<div class="col-75">
							<select name="ques">
							<option selected="true" disabled="disabled">select any question</option>
								<option value="What is your pets name ?">What is your pet name ?</option>
								<option value="What was the name of your first school?">What was the name of your first school?</option>
								<option value="What is your favorite hero?">What is your favorite hero?</option>
								<option value="What is your favorite movie?">What is your favorite movie?</option>
							</select>
							<span style="color:red;"> <?php  echo $error_question; ?></span>
						</div>
					</div>

					<div class=" row">
						<div class="col-25">
							<label>Your Answer</label>
						</div>
						<div class="col-75">
							<input type="text" name="ans" autocomplete="off" placeholder="Enter the your answer">
						</div><span style="color:red;"> <?php  echo $error_answer; ?></span>
					</div>

					<!-- <div class=" row">
						<div class="col-25">

						</div>
						<div class="col-75">
							Already have an account?&nbsp;<a href="login1.php"><b style="color:green;"><u>Sign in</u></b></a>
						</div>
					</div> -->
					<div class=" row">
						<div class="col-4">
						</div>
						<div class="col-4">
							<input type="submit" name="done">
							<input type="reset" value="Reset">
						</div>
						<div class="col-4">

						</div>
					</div>
				</div>

		</div>
	</div>
	</div>
	</div>


	</form>
	</div>
	</div>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<?php   include('footer.php');     ?>
	</br>
	</div>
</body>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>