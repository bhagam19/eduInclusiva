<?php
    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.'));
	$pzz='adm/02-vst/00-crudPpal/04-bienvenida.php';
	$p00='adm/01-mdl/borrarBD.php';
	$p01='adm/02-vst/02-crudUsuarios/00-crudUsuarios.php';
	$p02='adm/02-vst/02-crudInfoGralEstud/00-verInfoGralEstud.php';
	$p03='adm/02-vst/02-crudInfoGralEstud/10-crudEstudiantes.php';
	$pag='adm/03-cnt/03-funciones/cargarCrud.php';
	
	$pagina = isset($_GET['pg']) ? $_GET['pg'] : 'adm/02-vst/00-crudPpal/04-bienvenida.php';
	$numPag=substr($pagina, 0, 4);	
	switch ($numPag) {		
		case '$pzz':
			$pagina=$pzz;
			break;
		case '$p00':
			$pagina=$p00;
			break;
		case '$p01':
			$pagina=$p01;
			break;
		case '$p02':
			$pagina=$p02;
			break;
		case '$p03':
			$pagina=$p03;
			break;
		case '$pag':
			$pagina=$pag;
			break;
	}
?>    