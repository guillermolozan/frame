module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 100)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

