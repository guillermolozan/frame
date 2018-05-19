module.exports = ()=>{

   if(is_local)
		  console.log('work / gallery_grid');

	if($('.gallery_grid li a').length>0){

		requirejs(['magnific-popup.min'],()=>{

		loadCss('magnific-popup.css');

		$('.gallery_grid.photo').magnificPopup({
			delegate: 'a',
			gallery: {
			enabled: true
			},	  
			type: 'image'
		});


		// console.log('magnific');
		// alert('magnific');

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

