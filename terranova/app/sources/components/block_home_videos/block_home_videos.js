module.exports = ()=>{

  if(is_local)
    console.log('block_home_videos');

  let domm='.block_home_video .responsive'

  if($(domm).length>0){

    requirejs(['slick.min'],()=>{

      loadCss('slick.css');

		$(domm).slick({
		  // dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 1,
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

