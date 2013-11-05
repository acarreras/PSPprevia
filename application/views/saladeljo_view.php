<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($titol);?></title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/saladeljo-fonsnet.png'; ?>) no-repeat center center fixed; 
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
		$('#saladeljoautoretratok').click(function(e) {
			e.preventDefault();
			$.ajaxFileUpload({
				url         :'<?php echo base_url()?>index.php/saladeljo/uploadFileAutorretrat', 
				secureuri      :false,
				fileElementId  :'userfile',
				dataType    : 'json',
				data        : {
					'title'           : $('#title').val()
				},
				success  : function (data, status){
					if(data.status == 'error'){
						$('#filenameautorretrat').html("Error guardant el so: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						// TODO: no mostra la imatge, surt un link trencat
						$('#autorretratimatge').html('<img src="data:image/png;base64,' + data.path + '" />');
						$('#filenameautorretrat').html("El teu autoretrat " + data.filename + " s'ha guardat correctament");
					}
				}
			});
			return false;
		});
		
		$("#saladeljolemaok").click(function () {
			$.post("<?php echo base_url()?>index.php/saladeljo/guardarLema", {titol : $("#saladeljolema").val()})
				.done(function(resultat) {
					$("#resultatlema").html(resultat);
				});
		});
	});
  </script>
</head>
<body>
	<div id="res"></div>
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
		<!-- autoretrat -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat1fet == false) { ?>
			<form>
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladeljoautoretratok" type="button" value="ok"/>
				<div class="contingutsimatge60percent" id="autorretratimatge"></div>
				<div class="contingutsboxresposta" id="filenameautorretrat"></div>
			</form>
		<?php } else { ?>
			<img class="contingutsimatge50percent" src="<?php echo base_url().'/files/'.$autoretratpropi; ?>" />
			<img class="contingutsimatge30percent" src="<?php echo base_url().'/files/'.$autoretrat1; ?>" />
			<img class="contingutsimatge30percent" src="<?php echo base_url().'/files/'.$autoretrat2; ?>" />
			<img class="contingutsimatge30percent" src="<?php echo base_url().'/files/'.$autoretrat3; ?>" />
		<?php } ?>
		
		<!-- lema -->
		<div class="contingutstitol"><?php echo($titolapartat2); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat2fet == false) { ?>
			<form>
				<input type="text" class="contingutstextform100percent" id="saladeljolema" name="saladeljolema"/>
				<input id="saladeljolemaok" type="button" value="ok"/>
				<div class="contingutstexttitolresposta">Últims lemes</div>
				<div class="contingutsboxresposta" id="resultatlema"></div>
			</form>
		<?php } else{ ?>
			<div class="contingutstexttitolresposta">Quin vas ser el teu lema?</div>
			<div class="contingutsboxresposta"><?php echo($lemapropi); ?></div>
			<div class="contingutstexttitolresposta">Quins lemes van escriure els altres participants?</div>
			<div class="contingutsboxresposta"><?php echo($lemaaltres); ?></div>
		<?php } ?>
	</div>
</body>
</html>