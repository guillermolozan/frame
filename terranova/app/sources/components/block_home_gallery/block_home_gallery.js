module.exports = ()=>{

	let domm = '.block_gallery_photos'
	if($(domm+' li a').length>0){

		requirejs(['magnific-popup.min'],()=>{

			loadCss('magnific-popup.css');

			$(domm+' ul').magnificPopup({
				delegate: 'a',
				gallery: {
				enabled: true
				},	  
				type: 'image'
			});

		});

	}

}