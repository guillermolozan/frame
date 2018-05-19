// $=require('./jquery-2.1.4.min.js');

(($)=>{$(()=>{

    // require('./materialize.min.js');

    // require('./loadcss.js');



    // require("./fix")();


    // require("./materialize/scrollspy")();


    // materialize slider
    require("./materialize/sidenav")();


    // materialize slider
    require("./materialize/slider")();


    // require("./materialize/modal")();


    // plugin for google maps
    // require("./map")();



    // menu fixed
    require("./headfixed")();



    // parallax
    require("./materialize/parallax")();



    // require("./lightbox")();



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
    
  });
})(jQuery);