<?php

if(trim($_POST["ime"])===""){
		$greska["ime"]="Naziv obavezno";
	}
	
	if(strlen(trim($_POST["ime"]))>50){
		$greska["ime"]="Ime predugačko, smanjite ga ispod 50 znakova";
	}
	
	if(strlen(trim($_POST["prezime"]))>50){
		$greska["prezime"]="Prezime predugačko, smanjite ga ispod 50 znakova";
	}
	if(!isset($_POST["sifra"])){
		$_POST["sifra"]=0;
	}
	$izraz=$veza->prepare("select sifra from igraci where br_registracije=:br_registracije and sifra!=:sifra");
	$izraz->execute(array("br_registracije"=>$_POST["br_registracije"], "sifra"=>$_POST["sifra"]));
	$sifra = $izraz->fetchColumn();
	if($sifra>0){
		$greska["br_registracije"]="Broj registracije postoji u bazi, odabrati drugi";
	}
	
	
	if(trim($_POST["prezime"])===""){
		$greska["prezime"]="Prezime obavezno";
	}
	
	if(trim($_POST["email"])===""){
		$greska["email"]="Email obavezno";
	}
	
	if(trim($_POST["pozicija"])===""){
		$greska["pozicija"]="Pozicija obavezno";
	}
	if(trim($_POST["br_registracije"])===""){
		$greska["br_registracije"]="Broj registracije obavezno";
	}
	if(trim($_POST["datum_rodjenja"])===""){
		$greska["datum_rodjenja"]=" Datum rodjenja obavezno";
	}