module.exports = ()=>{

    // loadCss('lightbox.css');
  if($('.more').length>0){

    requirejs(['readmore.min'],()=>{

    // console.log('lightbox');
    // // $('.venobox').venobox(); 
        $('.more').readmore({
          speed: 75,
          lessLink: '<a href="#">VER MENOS</a>',
          moreLink: '<a href="#">VER...</a>'
        });

    });

  }

}