module.exports = ()=>{
	if(is_local)
		console.log('asiste / home_block_descuentos');

  let domm='.home_block_descuentos';

  if($(domm+' .responsive').length>0){

    requirejs(['slick.min'],()=>{
      loadCss('slick.css');

		$(domm+' .responsive').slick({
		  dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  autoplay: true,
		  autoplaySpeed: 8000,
  		  // fade: true,
  		  // cssEase: 'linear',
		  responsive: [
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

      // $('.venobox').venobox(); 

      // console.log('slick');

    });

  }

}
	