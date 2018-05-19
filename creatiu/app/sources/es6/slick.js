module.exports = ()=>{

  if($('.responsive').length>0){

    requirejs(['slick.min'],()=>{

      loadCss('slick.css');

		$('.responsive').slick({
		  // dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 6,
		  slidesToScroll: 1,
		  // autoplay: true,
		  autoplaySpeed: 8000,
  		  // fade: true,
  		  // cssEase: 'linear',
		  responsive: [
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        infinite: true,
		        // dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

    });

  }

}

