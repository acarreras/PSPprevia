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
	
		$num = 3;
		if($num > 0) {
			$stringurl = "url(<?php echo base_url().'assets/images/pinzellades/salaLLENGUATGEover.png'; ?>), " + $('html').css('background');
			$('html').css('background', $stringurl);
			$stringrepeat = "no-repeat, " + $('html').css('background-repeat');
			$('html').css('background-repeat', $stringrepeat);
			$stringposition = "center center, " + $('html').css('background-position');
			$('html').css('background-position', $stringposition);
			$stringbckgrndsize = "cover, cover";
			$('html').css('background-size', $stringbckgrndsize);
		}
		if($num > 1) {
			$stringurl = "url(<?php echo base_url().'assets/images/pinzellades/salaSOover.png'; ?>), " + $('html').css('background');
			$('html').css('background', $stringurl);$stringrepeat = "no-repeat, " + $('html').css('background-repeat');
			$('html').css('background-repeat', $stringrepeat);
			$stringposition = "center center, " + $('html').css('background-position');
			$('html').css('background-position', $stringposition);
			$stringbckgrndsize = "cover, cover, cover";
			$('html').css('background-size', $stringbckgrndsize);
		}
	});
  </script>
</head>
<body>
	<!-- menú superior dreta -->
	<a class="capcalerasortir right" href="home/logout">SORTIR</a>
	<div class="capcalerabarra right">I</div>
	<div class="capcalerausername right"><?php echo($username); ?></div>
	
	<?php if ($bsala1feta == true) { ?>
	
	<?php } else { ?>
	<?php } ?>
	
	<a href="<?php echo ('saladelesparaules'); ?>">sala 1</a>
	<a href="<?php echo ('saladelso'); ?>">sala 2</a>
	<a href="<?php echo ('saladelaimatge'); ?>">sala 3</a>
	<a href="<?php echo ('saladeljo'); ?>">sala 4</a>
	<a href="<?php echo ('biblioteca'); ?>">sala 5</a>
	<a href="<?php echo ('exposicioglobal'); ?>">sala 6</a>
	<a href="<?php echo ('saladeldolorilafelicitat'); ?>">sala 7</a>
	<a href="<?php echo ('wc'); ?>">sala 8</a>
	
	</br></br></br>
	
	<div class="contingutsboxresposta">
	  <span>Hola,</span> <span>soc la I,</span> <span>la que va anar a K,</span> <span>sí!</span></br>
	  <span>Si jo fos pintora...</span></br>
	  <span>com R,</span> <span>sabeu aquell</span> <span>que diuen que mantenia</span> <span>l'univers tot blanc</span></br>
	  <span>Si jo fos pintora</span> <span>potser</span> <span>tot seria</span> <span>més fàcil</span></br>
	  <span>Ajudau-me a representar</span> <span> el DOLOR</span> <span>i la FELIACITAT!</span>
	</div>	
	
	
</body>
</html>

