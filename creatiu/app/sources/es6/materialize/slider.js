module.exports = ()=>{

   $('.slider').slider({height: 535,full_width:true});
   // console.log('slider');
 // 	$('.slides').append("<div class='flechas'><a class='izquierda'></a><a class='derecha'></a></div>")
	// $( ".flechas .izquierda" ).click( ()=>{
	// 	$('.slider').slider('prev');
	// });


	// $(".two span").on("click", function() {

	// 	$(".two span").removeClass('active');
	// 	$(this).addClass('active');
	// 	$(".selec_depa").hide();
	// 	$("."+$(this).data('depa')).show();

	// });


	$(".izquierda").on("click", function() {
		
		$('.slider').slider('prev');

	});

	$(".derecha").on("click", function() {
		
		$('.slider').slider('next');

	});

}

