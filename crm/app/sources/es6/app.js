(($)=>{$(()=>{


    require("./fix")();


    // require("./materialize/scrollspy")();


    // materialize slider
    // require("./materialize/sidenav")();


    // materialize slider
    // require("./materialize/slider")();


    // require("./materialize/modal")();


    // plugin for google maps
    // require("./map")();



    // menu fixed
    // require("./headfixed")();



    // parallax
    // require("./materialize/parallax")();



    // require("./lightbox")();



    // lightbox for video
    // require("./venobox")();


    // lightbox for photos
    require("./magnific-popup")();


    // remove href when href=#
    $("a[href=#]").removeAttr('href');


    //selectdate 
    $("#select_date").on("change", (e) => {
        var vall=$(e.target).val();
        $(".dates_all").hide();
        $(".dates_"+vall).show();
    });
    



// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../crm/app/sources/components/header/header.js")();
require("../../../../crm/app/sources/components/form_login/form_login.js")();
// Finish Components

});
})(jQuery);
