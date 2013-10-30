<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/saladelso-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		$("#saladelsotitula1ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo1", {titol : $("#saladelsotitula1").val()})
				.done(function(resultat1) {
					$("#resultattitolso1").html(resultat1);
				});
		});
		
		$("#saladelsotitula2ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo2", {titol : $("#saladelsotitula2").val()})
				.done(function(resultat2) {
					$("#resultattitolso2").html(resultat2);
				});
		});
		
		$("#saladelsotitula3ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo3", {titol : $("#saladelsotitula3").val()})
				.done(function(resultat3) {
					$("#resultattitolso3").html(resultat3);
				});
		});
		
		$("#saladelsotitula4ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo4", {titol : $("#saladelsotitula4").val()})
				.done(function(resultat4) {
					$("#resultattitolso4").html(resultat4);
				});
		});
	});
  </script>
</head>
<body>
<div id="res"><div>
	<div class="capcaleratitol"><?php if($bapartat11fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat12fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat13fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat14fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat21fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat22fet == true){ echo 'true'; } else { echo 'false'; };?></div>
	<div class="capcaleratitol"><?php if($bapartat3fet == true){ echo 'true'; } else { echo 'false'; };?></div>
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
		<!-- titula sons -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<!-- so 1 -->
		<audio controls>
			<source src="audio/petard.mp3" type="audio/mpeg">
			<source src="audio/petard.ogg" type="audio/ogg">
			<embed height="50" width="100" src="audio/petard.mp3">
		</audio>
		<?php if ($bapartat11fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula1" name="saladelsotitula1"/>
				<input id="saladelsotitula1ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso1"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Què vas dir que era? <?php echo($titolso1propi); ?></div>
			<div class="contingutsboxresposta">Què es? <?php echo($titolso1resposta); ?></div>
		<?php } ?>
		
		<!-- so 2 -->
		<audio controls>
			<source src="audio/petard.mp3" type="audio/mpeg">
			<source src="audio/petard.ogg" type="audio/ogg">
			<embed height="50" width="100" src="audio/petard.mp3">
		</audio>
		<?php if ($bapartat12fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula2" name="saladelsotitula2"/>
				<input id="saladelsotitula2ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso2"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Què vas dir que era? <?php echo($titolso2propi); ?></div>
			<div class="contingutsboxresposta">Què es? <?php echo($titolso2resposta); ?></div>
		<?php } ?>
		
		<!-- so 3 -->
		<audio controls>
			<source src="audio/petard.mp3" type="audio/mpeg">
			<source src="audio/petard.ogg" type="audio/ogg">
			<embed height="50" width="100" src="audio/petard.mp3">
		</audio>
		<?php if ($bapartat13fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula3" name="saladelsotitula3"/>
				<input id="saladelsotitula3ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso3"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Què vas dir que era? <?php echo($titolso3propi); ?></div>
			<div class="contingutsboxresposta">Què es? <?php echo($titolso3resposta); ?></div>
		<?php } ?>
		
		<!-- so 4 -->
		<audio controls>
			<source src="audio/petard.mp3" type="audio/mpeg">
			<source src="audio/petard.ogg" type="audio/ogg">
			<embed height="50" width="100" src="audio/petard.mp3">
		</audio>
		<?php if ($bapartat14fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula4" name="saladelsotitula4"/>
				<input id="saladelsotitula4ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso4"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Què vas dir que era? <?php echo($titolso4propi); ?></div>
			<div class="contingutsboxresposta">Què es? <?php echo($titolso4resposta); ?></div>
		<?php } ?>
		
		<!-- grava tranquilitat i perill -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		
		<!-- deixa en silenci -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
	</div>
</body>
</html>