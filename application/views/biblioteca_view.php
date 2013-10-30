<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PSP biblioteca</title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/biblioteca-fonsnet.png'; ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/styles/site.css'; ?>">
</head>
<body>
	<!-- menú superior dreta-->
	<div class="capcaleratitol">BIBLIOTECA</div>
	<a class="capcalerasortir right" href="home/logout">SORTIR</a>
	<div class="capcalerabarra right">I</div>
	<div class="capcalerausername right"><?php echo($username); ?></div>
	<br/><br/>
	<a class="capcalerahome right" href="home">^</a>
	<div class="capcalerabarra right">I</div>
	<a class="capcalerafletxa right" href="saladeldolorilafelicitat">></a>
	<div class="capcalerabarra right">I</div>
	<a class="capcalerafletxa right" href="saladeljo"><</a>
</body>
</html>