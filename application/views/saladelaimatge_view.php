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
	<link href="./javascripts/video-js/video-js.css" rel="stylesheet">
	<!--Load JQUERY from Google's network -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="<?php echo base_url().'js/ajaxfileupload.js'; ?>"></script>
	<script src="./javascripts/video-js/video.js"></script>
	<script> 
    // using JQUERY's 
    $(document).ready(function () {
		
		$bfiltre1 = false; $bfiltre2 = false; $bfiltre3 = false;
		$bfiltratok = false;
		$("#saladelaimatgefiltre1").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre2 = false; $bfiltre3 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre1.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre1").mouseleave(function() {
			if($bfiltre1 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre1").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre1.jpg'; ?>');
				$bfiltre1 = true;
				}
		});
		
		$("#saladelaimatgefiltre2").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre1 = false; $bfiltre3 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre2.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre2").mouseleave(function() {
			if($bfiltre2 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre2").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre2.jpg'; ?>');
				$bfiltre2 = true;
			}
		});
		
		$("#saladelaimatgefiltre3").mouseenter(function() {
			if($bfiltratok != true){
				$bfiltre1 = false; $bfiltre2 = false;
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre3.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre3").mouseleave(function() {
			if($bfiltre3 != true && $bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01.jpg'; ?>');
			}
		});
		$("#saladelaimatgefiltre3").click(function() {
			if($bfiltratok != true){
				$("#saladelaimatgeimatgefiltra").attr('src', '<?php echo base_url().'/assets/images/saladelaimatge/filtra01ambfiltre3.jpg'; ?>');
				$bfiltre3 = true;
			}
		});
		
		$("#saladelaimatgefiltreok").click(function () {
			$numfiltre = 0;
			if($bfiltre1 == true){
				$numfiltre = 1;
			}
			if($bfiltre2 == true){
				$numfiltre = 2;
			}
			if($bfiltre3 == true){
				$numfiltre = 3;
			}
			$.post("<?php echo base_url()?>index.php/saladelaimatge/guardaFiltre", {num : $numfiltre})
				.done(function() {
					$bfiltratok = true;
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre1", {})
				.done(function(percentatge1) {
					$("#resultatfiltre1").html("total de filtres lisa: " + percentatge1);
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre2", {})
				.done(function(percentatge2) {
					$("#resultatfiltre2").html("total de filtres micky: " + percentatge2);
				});
			
			$.post("<?php echo base_url()?>index.php/saladelaimatge/percentatgeFiltre3", {})
				.done(function(percentatge3) {
					$("#resultatfiltre3").html("total de filtres rob: " + percentatge3);
					$("#resultatfiltres").html("Total de filtres usats:");
				});
			
		});
		
		$('#saladelaimatgegraffitiok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladelaimatge/uploadFileGraffiti', 
				secureuri      :false,
				fileElementId  :'userfile',
				dataType    : 'json',
				data        : {
					'title'           : $('#saladelaimatgegraffitiperque').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenameautorretrat').html("Error guardant el so: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#graffiti').attr('src', '<?php echo base_url()?>files/' + data.path);
						$('#filenameagraffiti').html("El teu graffiti " + data.filename + " s'ha guardat correctament");
						$('#resultatgraffitisimg1').attr('src', '<?php echo base_url()?>files/' + data.img1);
						$('#resultatgraffitisimg2').attr('src', '<?php echo base_url()?>files/' + data.img2);
						$('#resultatgraffitisimg3').attr('src', '<?php echo base_url()?>files/' + data.img3);
					}
				}
			});
			return false;
		});
		
		$bfotograma1 = false; $bfotograma2 = false; $bfotograma3 = false; $bfotograma4 = false;
		$bfotogramaok = false;
		
		$("#saladelaimatgefotograma1").click(function() {
			if($bfotogramaok != true){
				$(this).css('border', "solid 1px white");
				$('#saladelaimatgefotograma2').css('border', "0px");
				$('#saladelaimatgefotograma3').css('border', "0px");
				$('#saladelaimatgefotograma4').css('border', "0px");
				$bfotograma1 = true; $bfotograma2 = false; $bfotograma3 = false; $bfotograma4 = false;
			}
		});
		$("#saladelaimatgefotograma2").click(function() {
			if($bfotogramaok != true){
				$(this).css('border', "solid 1px white");
				$('#saladelaimatgefotograma1').css('border', "0px");
				$('#saladelaimatgefotograma3').css('border', "0px");
				$('#saladelaimatgefotograma4').css('border', "0px");
				$bfotograma1 = false; $bfotograma2 = true; $bfotograma3 = false; $bfotograma4 = false;
			}
		});
		$("#saladelaimatgefotograma3").click(function() {
			if($bfotogramaok != true){
				$(this).css('border', "solid 1px white");
				$('#saladelaimatgefotograma1').css('border', "0px");
				$('#saladelaimatgefotograma2').css('border', "0px");
				$('#saladelaimatgefotograma4').css('border', "0px");
				$bfotograma1 = false; $bfotograma2 = false; $bfotograma3 = true; $bfotograma4 = false;
			}
		});
		$("#saladelaimatgefotograma4").click(function() {
			if($bfotogramaok != true){
				$(this).css('border', "solid 1px white");
				$('#saladelaimatgefotograma1').css('border', "0px");
				$('#saladelaimatgefotograma2').css('border', "0px");
				$('#saladelaimatgefotograma3').css('border', "0px");
				$bfotograma1 = false; $bfotograma2 = false; $bfotograma3 = false; $bfotograma4 = true;
			}
		});
		
		$("#saladelaimatgefotogramaok").click(function () {
			$bfotogramaok = true;
			$numframe = 0;
			if($bfotograma1 == true){
				$numframe = 1;
			}
			if($bfotograma2 == true){
				$numframe = 2;
			}
			if($bfotograma3 == true){
				$numframe = 3;
			}
			if($bfotograma4 == true){
				$numframe = 4;
			}
			$.post("<?php echo base_url()?>index.php/saladelaimatge/guardaFrame", {num : $numframe})
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
		<?php if ($bapartat1fet == false) {?>
			<img id="saladelaimatgeimatgefiltra" class="contingutsimatge60percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtra01.jpg'; ?>" />
			<img id="saladelaimatgefiltre1" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre1.jpg'; ?>" />
			<img id="saladelaimatgefiltre2" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre2.jpg'; ?>" />
			<img id="saladelaimatgefiltre3" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/filtre3.jpg'; ?>" />
			<form style="position:relative; margin-top:2%; margin-left:2%">
				<input id="saladelaimatgefiltreok" type="button" value="ok"/>
			</form>
			<div style="margin-top:5%"></div>
			<div class="contingutstexttitolresposta" id="resultatfiltres"></div>
			<div class="contingutsboxresposta" id="resultatfiltre1"></div>
			<div class="contingutsboxresposta" id="resultatfiltre2"></div>
			<div class="contingutsboxresposta" id="resultatfiltre3"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">El teu filtre</div>
			<img class="contingutsimatge60percent" id="imatgefiltrada" src="<?php echo base_url().$filtrepropi; ?>" />
			<div class="contingutstexttitolresposta">Els més usats son?</div>
			<div class="contingutsboxresposta">
				filtres lily: <?php echo($percentatgeetiqueta1); ?><br/>
				filtres mocky: <?php echo($percentatgeetiqueta2);  ?><br/>
				filtres rob: <?php echo($percentatgeetiqueta3); ?>
			</div>
		<?php } ?>
		<!-- puja imatge carrer -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat2fet == false) {?>
			<div style="clear:both">
				<img class="contingutsimatge50percent" id="graffiti" src=""/>
				<form style="margin-top:2%">
					<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
					<div class="contingutsboxresposta" id="filenameagraffiti"></div>
					<textarea class="contingutstextformrequadre" id="saladelaimatgegraffitiperque" name="saladelaimatgegraffitiperque"></textarea>
					<input id="saladelaimatgegraffitiok" type="button" value="ok" style="margin-top:3%"/>
				</form>
			</div>
			<div style="clear:both">
				<div class="contingutstexttitolresposta">Què han trobat pel carrer els altres artístes?</div>
				<img class="contingutsimatge30percent" id="resultatgraffitisimg1" src=""/>
				<img class="contingutsimatge30percent" id="resultatgraffitisimg2" src=""/>
				<img class="contingutsimatge30percent" id="resultatgraffitisimg3" src=""/>
			</div>
		<?php } else { ?>
			<div style="clear:both">
				<div class="contingutstexttitolresposta">El teu graffiti</div>
				<div class="contingutsboxresposta"><?php echo($perquegraffitipropi); ?></div>
				<img class="contingutsimatge50percent" src="<?php echo base_url().'files/'.$graffitipropi; ?>" />
			</div>
			<div style="clear:both">
				<div class="contingutstexttitolresposta">Els tres últims graffitis</div>
				<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$graffiti1; ?>" />
				<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$graffiti2; ?>" />
				<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$graffiti3; ?>" />
			</div>
			<div style="clear:both">
				<div class="contingutsboxresposta30percent"><?php echo($perquegraffiti1); ?></div>
				<div class="contingutsboxresposta30percent"><?php echo($perquegraffiti2); ?></div>
				<div class="contingutsboxresposta30percent"><?php echo($perquegraffiti3); ?></div>
			</div>
		<?php } ?>
		<!-- fotograma -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat3fet == false) {?>
			<div style="margin-top:2%">
				<video id="videosilenci" class="video-js vjs-default-skin" controls preload="auto" width="512" height="211" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
					<source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
				</video>
				<form>
					<input id="saladelaimatgefotogramaok" type="button" value="ok"/>
				</form>
			</div>
			<div style="clear:both">
				<img id="saladelaimatgefotograma1" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma1.png'; ?>" />
				<img id="saladelaimatgefotograma2" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma2.png'; ?>" />
				<img id="saladelaimatgefotograma3" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma3.png'; ?>" />
				<img id="saladelaimatgefotograma4" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma4.png'; ?>" />
			</div>
		<?php } else { ?>
			<div style="margin-top:2%">
				<video id="videosilenci" class="video-js vjs-default-skin" controls preload="auto" width="512" height="211" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
					<source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
				</video>
			</div>
			<div style="clear:both">
				<div class="contingutstexttitolresposta">Quin fotograma vas triar?</div>
				<div class="contingutsboxresposta">Vas triar el número <?php echo($fotogramapropi); ?></div>
				<img id="saladelaimatgefotograma1" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma1.png'; ?>" />
				<img id="saladelaimatgefotograma2" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma2.png'; ?>" />
				<img id="saladelaimatgefotograma3" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma3.png'; ?>" />
				<img id="saladelaimatgefotograma4" class="contingutsimatge15percent" src="<?php echo base_url().'/assets/images/saladelaimatge/fotograma4.png'; ?>" />
			</div>
		<?php } ?>
	</div>
</body>
</html>