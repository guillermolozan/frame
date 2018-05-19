// $=require('./jquery-2.1.4.min.js');

(($)=>{$(()=>{

    // require('./materialize.min.js');

    // require('./loadcss.js');



    // require("./fix")();


    // require("./materialize/scrollspy")();


    require("./materialize/sidenav")();


    // materialize slider    
    require("./slippry")();


    // require("./materialize/slider")();


    // require("./materialize/modal")();


    // plugin for google maps
    require("./map")();



    // menu fixed
    // require("./headfixed")();



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

    //date
    $('.datepicker').pickadate({

        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],        
        weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        firstDay: 1,
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',

        selectMonths: true, // Creates a dropdown to control month
        selectYears: 1, // Creates a dropdown of 15 years to control year
        format: 'dd/mm/yyyy'
    });    
    
    //slick
    require("./slick")();
    
  });
})(jQuery);