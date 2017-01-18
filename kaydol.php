<html>
<head>
<link rel="stylesheet" href="kaydol.css" >
</head>
<body background="Resim/resim1.jpg">
<center>

<div id="arkaplan">
  <body> <br/>
<?php
session_start();
if(isset($_POST["ad"]) && ($_POST["soyad"]) && ($_POST["eposta"]) && ($_POST["sifre"])){
	if($_POST["ad"]!="" && $_POST["soyad"]!="" && $_POST["eposta"]!="" && $_POST["sifre"]!=""){
		
		$baglanti = new PDO("mysql:dbname=uyekaydi;host=localhost","root","");
		$sorgu = $baglanti->query("SELECT id FROM kullanicigiris WHERE ad='" . $_POST["ad"] ."'",PDO::FETCH_ASSOC);
		if($sorgu->rowCount()){
		$hata = "Daha Önceden Böyle Bir Kullanıcı Kayıt Yapmış";
		}
		else{
		$komut = $baglanti->prepare("INSERT INTO kullanicigiris (ad,soyad,eposta,sifre) VALUES ('".$_POST["ad"]."','".$_POST[					  		"soyad"]."','".$_POST["eposta"]."','".$_POST["sifre"]."')");
		$komut->execute(array($_POST["ad"],($_POST["soyad"]),$_POST["eposta"],($_POST["sifre"])));
		"Başarılı bir şekilde kaydınızı yaptınız.";
		}
		}
	}
?>

 <label>ÜYE KAYIT FORMU</label> <br/><br/>
 <hr>
<form method="post">
<input name="ad" type="text" placeholder="ad"/><br/><br/>
<input name="soyad" type="text" placeholder="soyad"/><br/><br/>
<input name="eposta" type="email" placeholder="eposta"/><br/><br/>
<input name="sifre" type="password" placeholder="şifre"/><br/><br/>
<button type="submit" name="Kaydol">Kaydol</button>
</form>







</div>
</body>
</center>
</body>
</html>