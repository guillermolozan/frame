module.exports = ()=>{
  
    if(is_local)
		  console.log('work / block_banner');
  // if($('.responsive').length>0){
    requirejs(['slippry.min'],()=>{

      loadCss(work_ven_css+'slippry.css');

      var demo1 = $(".slides").slippry({
        transition: 'fade',
        useCSS: true,
        speed: 1000,
        pause: 5000,
        auto: true,
        adaptiveHeight: true, // height of the sliders adapts to current slide
        // responsive: true,
      });


    let $close=$("#close");
    let $form_content=$(".form_content");
    $close.on("click", (e) => {
      if($close.hasClass('active')){
        $close.removeClass('active')
        $form_content.removeClass('active')
        console.log('close');
      } else {
        $close.addClass('active')
        $form_content.addClass('active')
        console.log('open');
      }

    });


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

