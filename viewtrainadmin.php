<?php
session_start();

require('firstimport.php');

$myroute = "SELECT * FROM `train`";

$ex = mysqli_query($conn,$myroute);


?>
<!DOCTYPE html>


<head>
	<title>View Train </title>
	<link rel="shortcut icon" href="images/favicon.png">
	</link>
	<meta http-equiv="content-Type" content="text/html" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1,user-scalable=0" />
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
        <a href="dashboard.php" title=""><i class=''></i></a>
					<p class="h4 text-center text-white">All Train</p>
				</div>
				<div class="card-body">
					<div class="table-sm-responsive">
						<table class="table table-bordered table-inverse  table-hover">
							<thead>

					<tr>
					<th> Train No.</th>
					<th> Train Name </th>
					<th>Running Day</th>
					<th>Route</th>
					</tr>

							</thead>
              <?php
		         while($f = mysqli_fetch_array($ex))
		          {
	          	?>
          
          <tbody>
							 <tr>
               <td><?php echo $f['train_id']; ?></td>
               <td><?php echo $f['train_name']; ?></td>
               <td><?php echo $f['day']; ?></td>
               <td><a  id="" class="btn btn-primary" href="viewtrainadmin2.php?id=<?php echo $f['train_id'];?>" role="button" name="done">view</a></td>
               <tr>  

                <?php
    }
    ?>

  </tbody>
						</table>




					</div>

				</div>
			</div>
		</div>
</body>

</html>