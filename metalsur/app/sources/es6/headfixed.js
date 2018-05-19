module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 95)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

