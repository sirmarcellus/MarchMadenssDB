<?php
include 'dbm.php';

session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
$title = "Home";
$content = '
<h4>WELCOME TO THE MADNESS</h4>
<p>
    Here you will find all sorts of neat facts and statistics about your favorite players from March Madness 2019.
    Have fun while searching up stats on your favorite teams from the tournament. 

</p>';

include 'Template.php';
?>

