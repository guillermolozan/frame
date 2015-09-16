module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 102)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

