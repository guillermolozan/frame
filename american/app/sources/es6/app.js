// $=require('./jquery-2.1.4.min.js');

(($)=>{$(()=>{

    $('.scrollspy').scrollSpy();

    // require('./materialize.min.js');

    // require('./loadcss.js');



    // require("./fix")();


    // require("./materialize/scrollspy")();


    // materialize slider
    require("./materialize/sidenav")();


    // materialize slider
    // require("./materialize/slider")();

    require("./slippry")();

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

  

// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../american/app/sources/components/product_detail/product_detail.js")();
// Finish Components

});
})(jQuery);
