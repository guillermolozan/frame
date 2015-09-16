module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 111)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

