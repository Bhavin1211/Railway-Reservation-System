<?php
session_start();
include('firstimport.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Index page</title>
	<link href="css/Default.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		@media (max-width:700px) {
			.abc {
				display: none;
			}
		}

		.r1,.r2,.r3,.r4,.r5,.r6{
			width:100%;
			height:100%;
			border:3px solid grey;
			border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.5); 
    }

		.r1:hover, .r2:hover,
		.r3:hover,	.r4:hover, .r5:hover,
		.r6:hover{
			opacity:0.8;
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
    
			 if(!isset($_SESSION['name']))	
			 {

				 ?>
				<a href="index2.php" class="btn btn-info" role="button">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="signup.php?value=0" class="btn btn-info">Signup</a><br/><br/>&nbsp;&nbsp;
				<a href="helpline.php" target="_blank"><img src="img/help.png" alt="helpline" width="150" height="40"></a>
			 <?php } 
			 else

			 {
			 
			 echo "<b>Welcome,</b>".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
				
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
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
				</ul>

			</div>
		</nav>
<!-- body start -->
<div class="container">
	<div class="row">
  
	<div class="col-sm col-12">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:600px; float:left;margin-top:15px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="img/ac1.gif" style="width:600px;height:350px;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="img/bg1.jpg"  style="width:600px;height:350px;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="img/bg2.jpg" style="width:600px;height:350px;" alt="Third slide">
    </div>
		<div class="carousel-item">
      <img class="d-block" src="img/bg3.jpg" style="width:600px;height:350px;" alt="fourth slide">
    </div>
		<div class="carousel-item">
      <img class="d-block" src="img/bg4.jpg" style="width:600px;height:350px;"  alt="fifth slide">
    </div>
		<div class="carousel-item">
      <img class="d-block" src="img/bg5.jpg" style="width:600px;height:350px;" alt="sixth slide">
    </div>
		<div class="carousel-item">
      <img class="d-block" src="img/bg6.jpg"  style="width:600px;height:350px;" alt="seventh slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	
			</div>

	<div class="col-sm col-0 d-none d-sm-block">
	<div class="news w-100" style="float:right;border-radius:4px;height:350px;margin-top:15px;">
				
				<marquee behavior="scroll" id="marq"  scrollamount=3 direction="up" height="330px" onmouseover="this.stop();" onmouseout="this.start();">
								<div>
								<p style="color:red;"><b>"Free Wi-Fi at all 6000 stations in next 120 days,assures Rail Minister Piyush Goyal"</b></p><br/>
								<p style="color:#6912f3;"><b>"There is no proposal to extend to mail/express and superfast trains the flexi-fares currently applicable only to Rajdhani, Shatabdi and Duronto trains,  said Railways Minister Piyush Goyal."</b></p>
								<br/>
								<p style="color:blue;"><b>"The Railway ministry has posted the rate list on its Twitter account while asking people to lodge a complaint if they are overcharged."</b></p><br/>
								<p style="color:blue;"><b>"The Comptroller and Auditor General (CAG) has asked the railways to revise passenger fares and curtail concessional passes to recover its operating cost in a phased manner".</b></p><br/>
								<p style="color:blue;"><b>"Railway issues new catering policy for better food."</b></p><br/>
								<p style="color:blue;"><b>"Passengers will now be involved in judging cleanliness level of popular trains including Rajdhani, Shatabdi and Duronto as well as major stations across the country.</b></p><br/>
							</div>
							</marquee>
							</div>
							<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			</div>		


			</div>

			<h3 align="center" style="font-size:1.5vw;color: white;text-shadow: 1px 1px 2px black,0 0 10px black,0 0 5px darkblue;"><strong>SPECIAL TRAINS</strong></h3><br/>
			<!-- photo gallery -->
			<div class="row">
			 <div class="col">
			 <img class="r1" src="img/bg2.jpg" alt="rajdhani express"/>
      </div>
			<div class="col">	
			<img src="img/bg3.jpg" class="r2" alt="gatimaan express"/>
      </div>
			<div class="col">	
			<img src="img/bg6.jpg" class="r3" alt="bhopal shatabdi"/>
      </div>
			</div>
			<br/><br/>
			<div class="row">
			 <div class=" top-left col">
			 <img src="img/r9.jpg"  class="r4" alt="howrah rajdhani"/>
      </div>
			<div class="col">	
			<img src="img/r3.png"  class="r5" alt="sealdah duronto"/>
      </div>
			<div class="col">	
			<img src="img/r12.jpg" class="r6" alt=" garib rath"/>
      </div>
			</div>
			<br/><br/>

			<span style="position:relative;top:-350px;left:70px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Rajdhani Expresss</span>

      <span style="position:relative;top:-350px;left:260px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Gatimaan Express</span>
      
			<span style="position:relative;top:-350px;left:450px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Bhopal Shatabdi</span>

			<span style="position:relative;top:-100px;left:-500px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Howrah Rajdhani</span>

			<span style="position:relative;top:-100px;left:-310px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Sealdah_Duronto</span>

			<span style="position:relative;top:-100px;left:-100px;font-size:1.8vw;color:white;text-shadow: 1px 1px 2px blue,0 0 10px black,0 0 5px darkblue;">Garib Rath</span>
						<!-- photo gallery end -->
			<?php include 'footer.php';?>
			<br/>
</div>

</body>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>