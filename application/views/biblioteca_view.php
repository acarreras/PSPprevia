<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
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
	<!--Load JQUERY from Google's network -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script> 
    // using JQUERY's 
    $(document).ready(function () {
		$.post("<?php echo base_url()?>index.php/biblioteca/salaVista", {faketext : 'vista'})
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
		<!-- dossiers pedagogics  -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		
		<!-- links -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>

		<!-- credits -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
		<div class="contingutsboxresposta">Traducció: Kàtia Pago</div>
		<div class="contingutsboxresposta">Direcció: Judith Pujol Llop</div>
		<div class="contingutsboxresposta">Ajudant de direcció: Anna Maria Ricart</div>
		<div class="contingutsboxresposta">Intèrpret: Ilona Muñoz Rizzo</div>
		<div class="contingutsboxresposta">Escenografia: Adrià Pinar</div>
		<div class="contingutsboxresposta">Mitjans interactius: (Etc Inventions) Anna Carreras i Chema Blanco</div>
		<div class="contingutsboxresposta">Disseny gràfic: Laia Gutiérrez</div>
		<div class="contingutsboxresposta">Suport al disseny gràfic: Dídac Soto Valdés</div>
		<div class="contingutsboxresposta">Espai sonor: Aurélie Raoût (Lilou)</div>
		<div class="contingutsboxresposta">Assessorament pedagògic: Neus Ballesteros Ventura</div>
		<div class="contingutsboxresposta">Il·luminació: Dani Sánchez</div>
		<div class="contingutsboxresposta">Vestuari: Giulia Grumi</div>
		<div class="contingutsboxresposta">Producció: Ilona Muñoz Rizzo i Judith Pujol</div>
		<div class="contingutsboxresposta">Dossier didàctic a càrrec de: Neus Ballesteros Ventura i Ilona Muñoz Rizzo</div>
		<div class="contingutsboxresposta">Amb imatges de Maria Beitia i Alba Sotorra.</div>
	</div>
</body>
</html>