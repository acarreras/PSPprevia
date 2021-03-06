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
						$('#filenameautorretrat').html("Error guardant l'autorretrat: torna-ho a provar. " + data.msg);
					}
					else if(data.status == 'success'){
						$('#autorretratimatge').attr('src', '<?php echo base_url()?>files/' + data.path);
						$('#autorretratimatge').css("display", "inline");
						$('#filenameautorretrat').html("El teu autoretrat " + data.filename + " s'ha guardat correctament");
						$('#formautorretrat').hide();
						$('#resultatautorretratimg1').attr('src', '<?php echo base_url()?>files/' + data.img1);
						$('#resultatautorretratimg1').css("display", "inline");
						$('#resultatautorretratimg2').attr('src', '<?php echo base_url()?>files/' + data.img2);
						$('#resultatautorretratimg2').css("display", "inline");
						$('#resultatautorretratimg3').attr('src', '<?php echo base_url()?>files/' + data.img3);
						$('#resultatautorretratimg3').css("display", "inline");
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
		<!-- autoretrat -->
		<div class="contingutstitol"><?php echo($titolapartat1); ?></div>
		<div class="hr"><hr/></div>
		<?php if ($bapartat1fet == false) { ?>
			<form id="formautorretrat">
				<input type="file" class="choosefileboto" id="userfile" name="userfile"/>
				<input id="saladeljoautoretratok" type="button" value="ok"/>
			</form>
			<div class="contingutsboxresposta" id="filenameautorretrat"></div>
			<img class="contingutsimatge60percent" id="autorretratimatge" src="" onerror='this.style.display = "none"'/>
			<div style="clear:both">
				<div class="contingutstexttitolresposta">Altres autorretrats! (els últims)</div>
				<img class="contingutsimatge30percent" id="resultatautorretratimg1" src="" onerror='this.style.display = "none"'/>
				<img class="contingutsimatge30percent" id="resultatautorretratimg2" src="" onerror='this.style.display = "none"'/>
				<img class="contingutsimatge30percent" id="resultatautorretratimg3" src="" onerror='this.style.display = "none"'/>
			</div>
		<?php } else { ?>
			<div class="contingutstexttitolresposta">El teu autorretrat</div>
			<img class="contingutsimatge50percent" src="<?php echo base_url().'files/'.$autoretratpropi; ?>" />
			<div class="contingutstexttitolresposta">Els tres últims autorretrats</div>
			<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$autoretrat1; ?>" />
			<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$autoretrat2; ?>" />
			<img class="contingutsimatge30percent" src="<?php echo base_url().'files/'.$autoretrat3; ?>" />
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