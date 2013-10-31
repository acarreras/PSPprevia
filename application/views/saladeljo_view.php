<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/saladeljo-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		$("#saladeljolemaok").click(function () {
			alert('dins el jquery de saladeljolemaok');
			// TODO: el boto entra aqui pero no fa be el post :-O (copy paste tota la pagina de saladelesparaules)
			$.post("<?php echo base_url()?>index.php/saladeljo/guardarLema", {titol : $("#saladeljolema").val()})
				.done(function(resultat) {
					$("#resultatlema").html(resultat);
				});
		});
	});
  </script>
</head>
<body>
	<div id="res"></div>
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
		<!-- autoretrat -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat1fet == false) { ?>
			
		<?php } else { ?>
			
		<?php } ?>
		
		<!-- lema -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat2fet == false) { ?>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladeljolema" name="saladeljolema"/>
				<input id="saladeljolemaok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Últims lemes</div>
				<div class="contingutsboxresposta" id="resultatlema"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutstexttitolresposta">Quin vas ser el teu lema?</div>
			<div class="contingutsboxresposta"><?php echo($lemapropi); ?></div>
			<div class="contingutstexttitolresposta">Quins lemes van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($lemaaltres); ?></div>
		<?php } ?>
	</div>
</body>
</html>