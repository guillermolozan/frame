(($)=>{$(()=>{


    $('.scrollspy').scrollSpy();


    require("./fix")();


    require("./materialize/sidenav")();


    require("./materialize/slider")();


    require("./materialize/modal")();

    require("./map")();

    // $('select').material_select();
    $("#select_date").on("change", (e) => {
        var vall=$(e.target).val();
        $(".dates_all").hide();
        $(".dates_"+vall).show();
    });

    $(window).scroll( () => {

        if($(window).scrollTop() > 600)
            $('.local .card').addClass('localfixed');
        else    
            $('.local .card').removeClass('localfixed');

        if($(window).scrollTop() > 155)
            $('header').addClass('headerfixed');
        else    
            $('header').removeClass('headerfixed');

    });



    // $('.fancybox-media')
    //     .fancybox({
    //         openEffect : 'none',
    //         closeEffect : 'none',
    //         prevEffect : 'none',
    //         nextEffect : 'none',

    //         arrows : false,
    //         helpers : {
    //             media : {},
    //         }
    //     });


    require("./venobox")();

  // Materialize.scrollFire([{selector: '#gallery-video-0', offset: 0, callback: 'alert("ya")'}]);


    // $('.materialboxed').materialbox();


    // Toggle Containers on page
    // var toggleContainersButton = $('#container-toggle-button');
    // toggleContainersButton.click(()=>{
    //   $('body .browser-window .container, .had-container').each(()=>{
    //     $(this).toggleClass('had-container');
    //     $(this).toggleClass('container');
    //     if ($(this).hasClass('container')) {
    //       toggleContainersButton.text("Turn off Containers");
    //     }
    //     else {
    //       toggleContainersButton.text("Turn on Containers");
    //     }
    //   });
    // });






    // Parallax   
    // $('.parallax').parallax();

  
  });
})(jQuery);