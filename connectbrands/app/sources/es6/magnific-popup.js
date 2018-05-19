module.exports = ()=>{

	if($('.galleries').length>0){

		requirejs(['magnific-popup.min'],()=>{

			loadCss('magnific-popup.css');

			$('.estadisticas').magnificPopup({
				delegate: 'a',
				gallery: {
				enabled: true
				},	  
				type: 'image'
			});

			$('.galleries').each( function (){ // the containers for all your galleries
				// console.log($(this));
				let getitems=$(this).find("#button").data('items');
				let items=eval(getitems);
				// console.log(getitems);
				$(this).magnificPopup({
					items:items,
					type: 'image',
					gallery: {
					 enabled:true
					}
				});
			});

			$('.selec_depa').each( function (){ // the containers for all your galleries

				$(this).magnificPopup({
					delegate: 'a',
					gallery: {
					enabled: true
					},	  
					type: 'image'
				});

			});

			$(".two span").on("click", function() {

				$(".two span").removeClass('active');
				$(this).addClass('active');
				$(".selec_depa").hide();
				$("."+$(this).data('depa')).show();

			});
		

		});

	}

}

