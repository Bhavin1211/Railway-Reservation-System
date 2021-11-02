<?php
session_start();
include('firstimport.php');

if(isset($_SESSION['name'])){}
	else{
		header("location:index2.php");
		
	}

	
	if(isset($_POST['done']))
	{
		$From = $_POST['from'];
		$To = $_POST['to'];
    $Date  = $_POST['date'];
		// $Date = explode('/',$_POST['date']);
	
		

	mysqli_select_db($conn,"$db_name") or die("cannot select db");


	// $Date = $_POST['date'];
$myquery = "SELECT DAYNAME('$Date') as day";
$yamik = mysqli_query($conn,$myquery);
$x= mysqli_fetch_array($yamik);

$Day = $x['day'];

//echo $Day;
//query1 --


 $sql = "select * from `train`";
 $utsav = mysqli_query($conn,$sql);
	$row2 = mysqli_fetch_array($utsav);

	$abcd = explode(",",$row2['day']);
	
	if (in_array($Day, $abcd)){
		// print "helllo";
	  $find = "SELECT * FROM `train`
		 join station on station.id = train.id 
		 join route on route.route_id = station.route_id 
		 join trainstation on trainstation.id = station.station_name
	   WHERE station_name='".implode(" ",$From)."' AND Station_name='".implode(" ",$To)."'";
	 
	 $d = mysqli_query($conn,$find);
	  
    //$s = mysqli_fetch_array($d);
   if($d){
         $_SESSION["From"] = implode("",$From);
			$_SESSION["To"] = implode("",$To);
			$_SESSION["Date"] = $Date;

		header("location:traindata.php");
	 }
    

	}
	else{
		echo '<script>alert("sorry train are not available this date");</script>';
	}




	}
?>


<?php
function from($conn){
	$sql2 = "SELECT *  FROM trainstation";
	$results = mysqli_query($conn, $sql2);
	 $data = '';
	while($row = mysqli_fetch_array($results)){
	
		$data .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
	}
	return $data;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=, initial-scale=1.0">
	<title>Reservation</title>
	<link href="css/Default.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
		select,
		textarea {
			width: 80%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			resize: vertical;
			
		}

		table td {
    border-top: none !important;
	  }

		table th {
    border-top: none !important;
	  }

		@media screen and (max-width: 600px) {


input[type=submit],
input[type=reset] {
	width: 100%;
	margin-top: 0;
}
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
		
			/* float: right; */
			

		}

		/* select {
			display: inline-block;
			width: 80%;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: 70%;
			

		} */

	
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
 
		<!-- form -->
		<div class="container">
    <div class="card mt-3">
		
		<div class="card-header bg-warning">
		<p class="h3 text-center text-white">Book Train</p>
    </div>
		
		<div class="card-body">
		<div class="table-responsive">
    <table class="table table-inverse text-center">
    
		<form method="post" action="#">
		<tr>
		<th><label>From</label></th>
		<td><select name="from[]" autocomplete="off"><?php echo from($conn); ?></select></td>
	  </tr>

	<tr>
	<th><label> To <label></th>
	<td><select name="to[]"><?php echo from($conn); ?></td>
	</tr>
  
	<tr>
	<th><label> Date<label></th>
	<td><input type="date" class="input-block-level input-medium" name="date" max="<?php echo date('Y-m-d',time()+60*60*24*90);?>" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}else {echo date('Y-m-d');}?>"> </td>
	</tr>

	<tr>
	<td>
	<input type="submit" name="done">
	<input type="reset" value="Reset">
	</td>
	</tr>
	</form>
	  </table>
	  </div>
	  </div>
		
		
		</div>
		<br/><br/>
		<?php include('footer.php');  ?>
  </br>
	</div>

		<!-- form end -->
  
</div>

</body>


<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>