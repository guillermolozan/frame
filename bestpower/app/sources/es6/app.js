// $=require('./jquery-2.1.4.min.js');
(($)=>{$(()=>{

    $('.scrollspy').scrollSpy();

    // require('./materialize.min.js');

    // require('./loadcss.js');



    // require("./fix")();


    // require("./materialize/scrollspy")();


    // materialize slider
    // require("./materialize/sidenav")();

    // materialize slider
    // require("./materialize/slider")();

    //
    require("./slippry")();

    // select
    // require("./materialize/select")();

    // require("./materialize/modal")();


    // plugin for google maps
    require("./map")();



    // menu fixed
    // require("./headfixed")();



    // parallax
    require("./materialize/parallax")();



    // require("./lightbox")();


    require("./more")();


    // lightbox for video
    require("./venobox")();


    // lightbox for photos
    require("./magnific-popup")();


    //remove href when href=#
    $("a[href=#]").removeAttr('href');


    //selectdate 
    $("#select_date").on("change", (e) => {
        var vall=$(e.target).val();
        $(".dates_all").hide();
        $(".dates_"+vall).show();
    });
    
    //slick
    require("./slick")();

    //top not work
    // $("#scrolltop").on("click", (e)=> {
    //     $('body').animate({scrollTop:0}, '500')
    // });

    // function hey(){
    //     console.log('yopi');
    // }

    //depas
    /*
    $(".nvl li").each(function(){
        $(this).on("click", function() {
            // console.log(clss);
            var clss = $(this).data('sete');
            $('.depas li').removeClass('active');
            $('.depas li.'+clss).addClass('active');  
            return false;   
        });
    });
    */


    /*
    $(window).scroll( () => {

        if($(window).scrollTop() > 800){
            $('#cotizar').addClass('localfixed');
            $('#cotizar').width($( "#menu_left" ).width());
        }
        else    
            $('#cotizar').removeClass('localfixed');

    });
    */


  

// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../work/app/sources/components/block_banner/block_banner.js")();
require("../../../../bestpower/app/sources/components/header/header.js")();
// Finish Components

});
})(jQuery);
