/*******Funciones Mapas***************/
    var map = null;
    var markers = null;
   	var myLatlng = null;
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow({
        content: "",
        maxWidth: 200
    });
					 
    function initializeMap() {
		
		myLatlng = new google.maps.LatLng(0, 0);
        var myOptions = {
          zoom: 5,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }		
        map = new google.maps.Map($("#map").get(0), myOptions);			
	
	}	
    function clearOverlays(){
    	if(markers != null)
	    	$.each(markers, function(index, value){
	    		if(markers[index] != null)
	    			markers[index].setMap(null);
	    	});    	
    }
    function centerMap(){
    	map.setCenter(new google.maps.LatLng(23.725012, -102.172852));
    	map.setZoom(7);
    }
	function mostrar_mapas(registros,modo){
		if(modo=="inicial"){
			initializeMap();
			clearOverlays();
			markers = new Array();						
			if(registros!==null &&  registros.length > 0){					
				bounds = new google.maps.LatLngBounds();
				$.each(registros, function(index, value){
					if(value.coordenadas!=="" && value.coordenadas!==null){
						var coordenadas = value.coordenadas.split(",");
						var position = new google.maps.LatLng(coordenadas[0], coordenadas[1]);
						bounds.extend(position);				
						var marker = new google.maps.Marker({
							position: position,
							map: map,
							title: value.titulo,
							icon: base_url+"assets/img/recursos/"+value.indicador+".png"
						});					
						markers[value.idreal] = marker;
						(function(marker, value){
							var imagen="";
							var foto=value.foto;					
							var titulo=value.titulo;					
							if(foto==="" || foto==null){
									
							}else{
								imagen='<img src="recursos/' + foto.replace(/\\/g, "") + '" style="width:80px;heigth:80px;" />';
							}
							if(titulo==="" || titulo==null){
									
							}else{
								titulo='<br>'+titulo;
							}
							var texto = '<div>'+imagen+titulo + '</div>';
							google.maps.event.addListener(marker, "click", function(){
								infowindow.setContent(texto);
								infowindow.open(map, marker);
								$(".propiedadMapa").css("height", "auto");
								$(".propiedadMapa").parent().css("overflow", "hidden");
								$(".propiedadMapa").parent().parent().css("overflow", "hidden");
							});					
						})(marker, value);
					}
				});			
				map.fitBounds(bounds);
			 }else{
				$("#map").hide();															
			 }
		}else{	
			$.each(registros, function(index, value){
				if(value.coordenadas!=="" && value.coordenadas!==null){
					var coordenadas = value.coordenadas.split(",");
					var position = new google.maps.LatLng(coordenadas[0], coordenadas[1]);
					addMarker(position,value.titulo,"recursos/imagenes/flecha"+value.indicador+".png",value.idreal,value);										
				}
			});	
		}
		
		
		
}
function addMarker(position,titulo,icono,idreal,value) {
		bounds.extend(position);
        var marker = new google.maps.Marker({
						position: position,
						map: map,
						title: titulo,
						icon: icono
		});
		markers[idreal] = marker;
		(function(marker, value){
			var imagen="";
			var foto=value.foto;					
			var titulo=value.titulo;					
			if(foto==="" || foto==null){
					
			}else{
				imagen='<img src="recursos/' + foto.replace(/\\/g, "") + '" style="width:80px;heigth:80px;" />';
			}
			if(titulo==="" || titulo==null){
					
			}else{
				titulo='<br>'+titulo;
			}
			var texto = '<div>'+imagen+titulo + '</div>';
			google.maps.event.addListener(marker, "click", function(){
				infowindow.setContent(texto);
				infowindow.open(map, marker);
				$(".propiedadMapa").css("height", "auto");
				$(".propiedadMapa").parent().css("overflow", "hidden");
				$(".propiedadMapa").parent().parent().css("overflow", "hidden");
			});					
		})(marker, value);		
}
/*********************/

$(document).on("click",".indicador",function(event){
			event.preventDefault();					
			var id = $(this).attr("id");			
			google.maps.event.trigger(markers[id],"click");
			$('html, body').animate({scrollTop: $("#map").offset().top-80}, 1000);
});