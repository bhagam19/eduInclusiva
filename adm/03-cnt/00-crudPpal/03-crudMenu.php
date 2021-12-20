<?php
    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.'));
	$pzz='adm/02-vst/00-crudPpal/04-bienvenida.php';
	$p00='';
	$p01='adm/02-vst/02-crudUsuarios/00-crudUsuarios.php';
	$p02='adm/02-vst/02-crudInfoGralEstud/00-verInfoGralEstud.php';
	$p03='adm/02-vst/02-crudInfoGralEstud/10-crudEstudiantes.php';
	$p04='adm/02-vst/04-crudDiscapacidades/00-crudDiscapacidades.php';
	$p05='adm/02-vst/05-crudCTE/00-crudCTE.php';
	$p06='adm/02-vst/06-crudTAC/00-crudTAC.php';
	$p07='adm/02-vst/07-crudNivelesReconocimiento/00-crudNivelesReconocimiento.php';
	$p08='adm/02-vst/08-crudAlertas/00-crudAlertas.php';
	$p09='adm/02-vst/09-crudIdentificaciones/00-crudIdentificaciones.php';
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
		case '$p04':
			$pagina=$p04;
			break;	
		case '$p05':
			$pagina=$p05;
			break;
		case '$p06':
			$pagina=$p06;
			break;
		case '$p07':
			$pagina=$p07;
			break;
	}
?>    