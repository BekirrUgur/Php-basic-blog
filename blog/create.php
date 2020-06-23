<?php
include("header.php");



//When the button is clicked
if (isset($_POST["submit"])){
	//Checks if the title is full
	if($_SESSION["user"]="admin"){
	if($_POST["heading"]==""){
		
	
		
	}
	//Checks the fullness of the content
	else if($_POST["text"]==""){
		
	
		
	}else{
		//Keeping the input received in another variable to avoid SQL injections
		$heading=mysqli_real_escape_string($link, $_POST["heading"]);
		$text=mysqli_real_escape_string($link, $_POST["text"]);
		//Adds the obtained information to the posts table
		$sql="INSERT INTO posts (heading, text) 
		VALUES ('".$heading."', '".$text."')";
		//Redirects to the index page after registration so as not to repeat the form submission process
		if(mysqli_query($link, $sql)){
			
			header("Location:index.php");
			
		};
		
	}
  }else{
	  echo "GİRİŞ YAPMADINIZ";
	  
  }
}
?>
<div class="container">
  <form method="post">
  <h2>Title</h2>
  <input type="text" id="title" class="heading" name="heading" /><br/>
  <h2>Content</h2><br/>
  <textarea class="text" id="content" name="text"></textarea><br/>
  <button id="cbutton" type="submit" name="submit" class="btn btn-success">Send</button>
  </form>
</div>
<script type="text/javascript">

// If the title and content are empty, it creates an alertbox.
$("#cbutton").click(function(){
	if($("#title").val()==""){
		alert("Title cannot be empty!")
		
	}
	if($("#content").val()==""){
		alert("Content cannot be empty!")
		
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