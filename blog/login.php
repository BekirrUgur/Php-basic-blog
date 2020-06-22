<?php
include("header.php");
?>

<?
if(isset($_POST["sssubmit"])){
	
	$sname = mysqli_real_escape_string($link,$_POST["sname"]);
	$spassword = mysqli_real_escape_string($link,$_POST["spassword"]);
	
if($sname =="" || $spassword=="")){
	header("Location:index.php");

}else{
	
		header("Location:index.php");

		
		
		
	}
 }
	





?>