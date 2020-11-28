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

    // tengo que describir este fenomeno
    $(".collapsible-header.active").addClass('active-fixed');
    



// Begin Components
require("../../../../work/app/sources/components/common/common.js")();
require("../../../../work/app/sources/components/menu_left/menu_left.js")();
require("../../../../work/app/sources/components/block_gallery/block_gallery.js")();
require("../../../../inca/app/sources/components/header/header.js")();
require("../../../../inca/app/sources/components/block_banner/block_banner.js")();
require("../../../../inca/app/sources/components/home_block_libros/home_block_libros.js")();
require("../../../../inca/app/sources/components/home_block_ventas/home_block_ventas.js")();
require("../../../../inca/app/sources/components/gallery_products/gallery_products.js")();
require("../../../../onelimites/app/sources/components/product_detail/product_detail.js")();
require("../../../../inca/app/sources/components/form_contact/form_contact.js")();
require("../../../../onelimites/app/sources/components/products_reel/products_reel.js")();
require("../../../../asiste/app/sources/components/home_block_links/home_block_links.js")();
require("../../../../inca/app/sources/components/block_habitacion/block_habitacion.js")();
require("../../../../inca/app/sources/components/home_block_importaciones/home_block_importaciones.js")();
// Finish Components

});
})(jQuery);
