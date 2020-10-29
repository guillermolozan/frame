module.exports = ()=>{
  
    if(is_local)
		  console.log('aquasan / fotter_special');

    requirejs(['lity.min'],()=>{

      loadCss('lity.min.css');

    });

}

