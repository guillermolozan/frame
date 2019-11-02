module.exports = ()=>{

  // if($('.responsive').length>0){

    requirejs(['slippry.min'],()=>{

      loadCss('slippry.css');

      var demo1 = $(".slides").slippry({
        transition: 'fade',
        useCSS: true,
        speed: 1000,
        pause: 5000,
        auto: true,
        adaptiveHeight: true, // height of the sliders adapts to current slide
        // responsive: true,
      });


      if($('.p-home').length>0){
        $('body').addClass('hasSlider');
      }
      
      /*
      $('.responsive').slippry({
        // dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
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
      */
     
    });

  // }

}

