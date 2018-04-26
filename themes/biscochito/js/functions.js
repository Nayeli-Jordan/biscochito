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

		if( parseInt( isPagePaquetes ) ){
			$(document).ready(function() {
				//Activar tabs paquetes
				$('.tabs').tabs();
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
				// info-pack fijo
				infoPackFixed();
			});
			$(document).scroll(function() {
				infoPackFixed();
			});
			$(window).on('resize', function(){
				infoPackFixed();
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

/**
 * Info pack (single) fijo
*/

//Obtener altura de sección de título del paquete single
function getTitleHeight(){
	return $('.main-body section:first-child').outerHeight();
}
//Obtener altura del contenedor de resto del paquete (col izq)
function getLeftColHeight(){
	return $('#content-pack').outerHeight();
}
//Obtener altura del #info-pack
function getInfoPackHeight(){
	return $('#info-pack').outerHeight();
}
//Obtener ancho del contenedor de #info-pack
function getContentWidth(){
	return $('#content-info-pack').width();
}

function infoPackFixed(){
	var widthBox 			= getContentWidth();
	var heightLeftPack 		= getLeftColHeight();

	var alturaTitle 		= getTitleHeight();
	var previusScroll 		= alturaTitle + 60;

	var alturaInfoBox 		= getInfoPackHeight();
	var nextScroll 			= heightLeftPack - alturaInfoBox;
	var nextTotalScroll		= nextScroll - 65; //altura de figura caramelos
	var restScroll	 		= previusScroll + nextTotalScroll; 

	var mq = window.matchMedia( "(min-width: 601px)" );
	if (mq.matches) {   //Is dektop
		$('#content-info-pack').css('height', heightLeftPack);

		if ($(window).scrollTop() > restScroll ) {
			$('#info-pack').addClass('box-fixed-bottom').removeClass('box-fixed').css('width', widthBox);
		} else if ($(window).scrollTop() > previusScroll ) {
			$('#info-pack').addClass('box-fixed').removeClass('box-fixed-bottom').css('width', widthBox);
		} else {
			$('#info-pack').removeClass('box-fixed box-fixed-bottom').css('width', '');
		}
	} else {
		$('#content-info-pack').css('height', '');
		$('#info-pack').removeClass('box-fixed box-fixed-bottom').css('width', '');
	}
}

