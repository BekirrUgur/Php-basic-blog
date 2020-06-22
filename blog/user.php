<?php

include("header.php");

//butona tıklandığı zaman
if (isset($_POST["fsubmit"])){
	//İsim veya şifrenin dolu olup olmadığını kontrol eder
	if($_POST["fname"]=="" || $_POST["fpassword"]=="" ){
		

		
	}else{
		//sql injectionlardan korunmak için alınan girdiyi başka bir değişkende tutma
		$fname=mysqli_real_escape_string($link, $_POST["fname"]);
		$fpassword=mysqli_real_escape_string($link, $_POST["fpassword"]);
		//Elde edilen bilgiyi admin tablosuna ekler
		$sql="INSERT INTO admin (username, password) 
		VALUES ('".$fname."', '".$fpassword."')";
		//Form gönderme işleminin tekrar etmemesi için kayıt sonrası index sayfasına yönlendirme yapar
		if(mysqli_query($link, $sql)){
			
			header("Location:index.php");
			
		};	
	}	
}

if(isset($_POST["ssubmit"])){
	
	if($_POST["sname"]==""){
		
		
		
	}
	//içeriğin dolululğunu kontrol eder
	else if($_POST["spassword"]==""){
		
		
		
	}else{
	$sname = mysqli_real_escape_string($link,$_POST["sname"]);
	$spassword = mysqli_real_escape_string($link,$_POST["spassword"]);
	
	//veri tabanından admin tablosundaki kullanıcı ve şifreyi alır
	$sql = "SELECT username, password FROM admin";
	//veritabanına bağlantı
	if($result = mysqli_query($link, $sql)){
	
		$row = mysqli_fetch_assoc($result);
		//Şifre ve kullanıcı adının veri tabanı ile doğruluğunu kontrol eder
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
<!-- Üye giriş kısmı-->
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

<!-- Üye kaydolma kısmı-->
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