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
			$(".button-collapse").sideNav({
				closeOnClick: true
			});

			$('.collapsible').collapsible();
			$('.tooltipped').tooltip();
			$('select').material_select();

			mapSvg();
		});
 
		$(window).on('resize', function(){
			footerBottom();
		});
 
		$(document).scroll(function() {


		});
 
		if( parseInt( isHome ) ){
			$(document).ready(function() {

			});
		} 
 
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
		provincePara = province.querySelector("desc p");
		// sourceImg = province.querySelector("img"),
		// imgPath = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/";
		provinceInfo.innerHTML = "";
		provinceInfo.insertAdjacentHTML("afterbegin", "<h4>"+provinceName+"</h4><p>"+provincePara.innerHTML+"</p>");
		provinceInfo.classList.add("show");
		}
	})
} //mapSVG