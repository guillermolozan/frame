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


    //ciudades 
    $("#ciudades").on("change", (e) => {
        var vall=$(e.target).val();
        $(".bloques").hide();
        $("#bloque_"+vall).show();         
    });

    $('#ciudades').val(1).trigger('change');


    /*
      let map;
      let dmap=$("#map");

      map = new GMaps({
        div: '#map',
        lat: dmap.data("lat"),
        lng: dmap.data("lon")
      });
      map.addMarker({
        lat: dmap.data("lat"),
        lng: dmap.data("lon"),
        title: dmap.data("name"),
        infoWindow: {
          content: dmap.data("text")
        }          
      });
    */    

    // $('.collapsible').collapsible({
    // // accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    // onOpen: (el)=> { alert('Open'); }, // Callback for Collapsible open
    // onClose: (el)=> { alert('Closed'); } // Callback for Collapsible close
    // });
    


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


    if(1)
    {

        $(window).scroll( () => {

            if($(window).scrollTop() > 800){
                $('#cotizar').addClass('localfixed');
                $('#cotizar').width($( "#menu_left" ).width());
            }
            else    
                $('#cotizar').removeClass('localfixed');

        });


        // avoid context menu
        // $(document).bind("contextmenu",  (event) => {
        //     event.preventDefault();
        // });

    }


  });
})(jQuery);