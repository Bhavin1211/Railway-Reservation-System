<?php

session_start();

include('firstimport.php');

$error_tnumber='';
$error_tname='';
// $error_day = '';
// $error_route = '';
// $error_platform = '';


if (isset($_POST['done']))
{

$tnumber=$_POST['trainnumber'];
$tname=$_POST['trainname'];


if(empty($tnumber)){
  $error_tnumber=  "<p class='error'>Please enter train  number.</p>";
}
if(empty($tname)){
  $error_tname=  "<p class='error'>Please enter train  name.</p>";
}


else
{
	$Day = $_POST['day'];
	$d = "";	

mysqli_select_db($conn,"$db_name") or die("cannot select db");



$check = "select * from train where train_id ='$tnumber' OR train_name = '$tname'";
$query1 = mysqli_query($conn,$check);
$count =  mysqli_num_rows($query1);

if($count > 0){
 echo  '<script>alert("train already entered"); </script>';

}

else{
	foreach($Day as $d1)  
   {  
      $d .= $d1.",";  
   }  

	# code...
	$a = "INSERT INTO TRAIN(train_id,train_name,day) values('$tnumber','$tname','$d')";


	$execute=mysqli_query($conn, $a);
	if($execute){
	   $sql4 = "select * from train where train_name = '$tname'";
		 $z = mysqli_query($conn,$sql4);
     $res = mysqli_fetch_array($z);
		$id=$res["id"];

		// echo $id;
		
		for ($i=0; $i < count($_POST['platform']) ; $i++) { 
			# code...

			$myquery = "INSERT INTO station(id,pt,arrival,route_id,station_name) values('$id','".$_POST['platform'][$i]."','".$_POST['arrival'][$i]."','".$_POST['route'][$i]."','".$_POST['station'][$i]."')";
			$query = mysqli_query($conn,$myquery);

			if($query){
         echo "insert successfully";
			}
			else{
				echo "something went wrong";
			}

		}

	}
		else{
		 echo "Error: " . $a . "<br>" . mysqli_error($conn);
		}
}
}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title> Add New Train</title>
	<link rel="shortcut icon" href="images/favicon.png">
	</link>
	<meta http-equiv="content-Type" content="text/html" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1,user-scalable=0" />
	<meta http-equiv="X-UA-compatible" content="IE=edge,chrome=1" />
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	</link>  
	 <link href="css/bootstrap.css" rel="stylesheet">
	</link> 
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
	<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script> -->

	<style>
		@media (max-width:700px) {
			.abc {
				display: none;
			}
		}

		input[type=text],
		input[type=date],
		input[type=time],
		/* select, */
		textarea {
			width: 80%;
			height:40%;
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
		/* input[type=submit],
		input[type=reset] {
			background-color: #04AA6D;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			margin-left: 50px;

		} */

		/* Style the container */
		/* .container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		} */

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
		/* @media screen and (max-width: 600px) {

			.col-25,
			.col-75,
			input[type=submit],
			input[type=reset] {
				width: 100%;
				margin-top: 0;
			}
		} */

		select {
			display: inline-block;
			width: 80%;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: 50%;

		}

	/* .tab{
		display:none;
	} */

	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			 <div class="col-12 col-sm-12 col-md 12 col-lg-4 col-xl-4 text-center">
				<img src="img/logo.jpg" width="80" height="80" class="d-inline-block align-top" alt="" />
			</div>
			 <div class="abc col-12 col-sm-12 col-md 12 col-lg-8 col-xl-8 text-center">
				<h1 class="mt-3 text-left"><a href="index.php">Indian Railways</a></h1>
      	</div> 

	</div>
			</div> 

	<!-- registration form -->
	<div class="container mt-3">
		<div class="card">
			<div class="card-header bg-success">
				<p class="h4 text-center text-white">Add Train</p>
			</div>

			<?php
									
									function dropdown($conn){
										$sql = "SELECT *  FROM route";
										$result = mysqli_query($conn, $sql);
										 $output = '';
										while($row = mysqli_fetch_array($result)){
										
											$output .= '<option value="'.$row["route_id"].'">'.$row["route_name"].'</option>';
										}
										return $output;
										}
										?>
										
										<?php
									
									function mystation($conn){
										$sql2 = "SELECT *  FROM trainstation";
										$results = mysqli_query($conn, $sql2);
										 $data = '';
										while($row = mysqli_fetch_array($results)){
										
											$data .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
										}
										return $data;
										}
										?>
			<form name="signup" method="post" action = "#">
				
			<div class="card-body text-center">

			
			<div class="row">

			
							<div class="col-25">
								<label for="tnumber">Train Number</label>
							</div>
							<div class="col-75">
								<input type="text"  name="trainnumber" placeholder="Train Number.." autocomplete="off" ><span style="color:red;"> <?php  echo $error_tnumber; ?></span>
							</div>
							
						</div>

						<div class="row">
							<div class="col-25">
								<label for="tname">Train Name</label>
							</div>
							<div class="col-75">
								<input type="text" name="trainname" placeholder="Train Name.." autocomplete="off" ><span style="color:red;"> <?php  echo $error_tname; ?></span>
							</div>
						</div>		

						
			

						<h4 class="h4 text-center text-dark">Running Day</h4>

						<div class="row">
						<div class="col-25">
						</div>
						<div class="col-75">
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox"  name="day[]" value="Monday" class="form-check-input"> Mon
									</label>
						   </div>
							 <div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Tuesday"
										class="form-check-input"> Tue
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Wednesday" 
										class="form-check-input"> Wed
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Thursday" 
										class="form-check-input"> Thu
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Friday"
										class="form-check-input"> Fri
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Saturday" class="form-check-input"> Sat
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" name="day[]" value="Sunday"
										class="form-check-input"> Sun
									</label>
								</div>
							</div>
	  
	</div>
<div class="table-sm-responsive mt-4">
	<table class="table">
	<thead>
		<th>platform no.</th>
		<th>Arrival</th>
		<th>Departure</th>
		<th>route</th>
		<th>station name</th>
		<th></th>
	</thead>



  <tbody id="mytable">
 
	
	</tbody>
	<tfoot>
		<tr>
			
			<td colspan="4" class="text-center">
				<input type="button" id="add" class="btn btn-success" value="+">
					</td>
					</tr>
	</tfoot>
</table>
</div>

<!-- table end -->


           <center>
           <div class="col-4">
						<input type="reset" value="Reset">
							<input type="submit" name="done">
							</div>
             <div class="col-4"></div>
            </div>
									</center>
						
					
</div>

      </form>	
</div>
</div>
	
		
	
</body>
<script>
		$(document).ready(function(){

	    		$("#add").click(function(){		
	var html = '';
	html +='<tr>';
	html +='<td><input type="text" class="form-control" name="platform[]"/> </td>';
  html +='<td><input type="time" class="form-control" name="arrival[]"/></td>';
	html +='<td><select name="route[]"><?php echo dropdown($conn); ?></select></td>';
  html +='<td><select name="station[]"><?php echo mystation($conn); ?></select></td>';
	html +='<td><input type="button" name="remove" class="btn btn-warning remove" value="-"></td>';
	html +='</tr>';  
	// 		  // if (x <= max) {
					$("#mytable").append(html);
					// x++;
				//	}
			});

			$("#mytable").on('click','.remove',function(){
				$(this).closest('tr').remove();
				//  x--;
			});

		});
	</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>