<?php
include("header.php");




//When the button is clicked
if (isset($_POST["editingsubmit"])){
$edit = mysqli_real_escape_string($link,$_POST["editing"]);
//Select the column whose id is equal to $edit from the "posts" table and get heading, text from there
$sql = "SELECT heading, text FROM posts WHERE id='".$edit."'";
//Database connection
$result = mysqli_query($link, $sql);


	while($row = mysqli_fetch_array($result)){

		
    echo '
	<div class="container">
	<div style="text-align:center">
		<textarea class="edittext" id="content" name="editinghead">'.$row["heading"].'</textarea>
		</div>
		<div style="text-align:center">
         <textarea class="texter" id="content" name="editingtext">'.$row["text"].'</textarea>
		</div>
		';
 } 
} ?>

	<form method="post">
        <div style="text-align:center">
		<button  id="edittingbutton" type="submit" name="editingsubmit" class="btn btn-success">Edit</button>
		</div>
		  <input type="text" name="editing" aria-label="First name" id="edit" class="form-control" placeholder="Number">
		</div>
		</form>
  

</body>
</html>