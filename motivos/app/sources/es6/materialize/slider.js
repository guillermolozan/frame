module.exports = ()=>{

   $('.slider').slider({height: 500,full_width:false});

   $('.indicator-item').each(function( index ) {
		$(this).html(index+1);
	});
    
}

