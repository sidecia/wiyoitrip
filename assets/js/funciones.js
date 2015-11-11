// JavaScript Document
		jQuery.extend(jQuery.validator.messages, {
            required: "El campo es requerido.",
            remote: "Por favor, corrija este campo.",
            email: "Por favor, introduce una dirección de correo electrónico válida.",
            url: "Por favor introduzca una URL válida.",
            date: "Por favor, introduzca una fecha válida.",
            dateISO: "Por favor, introduzca una fecha válida (ISO ).",
            number: "Por favor ingrese un número válido.",
            digits: "Por favor, ingrese sólo dígitos.",
            creditcard: "Por favor, introduzca un número de tarjeta de crédito válida.",
            equalTo: "Por favor, introduzca el mismo valor de nuevo.",
            accept: "Por favor, introduzca un valor con una extensión válida.",
            maxlength: jQuery.validator.format("Por favor ingrese no más de { 0 } caracteres."),
            minlength: jQuery.validator.format("Please enter at least {0} characters."),
            rangelength: jQuery.validator.format("Por favor, introduzca un valor entre { 0 } y { 1 } caracteres."),
            range: jQuery.validator.format("Por favor, introduzca un valor entre { 0 } y { 1 }."),
            max: jQuery.validator.format("Por favor, introduzca un valor menor o igual a { 0 }."),
            min: jQuery.validator.format("Por favor, introduzca un valor mayor o igual a { 0 }.")
        });
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
		$(document).ready(function(){			    								
				
		});
		<!--Seccion Login Usuarios-->		
		$(document).on("click","#genera_registro",function(event){
			event.preventDefault();
			var form = $( "#form_registro" );
			var data = form.serialize();
			form.validate();
			if(form.valid()){
				$.ajax({
					 type: "POST",
					 url: base_url+"usuario/registro",
					 data: data,
					 dataType:"json",
					 success: function(response){
						 callback_registro(response.mensaje,response.codigo);						
					  }
				});
			}
		});
		function callback_registro(mensaje,codigo){			
			switch (codigo){
				case "1": 
						$('#registro').modal('hide');
						if(mensaje!=""){
							$("#contenido_mensaje").html("<p>"+mensaje+"</p>")
							$('#mensajes_systema').modal('show');
						}
						$('#mensajes_systema').on('hide.bs.modal', function (e) {
							window.location.replace(base_url+"login");
						});
				break;
				
				case "2": 								
						$( "#form_registro" ).prepend('<div class="alert alert-danger" role="alert">'+mensaje+'</div>');			
				break;
			}
			
		}
		<!--Seccion Activacion de Cuenta Usuario-->       
        $(document).on("click","#btn_guardapassword",function(event){
            event.preventDefault();
            var form = $( "#asignar_password" );
            var data = form.serialize();
            form.validate({
                rules: {
				   password: { 
					 required: true,
						minlength: 6
				   } , 	
				   password_confirm: { 
						equalTo: "#password",
						 minlength: 6
				   }
			   }
         });
            if(form.valid()){
                $.ajax({
                     type: "POST",
                     url: base_url+"usuario/asignar_password",
                     data: data,
                     dataType:"json",
                     success: function(response){						
						callback_activacion(response.mensaje,response.codigo);
						$('#mensajes_systema').modal('show');	
                      }
                });
            }
        });	
		function callback_activacion(mensaje,codigo){
			if(mensaje!=""){
				$("#contenido_mensaje").html("<p>"+mensaje+"</p>")
				$('#mensajes_systema').modal('show');
			}
			switch (codigo){
				case "1": 
						$('#mensajes_systema').on('hide.bs.modal', function (e) {
							window.location.replace(base_url+"login");
						});
				break;
				
				case "2": 						
				break;
			}
			
		}
		<!--Seccion Recuperar Contraseña--> 
		$(document).on("click","#enviar_password_mail",function(event){			
			event.preventDefault();
			var form = $( "#form_recuperar" );
			var data = form.serialize();
			form.validate();
			if(form.valid()){
				$.ajax({
					 type: "POST",
					 url: base_url+"usuario/enviarpassword",
					 data: data,
					 dataType:"json",
					 success: function(response){
						 callback_enviarpassword(response.mensaje,response.codigo);						
					  }
				});
			}
		});
		$(document).on("click","#btn_cambiarpassword",function(event){
            event.preventDefault();
            var form = $( "#cambiar_password" );
            var data = form.serialize();
            form.validate({
                rules: {
				   password: { 
					 required: true,
						minlength: 6
				   } , 	
				   password_confirm: { 
						equalTo: "#password",
						 minlength: 6
				   }
			   }
         });
            if(form.valid()){
                $.ajax({
                     type: "POST",
                     url: base_url+"usuario/restablecerpassword",
                     data: data,
                     dataType:"json",
                     success: function(response){						
						callback_activacion(response.mensaje,response.codigo);
						$('#mensajes_systema').modal('show');	
                      }
                });
            }
        });
		function callback_enviarpassword(mensaje,codigo){
			var clase="";
			switch (codigo){
				case "1": 
						clase="success";
				break;
				
				case "2": 	
						clase="danger";					
				break;
			}
			$("#texto_mensaje").remove();
			$( "#header_recuperar" ).append('<div id="texto_mensaje" class="alert alert-'+clase+'" role="alert">'+mensaje+'</div>');
			$('#olvide_password').on('hide.bs.modal', function (e) {
							window.location.replace(base_url+"login");
			});
			
		}
<!--Operaciones Modulos-->		
$(document).on("click",".operaciones",function(event){
	event.preventDefault();
	var accion=$(this).attr("data-accion");
	var modulo=$(this).attr("data-modulo");	
	var data="";	
	var continua=true;
	var cuenta=0;
	var mensaje="";
	var extra_url="";
	var id="";
	$("#t_"+modulo+" input[type=checkbox]").each(function(){
			if($(this).is(":checked")){
				cuenta++;									
				id+=$(this).attr("id")+",";
			}
	});
	if(cuenta>0){
		id=id.slice(0,-1);	
	}
	if(accion=="add"){
		
	}
	if(accion=="edit"){
		if(cuenta!=1){
			continua=false;		
			bootbox.alert("Seleccione un solo registro editar");
			
		}else{
			extra_url="/"+id;			
		}
	}
	else if(accion=="delete" ){
		if(cuenta==0){
			continua=false;		
			bootbox.alert("Seleccione un solo registro para eliminar");
		}
		else{
			data=id;
		}
	}
	
	if(continua){
			controlAcciones(accion,modulo);
			$.ajax({
				 type: "POST",
				 url: base_url+"ajax/"+modulo+"/"+accion+extra_url,
				 data: data,
				 dataType:"json",
				 success: function(data){	
				 		if(data.codigo==20){
							window.location.replace(base_url+"login");
						}
				 		var titulo="Empresas";			
				 		if(data.titulo!=""){
							 titulo=data.titulo;		
							 $("#tabPrincipal").html(data.titulo);
						}
						$("#contenidoGeneral").html(data.html);					
				  }
			});
	}
	
});
$(document).on("click","#cancelarRegistro",function(){
	var form_padre=$(this).closest("form");
	console.log(form_padre.attr("id"));	
	$.ajax({
		 type: "POST",
		 url: base_url+"ajax/"+modulo+"/"+accion+extra_url,
		 data: data,
		 dataType:"json",
		 success: function(data){	
				var titulo="Empresas";			
				if(data.titulo!=""){
					 titulo=data.titulo;		
					 $("#tabPrincipal").html(data.titulo);
				}
				$("#contenidoGeneral").html(data.html);					
		  }
	});
	
});
$(document).on("click","#guardarRegistro",function(){
	var form_padre=$(this).closest("form");
	var idform=form_padre.attr("id");	
	var idreg=$("#"+idform+" #id").val();	
	var modulo=$("#"+idform).attr("data-modulo");
	var accion="";
	var data=form_padre.serialize();	
	if(idreg>0){
		accion="update";
		extra_url="/"+idreg;
	}
	else {
		accion="insert";
		extra_url="";
	}	
	$.ajax({
		 type: "POST",
		 url: base_url+"ajax/"+modulo+"/"+accion+extra_url,
		 data: data,
		 dataType:"json",
		 success: function(data){	
				var titulo="";							
				if(data.titulo!=""){
					 titulo=data.titulo;		
					 $("#tabPrincipal").html(data.titulo);
				}
				if(data.codigo==1){
					bootbox.dialog({
					  message: data.mensaje,
					  title: "Aceptar",
					  buttons: {
						success: {
						  label: "Aceptar",
						  className: "btn-success",
						  callback: function() {
							
						  }
						},
						main: {
						  label: "Regresar al Listado",
						  className: "btn-primary",
						  callback: function() {
								$.ajax({
									 type: "POST",
									 url: base_url+"ajax/"+modulo+"/list",
									 data: data,
									 dataType:"json",
									 success: function(data){	
									 		controlAcciones("list",modulo);													
											if(data.titulo!=""){
												 titulo=data.titulo;		
												 $("#tabPrincipal").html(data.titulo);
											}
											$("#contenidoGeneral").html(data.html);					
									  }
								});
						  }
						}
					  }
					});

				}
				else if(data.codigo==0){
					bootbox.alert(data.mensaje);
				}
				else if(data.codigo==20){
					window.location.replace(base_url+"login");
				}
		  }
	});
	
});	
function controlAcciones(accion,modulo){
	
	switch(accion){
		case "list":			
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='add'] ").attr("disabled",false);	
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='edit'] ").attr("disabled",false);	
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='delete'] ").attr("disabled",false);			
		break;
		case "add":
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='edit'] ").attr("disabled",true);	
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='delete'] ").attr("disabled",true);
		break;
		case "edit":
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='edit'] ").attr("disabled",true);	
			$(".operaciones[data-modulo='"+modulo+"'][data-accion='delete'] ").attr("disabled",false);
		break;
		case "delete":
		break;
			
	}
	
}

