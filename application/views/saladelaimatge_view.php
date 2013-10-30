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
		<img class="contingutsimatge50percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtra01.png'; ?>" />
		
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