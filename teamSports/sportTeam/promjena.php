<?php include_once 'konfiguracija.php'; 



if(!isset($_GET["sifra"])){
	$greska=array();
	
	if(isset($_POST["sifra"])){
		
		include_once 'kontrole.php';

	if(count($greska==0)){
		$izraz=$veza->prepare("update igraci set ime=:ime, prezime=:prezime, br_registracije=:br_registracije, 
		email=:email, datum_rodjenja=:datum_rodjenja, pozicija=:pozicija where sifra=:sifra;");
		$izraz->execute($_POST);
		header("location: index.php");
	}
	}else{
		header("location: index.php"); 
	}
	
}else{
	
	$izraz=$veza->prepare("select * from igraci where sifra=:sifra");
	$izraz->execute($_GET);
	$_POST=$izraz->fetch(PDO::FETCH_ASSOC);
	$_POST["datum_rodjenja"]=date("Y-m-d",strtotime($_POST["datum_rodjenja"]));
	
}


?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBZ igrači</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <div class="grid-container">
    
      	<a href="index.php"><i style="color: red;" class="fas fa-chevron-circle-left fa-3x"></i></a>
      	<div class="grid-x grid-padding-x">
			<div class="large-4 large-offset-4 cell centered">
				<form class="log-in-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				  <h4 class="text-center">Promjena detalja igrača</h4>
				  
				  <?php if(!isset($greska["ime"])): ?>
				  <label>Ime
				    <input  type="text" id="ime" name="ime" placeholder="Ivan"
				    value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : ""; ?>">
				  </label>
				  <?php else: ?>
				   <label class="is-invalid-label">
				    Ime
				    <input type="text"  id="ime" name="ime" class="is-invalid-input"  aria-invalid aria-describedby="uuid"
				    value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : ""; ?>" >
				    <span class="form-error is-visible" id="uuid"><?php echo $greska["ime"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				   <?php if(!isset($greska["ime"])): ?>
				  <label>Prezime
				    <input  type="text" id="prezime" name="prezime" placeholder="Horvat"
				    value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : ""; ?>">
				  </label>
				  <?php else: ?>
				   <label class="is-invalid-label">
				    Prezime
				    <input type="text"  id="prezime" name="prezime" class="is-invalid-input"  aria-invalid aria-describedby="uuid"
				    value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : ""; ?>" >
				    <span class="form-error is-visible" id="uuid"><?php echo $greska["prezime"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				  
				  <?php if(!isset($greska["datum_rodjenja"])): ?>
				  <label>Datum rođenja
				    <input  type="date" id="datum_rodjenja" name="datum_rodjenja"
				    value="<?php echo isset($_POST["datum_rodjenja"]) ? $_POST["datum_rodjenja"] : ""; ?>">
				  </label>
				  <?php else: ?>
				   <label class="is-invalid-label">
				    Datum rođenja
				    <input type="date"  id="datum_rodjenja" name="datum_rodjenja" class="is-invalid-input"  
				    aria-invalid aria-describedby="greskaDatumPocetka"
				    value="<?php echo isset($_POST["datum_rodjenja"]) ? $_POST["datum_rodjenja"] : ""; ?>" >
				    <span class="form-error is-visible" id="greskaDatumPocetka"><?php echo $greska["datum_rodjenja"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				  
				   <?php if(!isset($greska["br_registracije"])): ?>
				  <label>Broj registracije
				    <input type="number" step="1" id="br_registracije" name="br_registracije" placeholder="XXXXXXXX"
				    value="<?php echo isset($_POST["br_registracije"]) ? $_POST["br_registracije"] : ""; ?>">
				  </label>
				  <?php else: ?>
				  <label class="is-invalid-label">
				    Broj registracije
				    <input type="number" step="1" id="br_registracije" name="br_registracije" class="is-invalid-input"  aria-invalid aria-describedby="uuid"
				    value="<?php echo isset($_POST["br_registracije"]) ? $_POST["br_registracije"] : ""; ?>" >
				    <span class="form-error is-visible" id="uuid"><?php echo $greska["br_registracije"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				  
				  <?php if(!isset($greska["email"])): ?>
				  <label>Email
				    <input  type="text" id="email" name="email" placeholder="primjer@zns.hr"
				    value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>">
				  </label>
				  <?php else: ?>
				   <label class="is-invalid-label">
				    Email
				    <input type="text"  id="email" name="email" class="is-invalid-input"  aria-invalid aria-describedby="uuid"
				    value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" >
				    <span class="form-error is-visible" id="uuid"><?php echo $greska["email"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				  
				  <?php if(!isset($greska["pozicija"])): ?>
				  <label>Pozicija
				    <input  type="text" id="pozicija" name="pozicija" placeholder="Napadač"
				    value="<?php echo isset($_POST["pozicija"]) ? $_POST["pozicija"] : ""; ?>">
				  </label>
				  <?php else: ?>
				   <label class="is-invalid-label">
				    Pozicija
				    <input type="text"  id="pozicija" name="pozicija" class="is-invalid-input"  aria-invalid aria-describedby="uuid"
				    value="<?php echo isset($_POST["pozicija"]) ? $_POST["pozicija"] : ""; ?>" >
				    <span class="form-error is-visible" id="uuid"><?php echo $greska["pozicija"]; ?></span>
				  </label>
				  <?php endif; ?>
				  
				  
				  <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"]; ?>"></input>
				  <p><input type="submit" class="button expanded" value="Promijeni igrača"></input></p>
				</form>
				
			</div>
		</div>
		<?php include_once 'podnozje.php'; ?>
		
      
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/vendor/fontawesome-all.min.js"></script>
    <script src="js/app.js"></script>
     <script>
    <?php if(isset($greska["ime"])):?>	
    		setTimeout(function(){ $("#ime").focus(); },1000);	
    <?php elseif(isset($greska["prezime"])):?>	
	    		setTimeout(function(){ $("#prezime").focus(); },1000);	
	<?php elseif(isset($greska["br_registracije"])):?>	
	    		setTimeout(function(){ $("#br_registracije").focus(); },1000);	
	<?php elseif(isset($greska["email"])):?>	
	    		setTimeout(function(){ $("#email").focus(); },1000);	
	<?php elseif(isset($greska["pozicija"])):?>	
	    		setTimeout(function(){ $("#pozicija").focus(); },1000);	
	<?php endif; ?>
	</script>
  </body>
</html>
