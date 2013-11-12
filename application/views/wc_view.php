<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/wc-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		$("#wctextok").click(function () {
			$.post("<?php echo base_url()?>index.php/wc/guardarTextWc", {titol : $("#wctext").val()})
			$.post("<?php echo base_url()?>index.php/wc/ultimText", {})
				.done(function(res) {
					$("#resultatwctext1").html(res);
				});
			$.post("<?php echo base_url()?>index.php/wc/penultimText", {})
				.done(function(res) {
					$("#resultatwctext2").html(res);
				});
			$.post("<?php echo base_url()?>index.php/wc/avantpenultimText", {})
				.done(function(res) {
					$("#resultatwctext3").html(res);
				});
		});
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
	<!-- porta -->
	<img class="imgportawc" src="<?php echo base_url().'assets/images/wc/wcporta.png'; ?>" />
	<!-- continguts -->
	<div class="contingutsbox">
		<!-- escriu a la porta del wc -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat1fet == false) {?>
			<form>
				<input type="text" class="contingutstextform100percent" id="wctext" name="wctext"/>
				<input id="wctextok" type="button" value="ok"/>
				</br>
				<div class="contingutsboxrespostawc" id="resultatwctext1"></div>
				<div class="contingutsboxrespostawc" id="resultatwctext2"></div>
				<div class="contingutsboxrespostawc" id="resultatwctext3"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutsboxwc">
				<div class="contingutsboxrespostawc"><?php echo($wctextpropi); ?></div>
				<div class="contingutsboxrespostawc"><?php echo($wctextaltre1); ?></div>
				<div class="contingutsboxrespostawc"><?php echo($wctextaltre2); ?></div>
				<div class="contingutsboxrespostawc"><?php echo($wctextaltre3); ?></div>
			</div>
		<?php } ?>
	</div>
</body>
</html>