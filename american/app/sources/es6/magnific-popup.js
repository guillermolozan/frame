module.exports = ()=>{

	if($('.galleries').length>0){

		requirejs(['magnific-popup.min'],()=>{

		loadCss('magnific-popup.css');

		$('.p-photos .parent-container').magnificPopup({
			delegate: 'a',
			gallery: {
			enabled: true
			},	  
			type: 'image'
		});

		$('.p-detail .foto').magnificPopup({
			delegate: 'a',
			gallery: {
			enabled: true
			},	  
			type: 'image'
		});

		console.log('magnific');

		// $('.p-servicios .galleries').each( function (){ // the containers for all your galleries
		// 	// console.log($(this));
		// 	let getitems=$(this).find("#button").data('items');
		// 	let items=eval(getitems);
		// 	// console.log(getitems);
		// 	$(this).magnificPopup({
		// 		items:items,
		// 		type: 'image',
		// 		gallery: {
		// 		 enabled:true
		// 		}
		// 	});
		// });


		});

	}

}

