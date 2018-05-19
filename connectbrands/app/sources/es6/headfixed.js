module.exports = ()=>{

    $(window).scroll( () => {
        if($(window).scrollTop() > 151)
            $('body').addClass('headfixed');
        else    
            $('body').removeClass('headfixed');

    });

}

