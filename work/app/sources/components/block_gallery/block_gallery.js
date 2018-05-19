module.exports = ()=>{

    if(is_local)
		  console.log('work / block_gallery');

	if($('.gallery.photos li a').length>0){

		requirejs(['magnific-popup.min'],()=>{

		loadCss('magnific-popup.css');

		$('.gallery.photos').magnificPopup({
			delegate: 'a',
			gallery: {
			enabled: true
			},	  
			type: 'image'
		});

		// console.log('magnific');

		});
// 
	}


	if($('.gallery.videos li a').length>0){

    requirejs(['venobox.min'],()=>{

      loadCss('venobox.css');

      $('.venobox').venobox(); 

    });

  }



}

