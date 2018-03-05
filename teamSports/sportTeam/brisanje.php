<?php include_once 'konfiguracija.php'; 


if(!isset($_GET["sifra"])){
	
		header("location: index.php");
	
}else{
	
	$izraz=$veza->prepare("delete from igraci where sifra=:sifra");
	$izraz->execute($_GET);
	header("location: index.php");
	
}

