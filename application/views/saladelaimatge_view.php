<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/salaimatge-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		
		$("#saladelaimatgegraffitiok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelaimatge/guardarGraffiti", {titol : $("#saladelaimatgegraffitiperque").val()})
				.done(function(resultat) {
					// TODO: retornar per separat els texts (parsejar?) i les imatges (parsejar imatges eing?)
					$("#resultatgraffitis").html(resultat);
				});
		});
		
		$bfiltre1 = false; $bfiltre2 = false; $bfiltre3 = false;
		$bfiltratok = false;
		$("#saladelaimatgefiltre1").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre2 = false; $bfiltre3 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre1.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre1").mouseleave(function() {
			if($bfiltre1 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.png'; ?>');
			}
		});
		$("#saladelaimatgefiltre1").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre1.jpg'; ?>');
				$bfiltre1 = true;
				}
		});
		
		$("#saladelaimatgefiltre2").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre1 = false; $bfiltre3 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre2.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre2").mouseleave(function() {
			if($bfiltre2 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.png'; ?>');
			}
		});
		$("#saladelaimatgefiltre2").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre2.jpg'; ?>');
				$bfiltre2 = true;
			}
		});
		
		$("#saladelaimatgefiltre3").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre1 = false; $bfiltre2 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre3.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre3").mouseleave(function() {
			if($bfiltre3 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.png'; ?>');
			}
		});
		$("#saladelaimatgefiltre3").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre3.jpg'; ?>');
				$bfiltre3 = true;
			}
		});
		
		$("#saladelaimatgefiltreok").click(function () {
			$numfiltre = 0;
			if($bfiltre1 == true){
				$numfiltre = 1;
			}
			if($bfiltre2 == true){
				$numfiltre = 2;
			}
			if($bfiltre3 == true){
				$numfiltre = 3;
			}
			$.post("<?php echo base_url()?>index.php/saladelaimatge/guardaFiltre", {num : $numfiltre})
				.done(function() {
					$bfiltratok = true;
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre1", {})
				.done(function(percentatge1) {
					$("#resultatfiltre1").html("total de filtres lisa: " + percentatge1);
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre2", {})
				.done(function(percentatge2) {
					$("#resultatfiltre2").html("total de filtres micky: " + percentatge2);
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre3", {})
				.done(function(percentatge3) {
					$("#resultatfiltre3").html("total de filtres rob: " + percentatge3);
					$("#resultatfiltres").html("Total de filtres usats:");
				});
			
		});
	});
  </script>
</head>
<body>
<div id="res"><div>
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
		<!-- filtra -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat1fet == false) {?>
			<img id="saladelaimatgeimatgefiltra" class="contingutsimatge60percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtra01.png'; ?>" />
			<img id="saladelaimatgefiltre1" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre1.png'; ?>" />
			<img id="saladelaimatgefiltre2" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre2.png'; ?>" />
			<img id="saladelaimatgefiltre3" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre3.png'; ?>" />
			<div style="margin-top:2%"></div>
			<form>
				<input id="saladelaimatgefiltreok" type="button" value="ok"/>
			</form>
			<div style="margin-top:5%"></div>
			<div class="contingutstexttitolresposta" id="resultatfiltres"></div>
			<div class="contingutsboxresposta" id="resultatfiltre1"></div>
			<div class="contingutsboxresposta" id="resultatfiltre2"></div>
			<div class="contingutsboxresposta" id="resultatfiltre3"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">El teu filtre</div>
			<img class="contingutsimatge60percent" id="imatgefiltrada" src="<?php echo base_url().$filtrepropi; ?>" />
			<div class="contingutstexttitolresposta">Els més usats son?</div>
			<div class="contingutsboxresposta">
				filtres lily: <?php echo($percentatgeetiqueta1); ?><br/>
				filtres mocky: <?php echo($percentatgeetiqueta2);  ?><br/>
				filtres rob: <?php echo($percentatgeetiqueta3); ?>
			</div>
		<?php } ?>
		<!-- puja imatge carrer -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat2fet == false) {?>
			<form>
				<input type="text" class="contingutstextformrequadre" id="saladelaimatgegraffitiperque" name="saladelaimatgegraffitiperque"/>
				<input id="saladelaimatgegraffitiok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Què han trobat pel carrer els altres artístes?</div>
				<div class="contingutsboxresposta" id="resultatgraffitis"></div>
			</form>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas escriure tu?</div>
			<div class="contingutsboxresposta"><?php echo($perquegraffitipropi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($perquegraffitialtres); ?></div>
		<?php } ?>
		<!-- fotograma -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
	</div>
</body>
</html>