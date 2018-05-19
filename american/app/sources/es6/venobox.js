module.exports = ()=>{

  if($('.venobox').length>0){

    requirejs(['venobox.min'],()=>{

      loadCss('venobox.css');

      $('.venobox').venobox(); 

      console.log('venobox');

    });

  }

}

