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
    // require("./magnific-popup")();


    //remove href when href=#
    $("a[href=#]").removeAttr('href');


    // //selectdate 
    // $("#select_date").on("change", (e) => {
    //     var vall=$(e.target).val();
    //     $(".dates_all").hide();
    //     $(".dates_"+vall).show();
    // });
    


// @author Rich Adams <rich@richadams.me>

// Implements a triple-click event. Click (or touch) three times within 1s on the element to trigger.







// Usage
// $(function() 
// {
//     $("#one").bind("tripleclick", function() { $("#debug").append("\nروی عنصر 1 ، سه بار کلیک شد"); });
//     $("#two").on("tripleclick", function()   { $("#debug").append("\nروی عنصر 2 ، سه بار کلیک شد"); });
//     $("#three").on("tripleclick",{ threshold: 5000 }, function()   { $("#debug").append("\nروی عنصر 3 ، سه بار کلیک شد"); });
// });


// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../parinas/app/sources/components/block_banner/block_banner.js")();
require("../../../../parinas/app/sources/components/header/header.js")();
require("../../../../parinas/app/sources/components/home_form_reserva/home_form_reserva.js")();
require("../../../../parinas/app/sources/components/home_block_about/home_block_about.js")();
require("../../../../asiste/app/sources/components/home_block_links/home_block_links.js")();
require("../../../../parinas/app/sources/components/block_habitacion/block_habitacion.js")();
require("../../../../parinas/app/sources/components/gallery_products/gallery_products.js")();
require("../../../../parinas/app/sources/components/form_contact/form_contact.js")();
// Finish Components

});
})(jQuery);