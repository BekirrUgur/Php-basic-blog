<?php
include("header.php");


?>

<?php
//veritabanındaki posts tablosundan id ye göre seçiyor - DESC en yüksek id değerinden düşüğe doğru
$sql = "SELECT * FROM posts ORDER BY id DESC";
//görüntüleme için kalıp fonksiyon
$result = mysqli_query($link, $sql);
//veritabanındaki değeri 0 dan fazlaysa yani doluysa veriyi al işlemini yapıyor
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		
		echo '
		<!-- Her bir gönderinin yeni bir  metin kutusu içerisinde gösterilmesini sağlar -->
		<div class="container">
		<h2 style="text-align:center;" >'.$row["heading"].'</h2>
         <p>'.$row["text"].'</p>
		</div>
		';
	}
}

?>

</body>
</html>