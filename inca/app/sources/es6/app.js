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
// Finish Components

});
})(jQuery);
