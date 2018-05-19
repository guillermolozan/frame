// $=require('./jquery-2.1.4.min.js');
(($)=>{$(()=>{

    // $('.scrollspy').scrollSpy();

    // require('./materialize.min.js');

    // require('./loadcss.js');



    // require("./fix")();


    // require("./materialize/scrollspy")();


    // materialize slider
    // require("./materialize/sidenav")();

    // materialize slider
    // require("./materialize/slider")();

    //
    // require("./slippry")();

    // select
    // require("./materialize/select")();

    // require("./materialize/modal")();


    // plugin for google maps
    // require("./map")();



    // menu fixed
    // require("./headfixed")();



    // parallax
    // require("./materialize/parallax")();



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


    // Materialize.updateTextFields();

if($('#cotizar').length > 0)
{

    var cotpos,maipos;
    cotpos = $('#cotizar').position();
    maipos = $('main').position();

    $('#cotizar').after("<div id='cotizar_after' style='display:none;width:100%;height:"+$('#cotizar').height()+"px;'></div>");

    var fff = cotpos.top - 80 ;
    var ttt = $('main').height() ;
    // console.log(ttt);

    $(window).scroll( () => {

        if( $(window).scrollTop() > fff 
            // && $(window).scrollTop() < ttt 
            ){

            $('#cotizar_after').show();
            $('#cotizar').addClass('localfixed');
            $('#cotizar').width($( "#menu_left" ).width());
            
            //console.log($(window).scrollTop());

        }
        else {

            $('#cotizar_after').hide();
            $('#cotizar').removeClass('localfixed');

        }

    });


    // avoid context menu
    $(document).bind("contextmenu",  (event) => {
        // event.preventDefault();
    });


}




  

// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../work/app/sources/components/block_banner/block_banner.js")();
require("../../../../consorcio/app/sources/components/header/header.js")();
require("../../../../agro/app/sources/components/form_contact/form_contact.js")();
// Finish Components

});
})(jQuery);
