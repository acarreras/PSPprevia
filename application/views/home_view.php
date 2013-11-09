<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PSP galeria</title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/mapa-fonsnet.png'; ?>);
			background-repeat: no-repeat;
			background-position: center center;
			background-attachment: fixed;
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
		
		$("span").hide(5);
		$("span:first-child").show("fast", function() {
			// Use arguments.callee so we don't need a named function
			$(this).next().show("fast", arguments.callee );
		});
	});
  </script>
</head>
<body>
	<!-- menú superior dreta -->
	<div class="titolbox">
		<a class="capcalerasortir right" href="home/logout">SORTIR</a>
		<div class="capcalerabarra right">I</div>
		<div class="capcalerausername right"><?php echo($username); ?></div>
	</div>
	<!-- pinzellades -->
	<img class="mapasales" src="<?php echo base_url().'/assets/images/fons/mapa-sales.png'; ?>" />
	<?php if($bsala1feta == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaLLENGUATGEover.png'; ?>" />
	<?php } ?>
	<?php if($bsala2feta == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaSOover.png'; ?>" />
	<?php } ?>
	<?php if($bsala3feta == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaDELAIMATGEover.png'; ?>" />
	<?php } ?>
	<?php if($bsala4feta == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaJOover.png'; ?>" />
	<?php } ?>
	<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaBIBLIOover.png'; ?>" />
	<?php if($bexpoglobal == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaEXPOGLOBALover.png'; ?>" />
	<?php } ?>
	<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaDOLORiFELICITATover.png'; ?>" />
	<?php if($bsala7feta == true){ ?>
		<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaWCover.png'; ?>" />
	<?php } ?>
	<img class="mapasales" src="<?php echo base_url().'/assets/images/pinzellades/salaLAMEVAEXPOover.png'; ?>" />
	<!-- text presentacio -->
	<div class="contingutsboxresposta">
	  <span>Hola,</span> <span>soc la I,</span> <span>la que va anar a K,</span> <span>sí!</span></br>
	  <span>Si jo fos pintora...</span> <span>com R,</span> <span>sabeu aquell</span> <span>que diuen que mantenia</span> <span>l'univers tot blanc</span></br>
	  <span>Si jo fos pintora</span> <span>potser</span> <span>tot seria</span> <span>més fàcil</span> <span>Ajudeu-me a representar</span> <span> el DOLOR</span> <span>i la FELICITAT!</span>
	</div>
	<!-- links a sales -->
	<div class="saladelesparaulesbox">
		<a class="mapa" href="<?php echo ('saladelesparaules'); ?>">SALA DE</br>LES PARAULES</a>
	</div>
	<div class="saladelsobox">
		<a class="mapa" href="<?php echo ('saladelso'); ?>">SALA</br>DEL</br>SO</a>
	</div>
	<div class="saladelaimatgebox">
		<a class="mapa" href="<?php echo ('saladelaimatge'); ?>">SALA DE</br>LA IMATGE</a>
	</div>
	<div class="saladeljobox">
		<a class="mapa" href="<?php echo ('saladeljo'); ?>">SALA DEL JO</a>
	</div>
	<div class="bibliotecabox">
		<a class="mapa" href="<?php echo ('biblioteca'); ?>">BIBLIOTECA</br>(DOSSIERS</br>PEDAGOGICS)</a>
	</div>
	<?php if($bexpoglobal == true){ ?>
		<div class="exposicioglobalbox">
			<a class="mapa" href="<?php echo ('exposicioglobal'); ?>">L'EXPOSICIO</br>GLOBAL</a>
		</div>
	<?php } else{ ?>
		<div class="exposicioglobalbox">
			<a class="mapa" href="#">L'EXPOSICIO</br>GLOBAL</a>
			<div class="contingutsboxresposta">(supera les sales</br>per entrar)</div>
		</div>
	<?php } ?>
	<div class="saladeldolorilafelicitatbox">
		<a class="mapa" href="<?php echo ('saladeldolorilafelicitat'); ?>">SALA DEL</br>DOLOR I LA</br>FELICITAT</a>
	</div>
	<div class="wcbox">
		<a class="mapa" href="<?php echo ('wc'); ?>">WC</a>
	</div>
	<div class="lamevaexposiciobox">
		<a class="mapa" href="<?php echo ('lamevaexposicio'); ?>">LA MEVA</br>EXPOSICIO</a>
	</div>
</body>
</html>

