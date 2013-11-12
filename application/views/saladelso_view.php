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
		$('#audiotranquilitat').hide();
		$('#audioperill').hide();
		$bhtml5 = false;
		if(!!document.createElement('audio').canPlayType) {
			$bhtml5 = true;// soporta html5
		}
		document.getElementById("so1").style.visibility = "hidden";
		document.getElementById("so2").style.visibility = "hidden";
		document.getElementById("so3").style.visibility = "hidden";
		document.getElementById("so4").style.visibility = "hidden";
		document.getElementById("so5").style.visibility = "hidden";
		document.getElementById("so6").style.visibility = "hidden";
		
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
						$('#formtranquilitat').hide();
						$('#audiotranquilitat').show();
						$("#audiofilenametranquilitatsource").attr('src', '<?php echo base_url()?>files/' + data.file);
						$("#audiofilenametranquilitatembed").attr('src', '<?php echo base_url()?>files/' + data.file);
						$('#audiotranquilitatsrc').load();
						$("#sotranquilitat").attr('src', '<?php echo base_url()?>files/' + data.file);
						$('#sotranquilitat').load();						
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
						$('#formperill').hide();
						$('#audioperill').show();
						$("#audiofilenameperillsource").attr('src', '<?php echo base_url()?>files/' + data.file);
						$("#audiofilenameperillembed").attr('src', '<?php echo base_url()?>files/' + data.file);
						$('#audioperillsrc').load();
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
			<source src="<?php echo base_url().'assets/audio/01_Bomba.ogg'; ?>" type="audio/ogg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/01_Bomba.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so1" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/01_Bomba.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat11fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula1" name="saladelsotitula1"/>
				<input id="saladelsotitula1ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso1"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso1propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso1resposta); ?></div>
		<?php } ?>
		<!-- so 2 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/02_Petard.mp3'; ?>" type="audio/mpeg">
			<source src="<?php echo base_url().'assets/audio/02_Petard.ogg'; ?>" type="audio/ogg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/02_Petard.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so2" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/02_Petard.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat12fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula2" name="saladelsotitula2"/>
				<input id="saladelsotitula2ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso2"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso2propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso2resposta); ?></div>
		<?php } ?>
		<!-- so 3 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/03_Tro.mp3'; ?>" type="audio/mpeg">
			<source src="<?php echo base_url().'assets/audio/03_Tro.ogg'; ?>" type="audio/ogg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/03_Tro.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so3" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/03_Tro.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat13fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula3" name="saladelsotitula3"/>
				<input id="saladelsotitula3ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso3"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso3propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso3resposta); ?></div>
		<?php } ?>
		<!-- so 4 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/04_Escopeta.mp3'; ?>" type="audio/mpeg">
			<source src="<?php echo base_url().'assets/audio/04_Escopeta.ogg'; ?>" type="audio/ogg">
			<embed autostart="false" height="20" width="400" src="<?php echo base_url().'assets/audio/04_Escopeta.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so4" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/04_Escopeta.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat14fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula4" name="saladelsotitula4"/>
				<input id="saladelsotitula4ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso4"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso4propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso4resposta); ?></div>
		<?php } ?>
		<!-- so 5 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/05_Globo.mp3'; ?>" type="audio/mpeg">
			<source src="<?php echo base_url().'assets/audio/05_Globo.ogg'; ?>" type="audio/ogg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/05_Globo.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so5" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/05_Globo.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat15fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula5" name="saladelsotitula5"/>
				<input id="saladelsotitula5ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso5"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso5propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso5resposta); ?></div>
		<?php } ?>
		<!-- so 6 -->
		<audio controls="controls">
			<source src="<?php echo base_url().'assets/audio/06_Roda.mp3'; ?>" type="audio/mpeg">
			<source src="<?php echo base_url().'assets/audio/06_Roda.ogg'; ?>" type="audio/ogg">
			<embed height="20" width="400" src="<?php echo base_url().'assets/audio/06_Roda.mp3'; ?>">
			<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
		</audio>
		<?php if ($bhtml5 == false) {?>
			<div style="margin-top:20px">
				<embed id="so6" height="15" width="300" autostart="false" src="<?php echo base_url().'assets/audio/06_Roda.mp3'; ?>">
				<param name="AutoStart" value="0"> 
			</div>
		<?php } ?>
		<?php if ($bapartat16fet == false) {?>
			<form>
				<input type="text" class="contingutstextform50percent" id="saladelsotitula6" name="saladelsotitula6"/>
				<input id="saladelsotitula6ok" type="button" value="ok"/>
			</form>
				<div class="contingutsboxresposta" id="resultattitolso6"></div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">La teva resposta: <?php echo($titolso6propi); ?></div>
			<div class="contingutstexttitolresposta">Què és? <?php echo($titolso6resposta); ?></div>
		<?php } ?>
		<!-- grava tranquilitat i perill -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<div class="contingutsboxresposta">(en .mp3)</div>
		<div class="contingutssubtitol">. Que representi TRANQUILITAT</div>
		<?php if ($bapartat21fet == false) {?>
			<form id="formtranquilitat">
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladelsotranquilitatok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenametranquilitat"></div>
			<div id="audiotranquilitat">
				<audio controls id="audiotranquilitatsrc" autoplay="autoplay">
					<source id="audiofilenametranquilitatsource" src="" type="audio/mpeg">
					<embed id="audiofilenametranquilitatembed" height="20" width="400" src="">
					<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
				</audio>
				</br>
			</div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Escolta la tranquilitat:</div>
			<audio controls loop="loop" autoplay="autoplay">
				<source src="<?php echo base_url().'files/'.$sotranquilitatpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$sotranquilitatpropifilename; ?>">
				<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
			</audio>
			<?php if ($bhtml5 == false) {?>
				<div style="clear:both" class="contingutsboxresposta">Uix! Aquest navegador no pot carregar els mp3</div>
			<?php } ?>
			</br>
		<?php } ?>
		<div class="contingutssubtitol">. Que representi PERILL</div>
		<?php if ($bapartat22fet == false) {?>
			<form id="formperill">
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladelsoperillok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenameperill"></div>
			<div id="audioperill">
				<audio autoplay="autoplay" controls id="audioperillsrc">
					<source id="audiofilenameperillsource" src="" type="audio/mpeg">
					<embed id="audiofilenameperillembed" height="20" width="400" src="">
				</audio>
				</br>
			</div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Play al perill: </div>
			<audio controls loop="loop" autoplay="autoplay">
				<source src="<?php echo base_url().'files/'.$soperillpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$soperillpropifilename; ?>">
				<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar els audios :-(</div>
			</audio>
			<?php if ($bhtml5 == false) {?>
				<div style="clear:both" class="contingutsboxresposta">Uix! Aquest navegador no pot carregar els mp3</div>
			<?php } ?>
			</br>
		<?php } ?>
		<!-- deixa en silenci -->
		<div class="contingutstitol"><?php echo($titolapartat3); ?></div>
		<div class="hr"><hr/></div>
		<div style="margin-bottom:20px; margin-top:20px">
			<video id="videosilenci" width="900" height="506" controls preload="auto" data-setup="{}">
				<source src="<?php echo base_url().'/assets/images/clip2-silenci.mp4'; ?>" type='video/mp4' />
				<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar videos mp4 :-(</div>
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
			<div class="contingutstexttitolresposta">Aquest és el teu tema: </div>
			<div class="contingutsboxresposta"><?php echo($bandasonorapropi); ?></div>
			<div class="contingutstexttitolresposta">Quins temes han triat els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($bandasonoraaltres); ?></div>
		<?php } ?>
	</div>
</body>
</html>