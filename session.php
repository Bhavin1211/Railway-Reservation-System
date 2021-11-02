<?php
session_start();

$trainid = $_GET['id'];
  $_SESSION['id']= $trainid;
  if($_SESSION['id'])
  {
  	header("location:trainroutedata.php");
  }
?>