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
	<script src="<?php echo base_url().'js/ajaxfileupload.js'; ?>"></script>
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
		
		$("#saladelsotitula5ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo5", {titol : $("#saladelsotitula5").val()})
				.done(function(resultat5) {
					$("#resultattitolso5").html(resultat5);
				});
		});
		
		$("#saladelsotitula6ok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarTitolSo6", {titol : $("#saladelsotitula6").val()})
				.done(function(resultat6) {
					$("#resultattitolso6").html(resultat6);
				});
		});
		
		$("#saladelsobandasonoraok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarBandaSonora", {titol : $("#saladelsobandasonora").val()})
				.done(function(banda) {
					$("#resultatbandasonora").html(banda);
				});
		});
		
		$("#saladelsosegonok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladelso/guardarSegon", {seg : $("#saladelsosegon").val()})
				.done(function(seg) {
					$("#resultatsosegon").html(seg);
				});
		});
		
		
		$('#saladelsotranquilitatok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladelso/uploadFileSo1', 
				secureuri      :false,
				fileElementId  :'userfile',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenametranquilitat').html("Error guardant el so: torna-ho a provar");
					}
					else if(data.status == 'success'){
						$('#filenametranquilitat').html("So " + data.filename + " guardat correctament");
					}
				}
			});
			return false;
		});
		
		$('#saladelsoperillok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladelso/uploadFileSo2', 
				secureuri      :false,
				fileElementId  :'userfile',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenameperill').html("Error guardant el so: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#filenameperill').html("So " + data.filename + " guardat correctament");
					}
				}
			});
			return false;
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
	<!-- continguts -->
	<div class="contingutsbox">
		<!-- titula sons -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<!-- so 1 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/01_Bomba.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/01_Bomba.mp3'; ?>">
		</audio>
		<?php if ($bapartat11fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula1" name="saladelsotitula1"/>
				<input id="saladelsotitula1ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso1"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso1propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso1resposta); ?></div>
		<?php } ?>
		<!-- so 2 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/02_Petard.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/02_Petard.mp3'; ?>">
		</audio>
		<?php if ($bapartat12fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula2" name="saladelsotitula2"/>
				<input id="saladelsotitula2ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso2"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso2propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso2resposta); ?></div>
		<?php } ?>
		<!-- so 3 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/03_Tro.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/03_Tro.mp3'; ?>">
		</audio>
		<?php if ($bapartat13fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula3" name="saladelsotitula3"/>
				<input id="saladelsotitula3ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso3"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso3propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso3resposta); ?></div>
		<?php } ?>
		<!-- so 4 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/04_Escopeta.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/04_Escopeta.mp3'; ?>">
		</audio>
		<?php if ($bapartat14fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula4" name="saladelsotitula4"/>
				<input id="saladelsotitula4ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso4"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso4propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso4resposta); ?></div>
		<?php } ?>
		<!-- so 5 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/05_Globo.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/05_Globo.mp3'; ?>">
		</audio>
		<?php if ($bapartat15fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula5" name="saladelsotitula5"/>
				<input id="saladelsotitula5ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso5"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso5propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso5resposta); ?></div>
		<?php } ?>
		<!-- so 6 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/06_Roda.mp3'; ?>" type="audio/mpeg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/06_Roda.mp3'; ?>">
		</audio>
		<?php if ($bapartat16fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula6" name="saladelsotitula6"/>
				<input id="saladelsotitula6ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso6"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas dir que era? <?php echo($titolso6propi); ?></div>
			<div class="contingutstexttitolresposta">Què es? <?php echo($titolso6resposta); ?></div>
		<?php } ?>
		<!-- grava tranquilitat i perill -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<div class="contingutsboxresposta">(en .mp3)</div>
		<div class="contingutssubtitol">. Que representi TRANQUILITAT</div>
		<?php if ($bapartat21fet == false) {?>
			<form>
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladelsotranquilitatok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenametranquilitat"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Vas pujar el so <?php echo($sotranquilitatpropi); ?>. Escolta la tranquilitat </div>
			<audio controls>
				<source src="<?php echo base_url().'files/'.$sotranquilitatpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$sotranquilitatpropifilename; ?>">
			</audio>
		<?php } ?>
		<div class="contingutssubtitol">. Que representi PERILL</div>
		<?php if ($bapartat22fet == false) {?>
			<form>
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladelsoperillok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenameperill"></div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Vas pujar el so <?php echo($soperillpropi); ?>. Fes play al perill </div>
			<audio controls>
				<source src="<?php echo base_url().'files/'.$soperillpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$soperillpropifilename; ?>">
			</audio>
		<?php } ?>
		<!-- deixa en silenci -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
		<div style="margin-bottom:20px; margin-top:20px">
			<video id="videosilenci" width="900" height="506" controls preload="auto" data-setup="{}">
				<source src="<?php echo base_url().'/assets/images/clip2-silenci.mp4'; ?>" type='video/mp4' />
			</video>
		</div>
		<?php if ($bapartat3fet == false) {?>
			<div class="contingutsboxresposta">Escriu un número del segon a silenciar (entre 0 i 60 segons)</div>
			<form>
				<input type="number" min="1" max="60" class="contingutstextform50percent" id="saladelsosegon" name="saladelsosegon"/>
				<input id="saladelsosegonok" type="button" value="ok"/>
			</form>
			<div class="contingutstexttitolresposta">Quants galeristes han silenciat aquest segon?</div>
			<div class="contingutsboxresposta" id="resultatsosegon"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Vas silenciar el segon...</div>
			<div class="contingutsboxresposta"><?php echo($segonpropi); ?></div>
			<div class="contingutstexttitolresposta">Quants galeristes han silenciat aquest segon?</div>
			<div class="contingutsboxresposta"><?php echo($segonaltres); ?></div>
		<?php } ?>
		<!-- banda sonora del mon -->
		<div class="contingutstitol"><?php echo($titolapartat4); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat4fet == false) {?>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladelsobandasonora" name="saladelsobandasonora"/>
				<input id="saladelsobandasonoraok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Què han escrit els altres participants?</div>
				<div class="contingutsboxresposta" id="resultatbandasonora"></div>
			</form>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">Què vas escriure tu?</div>
			<div class="contingutsboxresposta"><?php echo($bandasonorapropi); ?></div>
			<div class="contingutstexttitolresposta">Què van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($bandasonoraaltres); ?></div>
		<?php } ?>
	</div>
</body>
</html>