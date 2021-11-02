<?php
session_start();

if(isset($_SESSION['name'])){}
	else{
		header("location:index2.php");
		
	}
 // Table name
$name=$_SESSION['name'];

require('firstimport.php');

mysqli_select_db($conn,"$db_name") or die("cannot select db");

$result=mysqli_query($conn,"SELECT * FROM users WHERE f_name='$name'");
$row=mysqli_fetch_array($result);

//query2

// $error_currentpassword = '';
// $error_newpassword = '';
// $error_confirmpassword = '';

if (isset($_POST['submit']))
{
	$oldpwd=$_POST['currentPassword'];
	$newpsd=$_POST['newPassword'];
	$conpsd=$_POST['confirmPassword'];

	if(empty($oldpwd)) {
		$error_currentpassword=  "<p class='error'>Please enter your Current Password.</p>";
		}

		if(strlen($newpsd) < 7 || !$number || !$uppercase || !$lowercase || !$specialChars) {
			$error_pass =  "<p>Password must be at least 7 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.</p>";
			}
			if($newpsd != $conpsd) {
	 $error_pass3=  "<p class='error'> password and confirm password are not match</p>";
	 }
}

// if (count($_POST) > 0) {
// 	$result2 = mysqli_query($conn, "SELECT * from users WHERE f_name='$name'");
// 	$row = mysqli_fetch_array($result2);
// 	if ($_POST["currentPassword"] == $row["password"]) {
// 			mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE f_name='" . $_SESSION["name"] . "'");
// 			$message = "Password Changed";
// 	} else
// 			$message = "Current Password is not correct";
// }
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>

@media (max-width:700px) {
			.abc {
				display: none;
			}
		}

		input{
			width: 100%;
		}

		@media screen and (min-width:0px) and (max-width:480px) {
			input{
			width: auto;
		}
		}

		@media screen and (min-width:480px) and (max-width:768px) {
			input{
			width: auto;
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

			<div class="col-12 col-sm-12 col-md 12 col-lg-4 col-xl-4 mt-2">
			<?php
    
		if(isset($_SESSION['name']))
		{
		echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
		}
		?>
			
			
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
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
				</ul>

			</div>
		</nav>

		<!-- body start -->
		<div class="container mt-3">

		<div class="card" id="www">
		<div class="card-header bg-success">
				<div class="row">

				<div class="col">
					<a id="change" class="btn btn-info">change password</a>
					</div>

					<div class="col">
					<p class="h3 text-center text-white">Profile</p>
					
					</div>
					<div class="col">
					<a id="editp1" style="float:right;margin-right:5%;"class="btn btn-info"> Edit Profile</a>
					</div>

					
				</div>
					</div>

		<div class="card-body">
			<div class="table-sm-responsive">

			<table class="table table-inverse"> 

      <tr>
			<td>First Name : </td>
			<td><?php echo $row['f_name']; ?></td>
	    </tr>

      <tr>
			<td>Last Name : </td>
			<td><?php echo $row['l_name']; ?></td>
	    </tr>

			<tr>
			<td>E-Mail : </td> 
			<td><?php echo $row['email'];?></td>
		</tr>

      <tr>
			<td>Dob : </td> 
			<td><?php echo $row['dob']; ?></td>
		</tr>

    <tr>
		<td> Gender :</td> 
		<td><?php echo $row['gender'];?></td>
	  </tr>
					
		<tr>
			<td>Marital Status : </td> 
			<td><?php echo $row['marital']; ?></td>
		</tr>

		<tr>
		<td>Mobile No : </td> 
		<td><?php echo $row['mobile'];?></td>
	  </tr>

		<tr>
		<td>Security Question : </td> 
		<td><?php echo $row['ques']; ?></td>
  	</tr>
					
		<tr>
			<td>Answer : </td> 
			<td><?php echo $row['ans']; ?></td>
		</tr>
	<!-- </div> -->

	
	</table>
	   <!-- start -->
		 <div class="card" id="mno" style="display:none;">
			 <div class="card-header bg-warning">
			 <p class="h3 text-center text-white">Change Password</p>
	</div>
	<div class="card-body">
		<div class="table-sm-responsive">
			<table class="table table-inverse">
      <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
			<tr>
      <td>Current Password</td>
      <td><input type="password" name="currentPassword"></td>
      </tr>

			<tr>
     <td>New Password</td>
     <td><input type="password" name="newPassword"></td>
     </tr>

		 <tr>
     <td>Confirm Password</td>
     <td><input type="password" name="confirmPassword"></td>
     </tr>
		  
     <tr>
     <td><input type="submit" name="submit" value="Submit"></td>
     </tr>
	</form>
	</table>
	</div>
	</div>
	</div>
		 <!-- end   -->
	</div>
			</div>
	</div>

			<!-- second table -->
			<div class="card" id="xyz" style="display:none;">
			<div class="card-header bg-success">
					<p class="h3 text-center text-white">Profile</p>
					</div>

			<div class="card-body">
			<div class="table-sm-responsive">

			<table class="table table-inverse"> 

			<form action="editprofile.php" method="post" enctype="multipart/form-data">
			 
			<tr>
				<td >First Name  </td> 
				<td style="text-transform:capitalize; onblur="return name1()"><?php echo $name;?></td>
			</tr>

			<tr>
				<td> Last name </td> 
				<td><input name="ln" type="text" value="<?php echo $row['l_name'];?>"></td>
			</tr>

					<tr>
						<td>E-Mail  </td> 
						<td><input name="mail1" type="mail" value="<?php echo $row['email'];?>"></td>
					</tr>

					<tr>
						<td>Dob  </td>
						<td><input name="dob1" type="text" value="<?php echo $row['dob'];?>"></td>
				  </tr>

					<tr>
					<td>Gender  </td> 
					<td><input name="gnd1" type="text" value="<?php echo $row['gender'];?>"></td>
				  </tr>

			   	<tr>
					<td>Marital Status </td>  
					<td><input name="mrt1" type="text" value="<?php echo $row['marital'];?>"></td>
				  </tr>

					<tr>
					<td>Mobile No.  </td> 
					<td><input name="mon1" type="text" value="<?php echo $row['mobile'];?>"></td>
				  </tr>

					<tr>
					<td>Security Question  </td> 
					<td><input name="que1" type="text" value="<?php echo $row['ques'];?>"></td>
				  </tr>

					<tr>
					<td>Answer  </td>  
					<td><input name="ans1" type="text" value="<?php echo $row['ans'];?>"></td>
				  </tr>

					<tr>
					<td></td> 
					<td><input type="submit" value="Save Profile" class="btn btn-info"></td>
				  </tr>

					
				
	</form>
	</table>

	</div>
	</div>


	</div>

<!-- end -->

<br/><br/>

<?php  include('footer.php');  ?>
<br/>


		</div>
		
		</div>
		
	</div>


	

	<!-- Form for fetching data into column -->


	<!-- body end -->

</div>


</body>

<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){
		$('#editp1').click(function(){
      $('#xyz').show();
			$('#www').hide();
		});
		$('#change').click(function(){
			$('#mno').show();
			$('#xyz').hide();
			// $('#www').hide();
		
			// alert();
		});
	}); 
	</script>
</html>