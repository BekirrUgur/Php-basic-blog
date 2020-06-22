<?php
include("header.php");



//butona tıklandığı zaman
if (isset($_POST["submit"])){
	//başlığın dolu olup olmadığını kontrol eder
	if($_SESSION["user"]="admin"){
	if($_POST["heading"]==""){
		
	
		
	}
	//içeriğin dolululğunu kontrol eder
	else if($_POST["text"]==""){
		
	
		
	}else{
		//sql injectionlardan korunmak için alınan girdiyi başka bir değişkende tutma
		$heading=mysqli_real_escape_string($link, $_POST["heading"]);
		$text=mysqli_real_escape_string($link, $_POST["text"]);
		//Elde edilen bilgiyi posts tablosuna ekler
		$sql="INSERT INTO posts (heading, text) 
		VALUES ('".$heading."', '".$text."')";
		//Form gönderme işleminin tekrar etmemesi için kayıt sonrası index sayfasına yönlendirme yapar
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

// başlık ve içeriğin boş olması durumunda alertbox yaratır.
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