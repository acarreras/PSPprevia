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
		$num = 3;
		fons1();
		var function1 = function fons1() {
			if($num > 0) {
				alert('inside 1');
				$stringurl = "url(<?php echo base_url().'assets/images/pinzellades/salaLLENGUATGEover.png'; ?>), " + $('html').css('background');
				$('html').css('background', $stringurl);
				$stringrepeat = "no-repeat, " + $('html').css('background-repeat');
				$('html').css('background-repeat', $stringrepeat);
				$stringposition = "center center, " + $('html').css('background-position');
				$('html').css('background-position', $stringposition);
				$stringattachment = "fixed, " + $('html').css('background-attachment');
				$stringbckgrndsize = "cover, cover";
				$('html').css('background-size', $stringbckgrndsize);
				$('html').css('background-attachment', $stringattachment);
				$stringwebkit = "cover, " + $('html').css('-webkit-background-size');
				$('html').css('-webkit-background-size', $stringwebkit);
				$stringmoz = "cover, " + $('html').css('-moz-background-size');
				$('html').css('-moz-background-size', $stringmoz);
				$stringo = "cover, " + $('html').css('-o-background-size');
				$('html').css('-o-background-size', $stringo);
			}
			return $.ajax(...);
		}
		function1().done(fons2);

		var function2 = function fons2() {
			alert('inside 2');
			if($num > 1) {
				$stringurl = "url(<?php echo base_url().'assets/images/pinzellades/salaSOover.png'; ?>), " + $('html').css('background');
				$('html').css('background', $stringurl);
				$stringrepeat = "no-repeat, " + $('html').css('background-repeat');
				$('html').css('background-repeat', $stringrepeat);
				$stringposition = "center center, " + $('html').css('background-position');
				$('html').css('background-position', $stringposition);
				$stringattachment = "fixed, " + $('html').css('background-attachment');
				$stringbckgrndsize = "cover, cover";
				$('html').css('background-size', $stringbckgrndsize);
				$('html').css('background-attachment', $stringattachment);
				$stringwebkit = "cover, " + $('html').css('-webkit-background-size');
				$('html').css('-webkit-background-size', $stringwebkit);
				$stringmoz = "cover, " + $('html').css('-moz-background-size');
				$('html').css('-moz-background-size', $stringmoz);
				$stringo = "cover, " + $('html').css('-o-background-size');
				$('html').css('-o-background-size', $stringo);
			}
			return $.ajax(...);
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
		
	<a href="<?php echo ('saladelesparaules'); ?>">1</a>
	<a href="<?php echo ('saladelso'); ?>">2</a>
	<a href="<?php echo ('saladelaimatge'); ?>">3</a>
	<a href="<?php echo ('saladeljo'); ?>">4</a>
	<a href="<?php echo ('biblioteca'); ?>">5</a>
	<a href="<?php echo ('exposicioglobal'); ?>">6</a>
	<a href="<?php echo ('saladeldolorilafelicitat'); ?>">7</a>
	<a href="<?php echo ('wc'); ?>">8</a>
	</body>
</html>

