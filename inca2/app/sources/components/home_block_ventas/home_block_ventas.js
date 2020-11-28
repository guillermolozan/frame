module.exports = ()=>{
	if(is_local)
		console.log('ardyss / home_block_ventas');

  let domm='.home_block_ventas';

  if($(domm+' .responsive').length>0){

    requirejs(['slick.min'],()=>{
      loadCss('slick.css');

		$(domm+' .responsive').slick({
		  dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 3,
		  slidesToScroll: 3,
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
	