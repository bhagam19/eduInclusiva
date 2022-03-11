function mostrarFormularios(clase){	
	//alert(clase);
	$(clase).css({"visibility":"visible"});
	$(clase).animate({'top':'238px'},500);
}
function mostrarMenu(){		
	$('.menuNavegacion').css({"border-right":"1px solid #80c0fc"});
	if(screen.width<800){
		//alert(screen.width);
		$('.menuNavegacion').animate({width:'420px'},"fast",function(){
			$('.li').animate({width:'410px'},"fast",function(){
				$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOn.png">' + 'Inicio');
				$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOn.png">' + 'Reiniciar BD');
				$('#admon').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Adminstración BD');
			});
		});
	}else{		
		$('.menuNavegacion').animate({width:'180px'},"fast",function(){
			$('.li').animate({width:'160px'},"fast",function(){
				$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOn.png">' + 'Inicio');
				$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOn.png">' + 'ReiniciarBD');
				$('#admon').html('<img style="width:25px;height:25px" src="../appsArt/adminOn.png">' + 'Adminstración BD');				
			});
		});
	}
}
function ocultarMenu(){
	if(screen.width<800){
		$('.menuNavegacion').animate({width:'50px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.li').animate({width:'45px'},"fast");
		$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOnPasiva.png">');
		$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOnPasiva.png">');
		$('#admon').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
		$('.submenuAdmon').css({"display":"none"});		
	}else{	
		$('.menuNavegacion').css({"border-right":"none"});	
		$('.submenuAdmon').css({"display":"none"});
		$('#home').html('<img style="width:25px;height:25px" src="../appsArt/homeOnPasiva.png">');
		$('#reiniciarBD').html('<img style="width:25px;height:25px" src="../appsArt/bdOnPasiva.png">');
		$('#admon').html('<img style="width:25px;height:25px" src="../appsArt/adminOnPasiva.png">');
		$('.menuNavegacion').animate({width:'35px'},"fast");
		$('.li').animate({width:'30px'},"fast");
	}
}
function mostrarSubMenu(){
	if(screen.width<800){
		if($('.submenuAdmon').css("display")==="none"){
			$('.submenuAdmon').slideDown();
			$('.submenuAdmon').css({"display":"block"});
			$('.menuNavegacion').animate({width:'480px'},"fast");
		}else{
			$('.submenuAdmon').css({"display":"block"});
			$('.submenuAdmon').slideUp("fast",function(){
			$('.menuNavegacion').animate({width:'420px'},"fast");
			});
		}	
	}else{
		if($('.submenuAdmon').css("display")==="none"){
			$('.submenuAdmon').slideDown();
			$('.submenuAdmon').css({"display":"block"});
			$('.menuNavegacion').animate({width:'210px'},"fast");
		}else{
			$('.submenuAdmon').css({"display":"block"});
			$('.submenuAdmon').slideUp("fast",function(){
			$('.menuNavegacion').animate({width:'180px'},"fast");
			});
		}	
	}
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