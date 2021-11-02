<?php
session_start();
include('firstimport.php');

mysqli_select_db($conn,"$db_name")or die("cannot select DB");

$error_password = '';

if (isset($_POST['done']))
{
$username=$_POST['email'];
$password=$_POST['password'];

$sql = "select * from users where email= '$username'";

$a = mysqli_query($conn,$sql);
$count = mysqli_num_rows($a);
$res = mysqli_fetch_array($a);

if($count > 0){
  if($res["role_id"]==2){
    if($res["password"]==$password){
      $_SESSION['name'] = $res['f_name'];
      echo $_SESSION['name'];
      header('location:index.php');
      
    }
    else{
      $error_password = "password not match";
    }
  }
  if($res["role_id"]==1){
    if($res["password"]==$password){
      header('location:dashboard.php');
    }
    else{
      $error_password = "password not match";
    }
  }

}
else{
  echo '<script>alert("Not found user");</script>';
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style-->
  <style type="text/css">
    .registration-form {
      background: #f7f7f7;
      padding: 20px;

      margin: 100px 0px;
    }

    .err-msg {
      color: red;
    }

    .registration-form form {
      border: 1px solid #e8e8e8;
      padding: 10px;
      background: #f3f3f3;
    }

    .registration-form {
      position: relative;
      left: -380px;

    }

    .utsav {
      position: absolute;
      background-color: rgba(0, 0, 0, 0.5);
      top: 20%;
      left: 10%;

    }



    body {
      background-image: url("img/87252_full-hd-1080p-train-wallpapers-hd-desktop-backgrounds-1920x1080_1920x1080_h.jpg");
      background-size: cover;
      background-attachment: fixed;
      margin: 0px;
      padding: 0px;


    }

    ::placeholder {
      color: black;
      opacity: 1;
      /* Firefox */
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: black;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: black;
    }
  </style>
</head>

<body>
  <div class="card w-25 utsav">
    <div class="card-header text-center bg-danger ">

      <h4 class="text-center text-light font-weight-bold">Login</h4>
    </div>
    <div class="card-body">
      

      <form action="#" method="post">


        <!--// Email//-->
        <div class="form-group">
          <label class="text-light font-weight-bold">Email:</label>
          <input type="text" class="form-control" placeholder="Enter Email" name="email" autocomplete="off"><br/>
         
          
        </div>

        <!--//Password//-->
        <div class="form-group">
          <label class="text-light font-weight-bold">Password:</label>
          <input type="password" class="form-control" placeholder="Enter Password" name="password"> <span style="color:red;"> <?php  echo $error_password; ?></span>
         
        </div>


        <button type="submit" class="btn btn-block btn-outline-success" name="done">Login</button>
        <p class="mt-3"><a href="signup.php"> Haven't registerd? Sign Up here </a></p>
      </form>
    </div>
    
  </div>




</body>

</html>
