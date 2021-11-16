function mostrarFormularios(clase){	
	//alert(clase);
	$(clase).css({"visibility":"visible"});
	$(clase).animate({'top':'238px'},500);
}
function mostrarMenu(){
	$('.menuNavegacion').css({"border-right":"1px solid gray"});
	if(screen.width<800){
		//alert(screen.width);
		$('.menuNavegacion').animate({width:'420px'},"fast",function(){
			$('.li').animate({width:'410px'},"fast",function(){
				$('#listProy').html('<img style="width:40px;height:40px" src="../art/atras.svg">' + 'Ir a Lista de Proyectos');
				$('#verBD').html('<img style="width:40px;height:40px" src="../art/bd.svg">' + 'Ver Base de Datos');
				$('#invBienes').html('<img style="width:40px;height:40px" src="../art/inventario.png">' + 'Inventario de Bienes');
				$('#admon').html('<img style="width:40px;height:40px" src="../art/administracion.svg">' + 'Adminstración');
				$('#reiniciarBD').html('<img style="width:40px;height:40px" src="../art/reiniciar.svg">' + 'Reinstalar BD');
				$('#genActa').html('<img style="width:40px;height:40px" src="../art/acta.svg">' + 'Generar Acta');
				$('#expExcel').html('<img style="width:40px;height:40px" src="../art/exportar.svg">' + 'Exportar a Excel');
			});
		});
	}else{
		$('.menuNavegacion').animate({width:'180px'},"fast",function(){
			$('.li').animate({width:'160px'},"fast",function(){
				$('#listProy').html('<img style="width:15px;height:15px" src="../art/atras.svg">' + 'Ir a Lista de Proyectos');
				$('#verBD').html('<img style="width:15px;height:15px" src="../art/bd.svg">' + 'Ver Base de Datos');
				$('#invBienes').html('<img style="width:15px;height:15px" src="../art/inventario.png">' + 'Inventario de Bienes');
				$('#admon').html('<img style="width:15px;height:15px" src="../art/administracion.svg">' + 'Adminstración');
				$('#reiniciarBD').html('<img style="width:15px;height:15px" src="../art/reiniciar.svg">' + 'Reinstalar BD');
				$('#genActa').html('<img style="width:15px;height:15px" src="../art/acta.svg">' + 'Generar Acta');
				$('#expExcel').html('<img style="width:15px;height:15px" src="../art/exportar.svg">' + 'Exportar a Excel');
			});
		});
	}
}
function ocultarMenu(){
	if(screen.width<800){
		$('.menuNavegacion').animate({width:'50px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.li').animate({width:'45px'},"fast");
		$('#listProy').html('<img style="width:40px;height:40px" src="../art/atras.svg">');
		$('#verBD').html('<img style="width:40px;height:40px" src="../art/bd.svg">');
		$('#invBienes').html('<img style="width:40px;height:40px" src="../art/inventario.png">');
		$('#admon').html('<img style="width:40px;height:40px" src="../art/administracion.svg">');
		$('.submenuAdmon').css({"display":"none"});
		$('#reiniciarBD').html('<img style="width:40px;height:40px" src="../art/reiniciar.svg">');
		$('#genActa').html('<img style="width:40px;height:40px" src="../art/acta.svg">');
		$('#expExcel').html('<img style="width:40px;height:40px" src="../art/exportar.svg">');
	}else{
		$('.menuNavegacion').animate({width:'24px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.li').animate({width:'20px'},"fast");
		$('#listProy').html('<img style="width:15px;height:15px" src="../art/atras.svg">');
		$('#verBD').html('<img style="width:15px;height:15px" src="../art/bd.svg">');
		$('#invBienes').html('<img style="width:15px;height:15px" src="../art/inventario.png">');
		$('#admon').html('<img style="width:15px;height:15px" src="../art/administracion.svg">');
		$('.submenuAdmon').css({"display":"none"});
		$('#reiniciarBD').html('<img style="width:15px;height:15px" src="../art/reiniciar.svg">');
		$('#genActa').html('<img style="width:15px;height:15px" src="../art/acta.svg">');
		$('#expExcel').html('<img style="width:15px;height:15px" src="../art/exportar.svg">');
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
		window.open("/inventarioIET/03-borrarTablas.php");
		// var xmlhttp = new XMLHttpRequest();
		// xmlhttp.open("GET","../borrarTablas.php",false);
		// xmlhttp.send();
		alert("Se reinstaló la Base de Datos.");
	}else{
		alert("No se reinstaló la Base de Datos.");
	}

}