(($)=>{$(()=>{


    $('.scrollspy').scrollSpy();


    require("./fix")();


    // require("./materialize/sidenav")();


    // require("./materialize/slider")();


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


  
  

// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../work/app/sources/components/block_banner/block_banner.js")();
require("../../../../rinconcito/app/sources/components/header/header.js")();
// Finish Components

});
})(jQuery);
