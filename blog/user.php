<?php

include("header.php");

//When the button is clicked
if (isset($_POST["fsubmit"])){
	//Checks if the name or password is full
	if($_POST["fname"]=="" || $_POST["fpassword"]=="" ){
		

		
	}else{
		//Keeping the input received in another variable to avoid SQL injections
		$fname=mysqli_real_escape_string($link, $_POST["fname"]);
		$fpassword=mysqli_real_escape_string($link, $_POST["fpassword"]);
		//Adds the obtained information to the admin table
		$sql="INSERT INTO admin (username, password) 
		VALUES ('".$fname."', '".$fpassword."')";
		//Redirects to the index page after registration so as not to repeat the form submission process
		if(mysqli_query($link, $sql)){
			
			header("Location:index.php");
			
		};	
	}	
}

if(isset($_POST["ssubmit"])){
	
	if($_POST["sname"]==""){
		
		
		
	}
	//Checks the fullness of the content
	else if($_POST["spassword"]==""){
		
		
		
	}else{
	$sname = mysqli_real_escape_string($link,$_POST["sname"]);
	$spassword = mysqli_real_escape_string($link,$_POST["spassword"]);
	
	//Retrieves the user and password from the admin table from the database
	$sql = "SELECT username, password FROM admin";
    // Database connection
	if($result = mysqli_query($link, $sql)){
	
		$row = mysqli_fetch_assoc($result);
		//Checks whether the password and username are correct with the database
		if($row["password"]==$spassword && $row["username"]==$sname){
			$_SESSION["user"]="admin";
			header("Location:create.php");
			
		}else{
			
			echo "Böyle bir kullanıcı yok";
			
		}
	}
	
 }
	
	
	
}

?>
<!-- Member login section -->
<form method="post">
<h2 class="sign-in">Register</h2>
<div class="fixed">
<div class="input-group">
  <div style="width:20%;" class="input-group-prepend" >
    <span style="width:100%;" style="border-radius:3px" class="input-group-text">Username and password </span>
  </div >

  <input type="text" name="fname" aria-label="First name" id="fisim" class="form-control" placeholder="Username"/>
  <input type="password" name="fpassword" aria-label="Last name" id="fsifre" class="form-control" placeholder="Password"/>

</div>
</div>
<button type="submit" name="fsubmit" id="fbutton" class="btn btn-primary">Register</button>
</form>

<!-- Member registration section -->
<form method="post">
<h2 class="sign-in">Login</h2>
<div class="fixed">
<div class="input-group">
  <div style="width:20%;"  class="input-group-prepend">
    <span style="width:100%;" style="border-radius:3px" class="input-group-text">Username and password</span>
  </div >

  <input type="text" name="sname" aria-label="First name" id="sname" class="form-control" placeholder="Username">
  <input type="password" name="spassword" aria-label="Last name" id="spassword" class="form-control" placeholder="password">

</div>
</div>
<button type="submit" name="ssubmit" id="sbutton"class="btn btn-primary">Login</button>

</form>

<script type="text/javascript">
$("#fbutton").click(function(){
	if($("#fisim").val()==""){
		alert("Name cannot be empty!")
		
	}
	if($("#fsifre").val()==""){
		alert("Password cannot be empty!")
		
	}
	

});

$("#sbutton").click(function(){
	if($("#sname").val()==""){
		alert("Name cannot be empty!")
		
	}
	if($("#spassword").val()==""){
		alert("Password cannot be empty!")
		
	}
	

});
</script>

</body>
</html>