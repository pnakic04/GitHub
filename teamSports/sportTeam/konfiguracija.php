<?php

session_start();

if($_SERVER["HTTP_HOST"]==="nakicp.byethost31.com"){
	$host="sql207.byethost31.com";
	$dbname="b31_21726736_pbz";
	$dbuser="b31_21726736";
	$dbpass="jaruge2018";

}else{
	$host="localhost";
	$dbname="team";
	$dbuser="pbz";
	$dbpass="pbz";
}


try{
	$veza = new PDO("mysql:host=" . $host . ";dbname=" . $dbname,$dbuser,$dbpass);
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8';");
	$veza->exec("SET NAMES 'utf8';");
}catch(PDOException $e){
	
	switch($e->getCode()){
		case 1049:
			header("location: " . $putanjaAPP . "greske/kriviNazivBaze.html");
			exit;
			break;
		default:
			header("location: " . $putanjaAPP . "greske/greska.php?code=" . $e->getCode());
			exit;
			break;
	}
	

}
