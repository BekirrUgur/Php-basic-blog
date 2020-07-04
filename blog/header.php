<?php
session_start();
$link = mysqli_connect("localhost","root","","blog");
//Support for the use of Turkish characters
$link -> set_charset("utf8");
// Database connection check
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<link rel="SHORTCUT ICON" href="style/blog.ico">
	<title>BLOG</title>
</head>
<body>

<!-- Top menu section -->
	<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img class="logo" src="style/BEN.jpg"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">About Us</a>
      </li>
	  <!-- Pages that can be entered according to open / closed status by controlling the session -->
	  <?php if(isset($_SESSION["user"])){  ?>
	  <li class="nav-item">
        <a class="nav-link" href="create.php">Create Posts</a>
      </li>
	   <?php } ?>
	  <?php if(!isset($_SESSION["user"])){  ?>
	  <li class="nav-item">
        <a class="nav-link" href="user.php">Sign-in/Login</a>
      </li>
	  <?php } ?>
	   <?php if(isset($_SESSION["user"])){  ?>
	  <li class="nav-item">
        <a class="nav-link" href="edit.php">Edit Post</a>
      </li>
	   <?php } ?>
	  <form method="post">
	  <?php if(isset($_SESSION["user"])){  ?>
	   <li class="nav-item">
        <a class="nav-link" href="exit.php">Exit Profile</a>
      </li>
	  <?php } ?>
	  
      </form>
	</ul>
  </div>
</nav>