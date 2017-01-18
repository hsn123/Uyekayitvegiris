<html>
<head>
<link rel="stylesheet" href="anaekran.css" >
</head>
<body background="Resim/resim1.jpg">
<center>
<?php


?>
<div id="arka">
  <body> <br/>

  <label>ÜYE GİRİS</label>
<hr>
<form method="post"><br/>
<input type="text" name="ad" placeholder="ad"/><br/><br/>
<input type="password" name="sifre" placeholder="Şifre"/><br/><br/>
<button type="submit" name="giris">GİRİŞ</button>
</form>
<?php
ob_start();
if(isset($_POST["giris"])){
	/*$baglanti = new PDO("mysql:dbname=uyekaydi;host=localhost","root","");
	$komut = $baglanti->query("SELECT md5sifre FROM kullanicigiris WHERE ad='".$_POST["ad"]."'");
	$sorgu = $komut->fetch(PDO::FETCH_ASSOC);
	print_r ($sorgu);
	if(count($sorgu)>0){
	if ($sorgu["md5sifre"] == md5($_POST["sifre"])){
	echo "<br>Hoşgeldin<br>";
	}
	else{
	$hata = "Şifre Yanlış";
	}
}
else{
	$hata = "kullanici Bulunamadı";
}*/
$baglanti2 = new PDO("mysql:dbname=uyekaydi;host=localhost","root","");
			$baglanti1 = new PDO("mysql:dbname=uyekaydi;host=localhost","root","");
		
				$sorgu1 = $baglanti1->query("SELECT ad FROM kullanicigiris WHERE ad='" . $_POST["ad"] ."'",PDO::FETCH_ASSOC);
	$sorgu2 = $baglanti2->query("SELECT sifre FROM kullanicigiris WHERE sifre='" . $_POST["sifre"] ."'",PDO::FETCH_ASSOC);
	$komut1 = $sorgu1->fetch(PDO::FETCH_ASSOC);
	$komut2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
	
$uye= $_POST["ad"];

if($_POST["ad"]=$komut1)
{
	echo "üye adın doğru";
	
if($_POST["sifre"]=$komut2)
{
	/*include("sayfa1.php");*/
	echo "şifre doğru";
	

	
	header("refresh:0;url=index.php");
}
}
else
{
	echo "kullanıcı adı veya şifre yanlış";
}
}
ob_end_flush();
?>

</div>
</body>
</center>
</body>
</html>