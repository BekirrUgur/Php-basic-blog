<?php
include("header.php");

if(isset($_POST["dsubmit"])){
	//içeriğin dolululğunu kontrol eder
	if($_POST["edit"]==""){
		
		
	}

	else{
	$edit = mysqli_real_escape_string($link,$_POST["edit"]);
	
	//Silinecek olan verinin id sini alır
	$sql = "DELETE from posts WHERE id='".$edit."'";
	//veritabanına bağlantı ve silme işlemi
	 if(mysqli_query($link, $sql)){
			
			header("Location:index.php");
			
		};
		
		
	}
	
 }
	
	
	


?>

<form method="post">
<h2 class="sign-in">Edit</h2>
<div class="fixed">
<div class="input-group">
  <div style="width:20%;"  class="input-group-prepend">
    <span style="width:100%;" style="border-radius:3px" class="input-group-text">Edit Number</span>
  </div >

  <input type="text" name="edit" aria-label="First name" id="edit" class="form-control" placeholder="Number">

</div>
</div>
<button type="submit" name="dsubmit" id="dbutton"class="btn btn-primary">Delete</button>
<button type="submit" name="esubmit" id="ebutton"class="btn btn-primary">Edit</button>


</form>