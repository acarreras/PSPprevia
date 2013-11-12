<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/dolorifelicitat-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		$('#audiofelicitat').hide();
		$('#audiodolor').hide();
		
		$bhtml5 = false;
		if(!!document.createElement('audio').canPlayType) {
			$bhtml5 = true;// soporta html5
		}
		
		$.post("<?php echo base_url()?>index.php/saladeldolorilafelicitat/salaVista", {faketext : 'vista'})
		
		$('#felicitatsook').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladeldolorilafelicitat/uploadFileSoFelicitat', 
				secureuri      :false,
				fileElementId  :'userfilesofelicitat',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenamesofelicitat').html("Error guardant el so: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#filenamesofelicitat').html("So " + data.filename + " guardat correctament");
						$('#formfelicitat').hide();
						$('#audiofelicitat').show();
						$("#audiofilenamefelicitatsource").attr('src', '<?php echo base_url()?>files/' + data.file);
						$("#audiofilenamefelicitatembed").attr('src', '<?php echo base_url()?>files/' + data.file);
						$('#audiofelicitatsrc').load();					
					}
				}
			});
			return false;
		});
		
		$('#dolorsook').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladeldolorilafelicitat/uploadFileSoDolor', 
				secureuri      :false,
				fileElementId  :'userfilesodolor',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenamesodolor').html("Error guardant el so: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#filenamesodolor').html("So " + data.filename + " guardat correctament");
						$('#formdolor').hide();
						$('#audiodolor').show();
						$("#audiofilenamedolorsource").attr('src', '<?php echo base_url()?>files/' + data.file);
						$("#audiofilenamedolorembed").attr('src', '<?php echo base_url()?>files/' + data.file);
						$('#audiodolorsrc').load();					
					}
				}
			});
			return false;
		});
		
		$('#felicitatimgok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladeldolorilafelicitat/uploadFileImgFelicitat', 
				secureuri      :false,
				fileElementId  :'userfileimgfelicitat',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenameimgfelicitat').html("Error guardant la imatge: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#filenameimgfelicitat').html("Imatge " + data.filename + " guardada correctament");
						$('#formfelicitatimg').hide();
						$('#felicitatimatge').attr('src', '<?php echo base_url()?>files/' + data.path);
						$('#felicitatimatge').css("display", "inline");					
					}
				}
			});
			return false;
		});
		
		$('#dolorimgok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladeldolorilafelicitat/uploadFileImgDolor', 
				secureuri      :false,
				fileElementId  :'userfileimgdolor',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenameimgdolor').html("Error guardant la imatge: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#filenameimgdolor').html("Imatge " + data.filename + " guardada correctament");
						$('#formdolorimg').hide();
						$('#dolorimatge').attr('src', '<?php echo base_url()?>files/' + data.path);
						$('#dolorimatge').css("display", "inline");					
					}
				}
			});
			return false;
		});
		
		$("#felicitattextok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladeldolorilafelicitat/guardarTextFelicitat", {titol : $("#felicitattext").val()})
			$('#felicitatform').hide()
		});
		
		$("#dolortextok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladeldolorilafelicitat/guardarTextDolor", {titol : $("#dolortext").val()})
			$('#dolorform').hide()
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
		<!-- FELICITAT -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<!-- so -->
		<img class="iconadolorifelicitat" src="<?php echo base_url().'assets/images/dolorifelicitat/so.png'; ?>" />
		<?php if ($bapartat11fet == false) {?>
			<form id="formfelicitat">
				<input type="file" class="choosefileboto" id="userfilesofelicitat" name="userfilesofelicitat"/>
				<input id="felicitatsook" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenamesofelicitat"></div>
			<div id="audiofelicitat">
				<audio controls id="audiofelicitatsrc">
					<source id="audiofilenamefelicitatsource" src="" type="audio/mpeg">
					<embed id="audiofilenamefelicitatembed" height="20" width="400" src="">
					<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar sons mp3 :-S</div>
				</audio>
				</br>
			</div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Vas pujar el so de la felicitat <?php echo($sofelicitatpropi); ?></div>
			<audio controls>
				<source src="<?php echo base_url().'files/'.$sofelicitatpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$sofelicitatpropifilename; ?>">
			</audio>
			<?php if ($bhtml5 == false) {?>
				<div style="clear:both" class="contingutsboxresposta">Uix! Aquest navegador no pot carregar els mp3</div>
			<?php } ?>
			</br>
		<?php } ?>
		<!-- imatge -->
		<div style="clear:both">
			<img class="iconadolorifelicitat" src="<?php echo base_url().'assets/images/dolorifelicitat/imatge.png'; ?>" />
		</div>
		<?php if ($bapartat12fet == false) {?>
			<form id="formfelicitatimg">
				<input type="file" class="choosefileboto" id="userfileimgfelicitat" name="userfileimgfelicitat"/>
				<input id="felicitatimgok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenameimgfelicitat"></div>
			<img class="contingutsimatge30percent" id="felicitatimatge" src="" onerror='this.style.display = "none"'/>
		<?php } else { ?>
			<div class="contingutsboxresposta">La teva imatge de felicitat</div>
			<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$imgfelicitatpropi; ?>" />
		<?php } ?>
		<!-- paraules -->
		<div style="clear:both">
			<img class="iconadolorifelicitat" src="<?php echo base_url().'assets/images/dolorifelicitat/paraules.png'; ?>" />
		</div>
		<?php if ($bapartat13fet == false) {?>
			<input type="text" class="contingutstextform100percent" id="felicitattext" name="felicitattext"/>
			<form id="felicitatform">
				<input id="felicitattextok" type="button" value="ok"/>
			</form>
		<?php } else { ?>
			<div class="contingutsboxrespostawc"><?php echo($felicitattextpropi); ?></div>
		<?php } ?>
		<!-- DOLOR -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<!-- so -->
		<img class="iconadolorifelicitat" src="<?php echo base_url().'assets/images/dolorifelicitat/so.png'; ?>" />
		<?php if ($bapartat21fet == false) {?>
			<form id="formdolor">
				<input type="file" class="choosefileboto" id="userfilesodolor" name="userfilesodolor"/>
				<input id="dolorsook" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenamesodolor"></div>
			<div id="audiodolor">
				<audio controls id="audiodolorsrc">
					<source id="audiofilenamedolorsource" src="" type="audio/mpeg">
					<embed id="audiofilenamedolorembed" height="20" width="400" src="">
					<div class="contingutsboxresposta">Ops! Aquest navegador no pot carregar sons mp3 :-S</div>
				</audio>
				</br>
			</div>
		<?php } else { ?>
			<div class="contingutsboxresposta">Vas pujar el so del dolor <?php echo($sodolorpropi); ?></div>
			<audio controls>
				<source src="<?php echo base_url().'files/'.$sodolorpropifilename; ?>" type="audio/mpeg">
				<embed height="20" width="400" src="<?php echo base_url().'files/'.$sodolorpropifilename; ?>">
			</audio>
			<?php if ($bhtml5 == false) {?>
				<div style="clear:both" class="contingutsboxresposta">Uix! Aquest navegador no pot carregar els mp3</div>
			<?php } ?>
			</br>
		<?php } ?>
		<!-- imatge -->
		<div style="clear:both">
			<img class="iconadoloridolor" src="<?php echo base_url().'assets/images/dolorifelicitat/imatge.png'; ?>" />
		</div>
		<?php if ($bapartat22fet == false) {?>
			<form id="formdolorimg">
				<input type="file" class="choosefileboto" id="userfileimgdolor" name="userfileimgdolor"/>
				<input id="dolorimgok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenameimgdolor"></div>
			<img class="contingutsimatge30percent" id="dolorimatge" src="" onerror='this.style.display = "none"'/>
		<?php } else { ?>
			<div class="contingutsboxresposta">La teva imatge de dolor</div>
			<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$imgdolorpropi; ?>" />
		<?php } ?>
		<!-- paraules -->
		<div style="clear:both">
			<img class="iconadoloridolor" src="<?php echo base_url().'assets/images/dolorifelicitat/paraules.png'; ?>" />
		</div>
		<?php if ($bapartat23fet == false) {?>
			<input type="text" class="contingutstextform100percent" id="dolortext" name="dolortext"/>
			<form id="dolorform">
				<input id="dolortextok" type="button" value="ok"/>
			</form>
		<?php } else { ?>
			<div class="contingutsboxrespostawc"><?php echo($dolortextpropi); ?></div>
		<?php } ?>
	</div>
</body>
</html>