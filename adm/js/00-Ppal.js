function mostrarFormularios(clase){	
	//alert(clase);
	$(clase).css({"visibility":"visible"});
	$(clase).animate({'top':'238px'},500);
}
function mostrarMenu(){		
	$('.menuNavegacion').css({"border-right":"1px solid #80c0fc"});
	$('.menuNavegacion').animate({width:'200px'},"fast",function(){
		$('.li').animate({width:'180px'},"fast",function(){
			$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOn.png">' + 'Inicio');
			$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOn.png">' + 'Reinstalar BD');				
			$('#personas').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Personas');
			$('#categorias').html('<img style="width:25px;height:25px" src="../appsArt/categoriasOn.png">' + 'Categorias');
			$('#Reportes').html('<img style="width:25px;height:25px" src="../appsArt/reportesOn.png">' + 'Reportes');
			$('#general').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Información General');
			$('#hogar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOn.png">' + 'Entorno Hogar');
			$('#salud').html('<img style="width:25px;height:25px" src="../appsArt/saludOn.png">' + 'Entorno Salud');
			$('#educativo').html('<img style="width:25px;height:25px" src="../appsArt/educativoOn.png">' + 'Entorno Educativo');
			$('#piar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOn.png">' + 'PIAR');
		});
	});
	/*
	if(screen.width<800){
		//alert(screen.width);
		$('.menuNavegacion').animate({width:'420px'},"fast",function(){
			$('.li').animate({width:'410px'},"fast",function(){
				$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOn.png">' + 'Inicio');
				$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../art/bdOn.png">' + 'Reinstalar BD');
				$('#personas').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Personas');
				$('#categorias').html('<img style="width:25px;height:25px" src="../appsArt/categoriasOn.png">' + 'Categorias');
				$('#Reportes').html('<img style="width:25px;height:25px" src="../appsArt/reportesOn.png">' + 'Reportes');
				$('#general').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Información General');
				$('#hogar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOn.png">' + 'Entorno Hogar');
				$('#salud').html('<img style="width:25px;height:25px" src="../appsArt/saludOn.png">' + 'Entorno Salud');
				$('#educativo').html('<img style="width:25px;height:25px" src="../appsArt/educativoOn.png">' + 'Entorno Educativo');
				$('#piar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOn.png">' + 'PIAR');
			});
		});
	}else{		
		
	}
	*/
}
function ocultarMenu(){
	$('.menuNavegacion').css({"border-right":"none"});
	$('.menuNavegacion').css({'overflow-y':'hidden'});
	$('.submenuPersonas').css({"display":"none"});
	$('.submenuCategorias').css({"display":"none"});
	$('.submenuReportes').css({"display":"none"});
	$('.submenuGeneral').css({"display":"none"});
	$('.submenuHogar').css({"display":"none"});
	$('.submenuSalud').css({"display":"none"});
	$('.submenuEducativo').css({"display":"none"});
	$('.submenuPIAR').css({"display":"none"});
	$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOnPasiva.png">');
	$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOnPasiva.png">');
	$('#personas').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
	$('#categorias').html('<img style="width:25px;height:25px" src="../appsArt/categoriasOnPasiva.png">');
	$('#Reportes').html('<img style="width:25px;height:25px" src="../appsArt/reportesOnPasiva.png">');
	$('#general').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
	$('#hogar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOnPasiva.png">');
	$('#salud').html('<img style="width:25px;height:25px" src="../appsArt/saludOnPasiva.png">');
	$('#educativo').html('<img style="width:25px;height:25px" src="../appsArt/educativoOnPasiva.png">');
	$('#piar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOnPasiva.png">');	
	$('.li').animate({width:'30px'},"fast");
	$('.menuNavegacion').animate({width:'45px'},"fast");
	/*	
	if(screen.width<800){
		$('.menuNavegacion').animate({width:'50px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.menuNavegacion').css({'overflow-y':'hidden'});
		$('.li').animate({width:'45px'},"fast");
		$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOnPasiva.png">');
		$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOnPasiva.png">');
		$('#personas').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
		$('.submenuPersonas').css({"display":"none"});
		$('#categorias').html('<img style="width:25px;height:25px" src="../appsArt/categoriasOnPasiva.png">');
		$('.submenuCategorias').css({"display":"none"});
		$('#Reportes').html('<img style="width:25px;height:25px" src="../appsArt/reportesOnPasiva.png">');
		$('.submenuReportes').css({"display":"none"});
		$('#general').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
		$('.submenuGeneral').css({"display":"none"});
		$('#hogar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOnPasiva.png">');
		$('.submenuHogar').css({"display":"none"});
		$('#salud').html('<img style="width:25px;height:25px" src="../appsArt/saludOnPasiva.png">');
		$('.submenuSalud').css({"display":"none"});
		$('#educativo').html('<img style="width:25px;height:25px" src="../appsArt/educativoOnPasiva.png">');
		$('.submenuEducativo').css({"display":"none"});
		$('#piar').html('<img style="width:25px;height:25px" src="../appsArt/familiaOnPasiva.png">');
		$('.submenuPIAR').css({"display":"none"});
	}else{			
	}
	*/
}
function mostrarSubMenu(submenu){	
	if($(submenu).css("display")==="none"){
		$(submenu).slideDown();
		$(submenu).css({"display":"block"});
		$('.menuNavegacion').animate({width:'210px'},"fast");
	}else{
		$(submenu).css({"display":"block"});
		$(submenu).slideUp("fast",function(){
		$('.menuNavegacion').animate({width:'180px'},"fast");
		});
	}	
	if(submenu==".submenuEducativo"){
		$('.menuNavegacion').css({'overflow-y':'scroll'});
	}
	/*
	if(screen.width<800){
		if($(submenu).css("display")==="none"){
			$(submenu).slideDown();
			$(submenu).css({"display":"block"});
			$('.menuNavegacion').animate({width:'480px'},"fast");
		}else{
			$(submenu).css({"display":"block"});
			$(submenu).slideUp("fast",function(){
			$('.menuNavegacion').animate({width:'420px'},"fast");
			});
		}
		if(submenu==".submenuEducativo"){
			$('.menuNavegacion').css({'overflow':'scroll'});
		}	
	}else{		
	}
	*/
}
/*
$(document).ready(function(){
	$(window).resize(function(){
		if ($(document).width() > 450){
			$('.menuNavegacion .menu').css({'display' : 'block'});
		}
		if ($(document).width() < 450){
			$('.menuNavegacion .menu').css({'display' : 'none'});
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
		}
	});	
});
*/
$(document).ready(function(){ //ocultar formularios
	$('.cerrar').click(function(){
		var elemento=$(this).parent().parent();		
		elemento.animate({'top':'-500px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	});
});//ocultar formularios
$(document).ready(function() {//mover formularios
	$("#formulario").draggable({stack:"#formulario"}, {handle:"#handler"});
});//mover formularios
$(document).ready(function() {//mover formulario Mis Reservaciones
	$("#formulario").draggable({stack:"#formulario"}, {handle:"#handler"});
});//mover formulario Mis Reservaciones
function mostrarFormCargueExcel(){
  if( $('#formCargueExcel').css('visibility') !== 'hidden') {
	    $('#formCargueExcel').css('visibility', 'hidden');	    
	  } else {
	    $('#formCargueExcel').css('visibility', 'visible');	    
	  }  
}
function reinstalarBD(){
	var confirmar=confirm("¿Realmente desea reinstalar la Base de Datos?\n\nEsta acción no se puede deshacer.");
	if(confirmar){		
		window.open("/eduInclusiva/adm/01-mdl/borrarBD.php");
		// var xmlhttp = new XMLHttpRequest();
		// xmlhttp.open("GET","../borrarTablas.php",false);
		// xmlhttp.send();
		alert("Se reinstaló la Base de Datos.");
	}else{
		alert("No se reinstaló la Base de Datos.");
	}
}
function ucwords(f){
    return f.replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1){
       return $1.toUpperCase(); 
    });
}