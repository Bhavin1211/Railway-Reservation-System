 <?php

session_start();
include('firstimport.php');

if(isset($_SESSION['name'])){}
	else{
		header("location:index2.php");
		
	}

	
	if(isset($_POST['done'])) {
		# code...
		$station = $_POST['myselect'];
    $train_id = $_POST['myvalue'];

		//echo $station;
  //if(isset($_POST['$tvalue']))
 //{
	if($station == ['station_name']){
		$sql = "select * from `station` where $station = $train_id";
		$ex = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($ex);

		//echo $row['train_name'];
	}
	elseif ($station == ['train_name']) {
		$a = strtoupper($station);
		$sql4 = "select * from `station` where $a = $train_id";
		$exa = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($ex);

		echo $row['train_name'];
	}
	else{
		$sql = "select * from `train` where $station = $train_id";
		$ex = mysqli_query($conn,$sql);
		

		//echo $row['train_name'];
	}
	}
 //}

//	}

	
  
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Train</title>
  <!-- <link href="css/Default.css" rel="stylesheet">
	</link> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
		@media (max-width:700px) {
			.abc {
				display: none;
			}
		}

    table td {
    border-top: none !important;
	  }

    table th {
    border-top: none !important;
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

  <!-- navbar -->
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
						<a class="nav-link" href="train.php">Find Train</a>
					</li>
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
						<a class="nav-link" href="#">About</a>
					</li>
				</ul>

			</div>
		</nav>

    <!-- navbar end -->

    <!-- box1 -->
  <div class="d-flex flex-sm-row bg-secondary mt-3">
    <form method="post" action="#">
      <div class="table-sm-responsive">
        <table class="table">

        <tr>
					<th><label><b>Search Train</label></th>
          
					<td>
						<select name="myselect" onchange="clicker()">
						<option value="station_name">By Station</option>
						<option value="train_name" >By Name</option>
						<option value="train_id" >By Number</option>
						</select>
					</td>

					<td><label>Enter Value</label></td>
					<td><input  type="text" class="input-block-level" name="myvalue"></td>
					<td><input type="submit" name="done" class="btn btn-info">
	        <td><input type="reset" value="Reset" class="btn btn-info"> </td>
					
				</tr>

  </table> 
      </div> 
  </form>  
  </div>  
     <!-- box1end -->

   <!--box2 start -->
   <div class="d-flex flex-sm-row bg-secondary mt-3">
     <div class="display" style="height:300px;">
       <div class="table-responsive-sm">
         <form>
         <table class="table table-bordered table-inverse table-dark table-hover mt-4">
					 <tbody>
      <tr>
					<th> Train No.</th>
					<th> Train Name </th>
					<th> Orig. </th>
				  <th> Arr. </th>
					<th> Monday </th>
					<th> Tuesday </th>
					<th> Wednesday </th>
					<th> Thursday </th>
					<th> Friday </th>
					<th> Saturday </th>
					<th> Sunday</th>
				</tr>
	</tbody>
	<?php
	      while($row=mysqli_fetch_array($ex)){
					?>
					<tr>
						<td><?php echo $row['train_id']; ?></td>
						<td><?php echo $row['train_name']; ?></td>

					<tr>	
						<?php
				}
				?>
  </form>
  </table>   
  </div> 
  </div>  
  </div>  
     <!--box2 end --> 

  </div>
</body>

<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html> 

