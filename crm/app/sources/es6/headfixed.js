module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 120)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

