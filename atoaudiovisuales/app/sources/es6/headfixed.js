module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 101)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

