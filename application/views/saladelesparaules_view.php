<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/saladelesparaules-fonsnet.png'; ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/styles/site.css'; ?>">
	<!--Load JQUERY from Google's network -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script> 
    // using JQUERY's 
    $(document).ready(function () {
		// set an on click on the button per a guardar el titol que hem posat a la imatge
		$("#saladelesparaulestitulaok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelesparaules/guardarTitolImatge", {titol : $("#saladelesparaulestitula").val()})
				.done(function(resultat) {
					$("#resultattitols").html(resultat);
				});
		});
		
		$("#saladelesparaulesetiquetaok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelesparaules/guardarEtiquetes", {etiqueta1 : $("#saladelesparaulesetiqueta1").val(), 
			etiqueta2 : $("#saladelesparaulesetiqueta2").val(), etiqueta3 : $("#saladelesparaulesetiqueta3").val()})
				.done(function(percentatges) {
					// TODO: aquest resultat es retorna tot junt i molaria que fossin separats per a maquetar-ho millor (parsing?)
					$("#resultatetiqueta3").html(percentatges);
				});
		});
		
		$("#saladelesparaulesdefguerra1ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelesparaules/guardarDefGuerra1", {def : $("#saladelesparaulesdefineixguerra10paraules").val()})
				.done(function(resultat) {
					$("#resultatdefguerra1").html(resultat);
				});
		});
		
		$("#saladelesparaulesdefguerra2ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelesparaules/guardarDefGuerra2", {def : $("#saladelesparaulesdefineixguerratecnic").val()})
				.done(function(resultat) {
					$("#resultatdefguerra2").html(resultat);
				});
		});
		
		$("#saladelesparaulesdefguerra3ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelesparaules/guardarDefGuerra3", {def : $("#saladelesparaulesdefineixguerranen").val()})
				.done(function(resultat) {
					$("#resultatdefguerra3").html(resultat);
				});
		});
	});
  </script>
</head>
<body>
	<div id="res"></div>
	<div class="capcaleratitol"><?php if($bapartat1fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat2fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat31fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat32fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat33fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<!-- menú superior dreta -->
	<div class="capcaleratitol"><?php echo($titol);?></div>
	<a class="capcalerasortir right" href="home/logout">SORTIR</a>
	<div class="capcalerabarra right">I</div>
	<div class="capcalerausername right"><?php echo($username); ?></div>
	<br/><br/>
	<a class="capcalerahome right" href="home">^</a>
	<div class="capcalerabarra right">I</div>
	<?php if($salanext != NULL){ ?>
		<a class="capcalerafletxa right" href="<?php echo($salanext); ?>">></a>
		<div class="capcalerabarra right">I</div>
	<?php } ?>
	<?php if($salaprev != NULL){ ?>
		<a class="capcalerafletxa right" href="<?php echo($salaprev); ?>"><</a>
		<div class="capcalerabarra right">I</div>
	<?php } ?>
	
	<!-- continguts -->
	<div class="contingutsbox">
		<!-- titula -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<img class="contingutsimatge50percent" src="<?php echo base_url().'/assets/images/saladelesparaules/titula01.png'; ?>" />
		<?php if ($bapartat1fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelesparaulestitula" name="saladelesparaulestitula"/>
				<input id="saladelesparaulestitulaok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Què han escrit els altres participants?</div>
				<div class="contingutsboxresposta" id="resultattitols"></div>
			</form>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas escriure tu?</div>
			<div class="contingutsboxresposta"><?php echo($titolimatgepropi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($titolimatgealtres); ?></div>
		<?php } ?>
		
		<!-- etiqueta -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<img class="contingutsimatge50percent" src="<?php echo base_url().'/assets/images/saladelesparaules/etiqueta01.png'; ?>" />
		<?php if ($bapartat2fet == false) {?>
		<form>
			<input id="saladelesparaulesetiqueta1" name="etiqueta1" type="radio"/>
			<div class="contingutsetiqueta">entusiasme</div>
			<div class="contingutsboxresposta" id="resultatetiqueta1"></div>
			
			<input id="saladelesparaulesetiqueta2" name="etiqueta2" type="radio"/>
			<div class="contingutsetiqueta">amistat</div>
			<div class="contingutsboxresposta" id="resultatetiqueta2"></div>
			
			<input id="saladelesparaulesetiqueta3" name="etiqueta3" type="radio"/>
			<div class="contingutsetiqueta">familiar</div>
			<div class="contingutsboxresposta"  id="resultatetiqueta3"></div>
			<input id="saladelesparaulesetiquetaok" type="button" value="ok"/>
		</form>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas escriure tu?</div>
			<div class="contingutsboxresposta"><?php echo($etiquetapropia); ?></div>
			<div class="contingutstexttitolresposta">Quins son els resultats globals?</div>
			<div class="contingutsboxresposta"><?php echo($percentatgeetiqueta1); echo($percentatgeetiqueta2); echo($percentatgeetiqueta3); ?></div>
		<?php } ?>
		
		<!-- defineix guerra -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat31fet == false) {?>
			<div class="contingutstitol">. Què tingui com a màxim 10 paraules</div>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladelesparaulesdefineixguerra10paraules" name="saladelesparaulesdefineixguerra10paraules"/>
				<input id="saladelesparaulesdefguerra1ok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Com ho han definit els altres galeristes?</div>
				<div class="contingutsboxresposta" id="resultatdefguerra1"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutstexttitolresposta">Com ho vas definir en 10 paraules?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra1propi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra1altres); ?></div>
		<?php } ?>
		
		<?php if ($bapartat32fet == false) {?>
			<div class="contingutstitol">. Amb paraules tècniques o científiques</div>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladelesparaulesdefineixguerratecnic" name="saladelesparaulesdefineixguerratecnic"/>
				<input id="saladelesparaulesdefguerra2ok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Com ho han definit els altres galeristes?</div>
				<div class="contingutsboxresposta" id="resultatdefguerra2"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutstexttitolresposta">Com ho vas definir amb paraules tècniques o científiques?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra2propi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra2altres); ?></div>
		<?php } ?>
		
		<?php if ($bapartat33fet == false) {?>
			<div class="contingutstitol">. Amb paraules que pugui entendre un nen petit</div>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladelesparaulesdefineixguerranen" name="saladelesparaulesdefineixguerranen"/>
				<input id="saladelesparaulesdefguerra3ok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Com ho han definit els altres galeristes?</div>
				<div class="contingutsboxresposta" id="resultatdefguerra3"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutstexttitolresposta">Com ho vas definir amb paraules de nen petit?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra3propi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($defguerra3altres); ?></div>
		<?php } ?>

	</div>
</body>
</html>