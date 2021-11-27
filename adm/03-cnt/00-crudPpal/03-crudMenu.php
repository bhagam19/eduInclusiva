<?php
    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.'));
	$pzz='';
	$p01='inventarioApp/index.php';
	$p02='CTEApp/index.php';
	$p03='prestamoTabletas/index.php';
	$p04='biblioTaparto/index.php';
	$p05='pollaMundialista/index.php';
	$p06='creaExamen/index.php';
	$p07='ironManProject/index.html';
	$pagina = isset($_GET['pg']) ? $_GET['pg'] : '../bdBienes/01-verBienes.php';
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