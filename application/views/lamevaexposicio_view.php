<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/lamevaexpo-fonsnet.png'; ?>) no-repeat center center fixed; 
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

	});
  </script>
</head>
<body>
	<!-- menú superior dreta -->
	<div class="titolbox">
		<div class="capcaleratitol"><?php echo($titol);?></div>
		<a class="capcalerasortir right" href="home/logout">SORTIR</a>
		<div class="capcalerabarra right">I</div>
		<div class="capcalerausername right"><?php echo($username); ?></div>
		<br/><br/>
		<a class="capcalerahome right" href="home">sales</a>
		<div class="capcalerabarra right">I</div>
		<?php if($salanext != NULL){ ?>
			<a class="capcalerafletxa right" href="<?php echo($salanext); ?>">></a>
			<div class="capcalerabarra right">I</div>
		<?php } ?>
		<?php if($salaprev != NULL){ ?>
			<a class="capcalerafletxa right" href="<?php echo($salaprev); ?>"><</a>
			<div class="capcalerabarra right">I</div>
		<?php } ?>
	</div>
	<!-- continguts -->
	<div class="contingutsbox">
	</div>
</body>
</html>