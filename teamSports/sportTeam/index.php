<?php include_once 'konfiguracija.php'; ?>
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
    	
    	<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
		  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
		  <div class="title-bar-title">PBZ igrači</div>
		</div>
		
		<div class="top-bar" id="example-menu">
		  <div class="top-bar-left">
		    <ul class="dropdown menu" data-dropdown-menu>
				<li>
					<a href="index.php">Naslovna</a>
				</li>
				
		    </ul>
		  </div>
		
		</div>
    	
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>PBZ zadatak - pregled igrača</h1>
        </div>
      </div>
		<div class="large-12 cell">
				<a href="novi_igrac.php" class="button success expanded"><i class="fas fa-plus-circle fa-2x"></i></a>
				
				<form method="get">
					<input type="text" name="uvjet" 
					placeholder="Pretraživanje (ime, prezime ili email)"
					value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
				</form>
				
				<?php
					
					$uvjet = "%" . (isset($_GET["uvjet"]) ? $_GET["uvjet"] : "") . "%";
					
					$izraz = $veza->prepare("select count(*) from igraci 
					where concat(ime,prezime,email) like :uvjet");
					$izraz->execute(array("uvjet"=>$uvjet));
	
					$izraz = $veza->prepare("select * from igraci 
					where concat(ime,prezime,email) like :uvjet
					order by prezime, ime;");
					$izraz->bindParam("uvjet", $uvjet);
					$izraz->execute();
					$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
				
				  ?>
				
				<table>
					<thead>
						
						
						<tr>
							<th>Ime i prezime</th>
							<th>Datum rođenja</th>
							<th>Broj registracije</th>
							<th>Email</th>
							<th>Pozicija</th>
							<th>Akcija</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
					foreach ($rezultati as $red):
					?>
						
						<tr>
							<td><?php echo $red->ime . ' ' . $red->prezime; ?></td>
							<td><?php echo date("d.m.Y.",strtotime($red->datum_rodjenja)); ?></td>
							<td><?php echo $red->br_registracije; ?></td>
							<td><?php echo $red->email; ?></td>
							<td><?php echo $red->pozicija; ?></td>
						
							<td>
								<a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
									<?php   echo "<i title=\"Uredi\" class=\"far fa-edit fa-2x\"></i>";?></a>
								
								<a href="brisanje.php?sifra=<?php echo $red->sifra; ?>">
									<?php   echo "<i title=\"Obriši\" class=\"far fa-trash-alt fa-2x\"></i>";?></a>
								
							</td>
						</tr>
						
						<?php endforeach; ?>
						
						
					</tbody>
				</table>
				
			</div>
      <?php include_once 'podnozje.php'; ?>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/vendor/fontawesome-all.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
