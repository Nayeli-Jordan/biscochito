var $=jQuery.noConflict();
 
(function($){
	"use strict";
	$(function(){
 
		/*------------------------------------*\
			#GLOBAL
		\*------------------------------------*/

		$(document).ready(function() {
			document.getElementById("year").innerHTML = new Date().getFullYear();
			footerBottom();	
			navScroll();				
			$(".button-collapse").sideNav({
				closeOnClick: true
			});
			// Activa estilo select materialize para form contacto 
			$('select').material_select();			
			// Permite el scroll a contacto
			$("a#contacto").removeAttr("href");
		});
 
		$(window).on('resize', function(){
			footerBottom();
		});
 
		$(document).scroll(function() {
			navScroll();
		});
 
		if( parseInt( isHome ) ){
			$(document).ready(function() {				
				// Permite el scroll si se está en home
				$("a#servicios").removeAttr("href");
				// Masonry para imagenes galería
				imageMasonry();
				// Activa lightbox imagenes galería
				$('.materialboxed').materialbox();
				// Activa mapa SVG
				mapSvg();
			});
		} 

		if( parseInt( isPageGallery ) ){
			$(document).ready(function() {
				//Masonry para imagenes galería
				imageMasonry();
				// Activa lightbox imagenes galería
				$('.materialboxed').materialbox();
			});
		} 

		if( parseInt( isSingular ) ){
			$(document).ready(function() {
				// Activa collapse de variedades
				$('.collapsible').collapsible();
				// Activa info extra de *
				$('.tooltipped').tooltip();
				// Activa modal
				$('.modal').modal();
			});
		} 
 
		//Scroll menú
		$("a#contacto, a#servicios, .return-top").click(function() {
			//buttonMenuScroll();
			var idOption = $(this).attr('id'); //Opción del menú
			// console.log(idOption);
			var idSection = "#section-" + idOption; //Sección a la que se dirigirá
			// console.log(idSection); 
			$('html, body').animate({		
				scrollTop: $(idSection).offset().top - 70
			}, 1500);
		});

	});
})(jQuery);
 
/**
 * Fija el footer abajo
 */
function footerBottom(){
	var alturaFooter = getFooterHeight();
	$('.main-body').css('padding-bottom', alturaFooter );
}
function getHeaderHeight(){
	return $('.js-header').outerHeight();
}// getHeaderHeight
function getFooterHeight(){
	return $('footer').outerHeight();
}// getFooterHeight

/**
 * Estilo navegador fijo
 */
function navScroll(){
	if ($(window).scrollTop() > 40 ) {
		$('header nav').addClass('nav-scroll');
	} else {
		$('header nav').removeClass('nav-scroll');
	};
}

//Masonry galería
function imageMasonry(){
	// init Packery
	var $grid = $('.grid').packery({
		itemSelector: '.grid-item',
		percentPosition: true
	});
	// layout Packery after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.packery();
	}); 
}

//Mapa de costo de entrega
function mapSvg(){
	var mexicomap = document.getElementById("mexico-map"),
	provinceInfo = document.getElementById("provinceInfo"),
	allProvinces = mexicomap.querySelectorAll("g");
	mexicomap.addEventListener("click", function(e){
		var province = e.target.parentNode;
		if(e.target.nodeName == "path") {
		for (var i=0; i < allProvinces.length; i++) {
			allProvinces[i].classList.remove("active");
		}
		province.classList.add("active");
		var provinceName = province.querySelector("title").innerHTML,
		provincePara = province.querySelector("desc");
		// sourceImg = province.querySelector("img"),
		// imgPath = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/";
		provinceInfo.innerHTML = "";
		provinceInfo.insertAdjacentHTML("afterbegin", "<h4>"+provinceName+"</h4><p>"+provincePara.innerHTML+"</p>");
		provinceInfo.classList.add("show");
		}
	})
} //mapSVG