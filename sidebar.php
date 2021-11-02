<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    
  </style>

</head>

<body>
  <div class="container">

    <!-- A vertical navbar -->
    <nav class="navbar bg-light sidebar">

      <ul class="accordion-container navbar-nav sidebar-list">
      <li class="nav-item accordion-content hide">
          <a  href="dashboard.php">
            <h3 class="title"><i class='fas fa-home'></i> Dashboard</h3>
          </a>
        </li>

       

        <!--==== accordion list-3 =====-->

        <li class="nav-item accordion-content hide">
          <a href="addtrain.php">
            <h3 class="title"><i class='fa fa-train'></i> Add Train</h3>
          </a>
        </li>


        <!--==== accordion list-3 =====-->
        <li class="nav-item accordion-content hide">
          <a href="viewusers.php">
            <h3 class="title"><i class='fa fa-user'></i> View Users</h3>
          </a>

        </li>

        <!--==== accordion list-3 =====-->
        <li class="nav-item accordion-content hide">
          <a href="viewtrainadmin.php">
            <h3 class="title"><i class='fa fa-train'></i> View Train</h3>
          </a>
        </li>
        <!-- <li class="nav-item accordion-content hide">
          <h3 class="title"><i class='fas fa-envelope'></i> Contact Us</h3>

        </li> -->

        <li class="nav-item accordion-content hide">
          <a href="viewuserfeedback.php">
            <h3 class="title"><i class='fas fa-sms'></i> View Feedback</h3>
          </a>
        </li>
        <li class="nav-item accordion-content hide">
          <h3 class="title"><i class='fas fa-user-cog'></i> Website Admin</h3>
          <ul class="description navbar-nav">
            <li class="nav-item">
              <a class="nav-link content-link" href="dashboard.php?cat=website-admin&subcat=admin-profile">Admin Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link content-link" href="dashboard.php?cat=website-admin&subcat=change-password">Change Password</a>
            </li>
          </ul>
        </li>

        <li class="nav-item text-center">
          <a href="javascript:void(0)" id="hide"><i class='far fa-arrow-alt-circle-left'></i></a>
        </li>

      </ul>


    </nav>
  </div>
</body>

</html>