module.exports = ()=>{

	if($('.detail_habitacion .foto a').length>0){

		requirejs(['magnific-popup.min'],()=>{

		loadCss('magnific-popup.css');

		// $('.parent-container').magnificPopup({
		// 	delegate: 'a',
		// 	gallery: {
		// 	enabled: true
		// 	},	  
		// 	type: 'image'
		// });


		// $('.p-detail .fotos').magnificPopup({
		$('.detail_habitacion .foto').magnificPopup({
			delegate: 'a',
			gallery: {
			enabled: true
			},	  
			type: 'image'
		});


		console.log('magnific');

		});

	}

}

