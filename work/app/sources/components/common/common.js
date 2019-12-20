module.exports = ()=>{

	if(is_local)
		console.log('work / common');
    



  if($('header').length>0){

		requirejs(['tripleclick'],()=>{

		   // $(window).load(function() {
		   // $(document).ready(function() {

		   	console.log('cargado tripleclick');
				$("header").bind("tripleclick", function() { 
				  
				  console.log('señores');
				  // location.href='?tool';

				});

			// });

		});

	}



	$('.parallax').parallax();


	Materialize.updateTextFields();


	//////////////////////
	// TO RELEASE
	////////////////////
	let fire_options=[];
	let ff=0;
	$(".torelease").each(function( index ) {
		let firsts=$(this).attr('class').split(' ');
		let ee=0;
		let ii=[];
		$.each( firsts, ( key, value )=> {
			if(value!='torelease') ii[ee++]=value;
		});
		// fire_options[ff++]=ii['0'];
		fire_options[ff++]={selector: '.'+ii['0'], offset: 300, callback: (el)=> { $('.'+ii['0']).addClass('release'); } }
;
		// console.log('torelease: .'+ii['0']);
		Materialize.scrollFire(fire_options);
	});
	// console.log(fire_options);


	//////////////////////
	// MAP
	////////////////////
	// if($('#map').length > 0){

	// 	let map;
	// 	let dmap=$("#map");

	// 	map = new GMaps({
	// 	  div: '#map',
	// 	  lat: dmap.data("lat"),
	// 	  lng: dmap.data("lon")
	// 	});
	// 	map.addMarker({
	// 	  lat: dmap.data("lat"),
	// 	  lng: dmap.data("lon"),
	// 	  title: dmap.data("name"),
	// 	  infoWindow: {
	// 	    content: dmap.data("text")
	// 	  }          
	// 	});

	// }



//////////////////////
// DEBUG
////////////////////

if(is_debug){
	console.log('debug');
	$("#debug_submenu").append($(".menu .menu_prodiserv").html());
	$("#debug_submenu > a").html("menu");
	// console.log($("#list_debug").html());
	$("#debnu").append($("#list_debug").html());
	$("#debemail").append($("#list_emails").html());
}


//////////////////////
// FORM
////////////////////

// $('select').material_select();

$('textarea').trigger('autoresize');

$('.datepicker').pickadate({
 
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 1, // Creates a dropdown of 15 years to control year,
   // today: 'Hoy',
   // clear: 'Cancelar',
   // close: 'Aceptr',
   closeOnSelect: true, // Close upon selecting a date,
	// The title label to use for the month nav buttons
	labelMonthNext: 'Mes siguiente',
	labelMonthPrev: 'Mes anterior',

	// The title label to use for the dropdown selectors
	labelMonthSelect: 'Selecciona un mes',
	labelYearSelect: 'Selecciona un año',

	// Months and weekdays
	monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
	monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
	weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
	weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

	// Materialize modified
	weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],

	// Today and clear
	today: 'Hoy',
	clear: 'Limpiar',
	close: 'Aceptar',

	firstDay: true

});


}