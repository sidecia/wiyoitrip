// JavaScript Document
$(document).ready(function(){			    								
		 var swiper = new Swiper('#calendario_eventos', {
			pagination: '.swiper-pagination',
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',					
			initialSlide:3,
			autoplay: 3500,
			autoplayDisableOnInteraction: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			coverflow: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows : false
			}
		});
		var swiper2 = new Swiper('#propiedades', {
			pagination: '.swiper-pagination',								    
			slidesPerView: 'auto',	
			effect: 'slide',
			centeredSlides: false,						
			spaceBetween: 15,
			loop:true,
			initialSlide:1,
			autoplay: 2500,
			autoplayDisableOnInteraction: false,
			nextButton: '.swiper2-button-next',
			prevButton: '.swiper2-button-prev',			
		});
});

