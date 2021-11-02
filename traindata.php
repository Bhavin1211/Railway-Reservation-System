<?php
session_start();
include('firstimport.php');

if(isset($_SESSION['name'])){}
	else{
		header("location:index2.php");
		
	}
 
	$from = $_SESSION['From'];
	$to  = $_SESSION['To'];
  $date = $_SESSION['Date'];
  
	// echo $from;
	// echo '<br/>'.$to;

	$myquery = "SELECT DAYNAME('$date') as day";
	$yamik = mysqli_query($conn,$myquery);
	$x= mysqli_fetch_array($yamik);
	
	$Day = $x['day'];

	$sql = "select * from `train`";
 $utsav = mysqli_query($conn,$sql);
	$row2 = mysqli_fetch_array($utsav);

	$abcd = explode(",",$row2['day']);
	
	if (in_array($Day,$abcd)){

    $find = "SELECT train.train_id,station.arrival,train.train_name,trainstation.name FROM `train`
		 join station on station.id = train.id 
		 join route on route.route_id = station.route_id 
		 join trainstation on trainstation.id = station.station_name
	   WHERE station_name in ($from)";
		
	   
	  $d = mysqli_query($conn,$find);
    
   
			
		if(isset($_POST['done']))
		{
		$myroute = "SELECT * FROM `train` join station on station.id = train.id join route on route.route_id = station.route_id join trainstation on trainstation.id = station.station_name WHERE station.station_name IN (SELECT station_name FROM station WHERE staion_name = $from )
		 ORDER BY station_id ASC ";

		
		$ex = mysqli_query($conn,$myroute);
		
		$f = mysqli_fetch_array($ex);
		
		header("location:trainroutedata.php");
	}
		
	}
	
  
		
	
  
		
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Train data</title>
  <link href="css/Default.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
 <style>
   @media (max-width:700px) {
			.abc {
				display: none;
			}
		}

    table th {
    border-top: none !important;
	  }
  </style>  
</head>
<body>

<div class="container-fluid">
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

<!-- main body -->
<div class="container">
<div class="card mt-3">
<div class="card-body">
		<div class="table-responsive">
    <table class="table table-inverse text-center">
      <tbody>
        <tr>
        <th> Train No.</th>
					<th> Train Name </th>
					<th> Orig. </th>
					<th>Destination</th>
				  <th>Time</th>
					<th>Route</th>
         </tr> 
          <?php
					
					while($a =mysqli_fetch_array($d))
					{
						
					?>
					
					
					
         <tr>
					 <td><?php echo $a['train_id']; ?></td>
					 <td><?php echo $a['train_name']; ?></td>
					 <td><?php echo $a['name']; ?></td>
					 <?php
            $find1 = "SELECT train.train_id,train.train_name,trainstation.name FROM `train`
		 join station on station.id = train.id 
		 join route on route.route_id = station.route_id 
		 join trainstation on trainstation.id = station.station_name
	   WHERE station_name in ($to)";
		
	   
	  $d1 = mysqli_query($conn,$find1);
  	$read=mysqli_fetch_array($d1);
					 ?>
					 <td><?php echo $read['name']; ?></td>
           <td><?php echo $a['arrival']; ?></td>
					 <td><a  id="" class="btn btn-primary" href="session.php?id=<?php echo $a['train_id'];?>" role="button" name="done">view</a></td>
	        </tr>
          <?php 
					}

					?>

         
      </tbody>
  </table>
  </div>
  </div> 
  </div> 
	<br/></br>
	<?php  include('footer.php'); ?>
	<br/>
  </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>