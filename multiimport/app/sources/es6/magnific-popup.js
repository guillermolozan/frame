module.exports = ()=>{

	if($('.parent-container li a').length>0){

		requirejs(['magnific-popup.min'],()=>{

		loadCss('magnific-popup.css');

		$('.parent-container li ').magnificPopup({
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

