<?php
include("header.php");


?>

<?php
//Selects by id from posts table in database - DESC from highest id to low
$sql = "SELECT * FROM posts ORDER BY id DESC";
//Mold function for imaging
$result = mysqli_query($link, $sql);
//If the value in the database is more than 0, that is, it takes the process of getting the data.
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		
		echo '
		<!-- Her bir gönderinin yeni bir  metin kutusu içerisinde gösterilmesini sağlar -->
		<div class="container">
		<h2 style="text-align:center;" >'.$row["heading"].'</h2>
		<b>Düzenleme numarası: </b>'.$row["id"].'
         <p>'.$row["text"].'</p>
		</div>
		';
	}
}

?>

</body>
</html>