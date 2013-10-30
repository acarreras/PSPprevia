<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PSP crea compte</title>
	<style>
		html { 
			background: url(<?php echo base_url().'assets/images/fons/inici-fonsnet.png'; ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/styles/site.css'; ?>">
</head>
	<div class="loginbox">
		<div class="loginerror">
			<?php echo validation_errors(); ?>
			<?php echo form_open('verifyregister'); ?>
		</div>
		<form>
			<input type="text" id="username" name="username"/>
			<label class="loginformmaj" for="username">NOM ARTÍSTIC</label>
			<br/>
			<input type="password" id="passowrd" name="password"/>
			<label class="loginformmaj" for="password">PASSWORD</label>
			<br/>
			<input type="password" id="passowrd2" name="password2"/>
			<label class="loginformmaj" for="password">CONFIRMA PASSWORD</label>
			<br/>
			<input type="text" id="galeria" name="galeria"/>
			<label class="loginformmaj" for="galeria">GALERIA</label>
			<br/><br/>
			<input id="submitinici" type="submit" value="crea"/>
			<a class="loginform" href="<?php echo ('login'); ?>">inici</a>
		</form>
	</div>
</body>
</html>

