module.exports = ()=>{
	if(is_local)
		console.log('prodiserv / header');


	let header_height    =$('header').height();
	let menu_top_height  =$('header > nav').height();
	let headfixed_height =header_height - menu_top_height;
	
	// console.log(header_height);
	// console.log(menu_top_height);
	// console.log(headfixed_height);

	if(!is_debug)
	$(window).scroll( () => {
		if($(window).scrollTop() > headfixed_height){
			$('body').addClass('headfixed');
			$('body').css('padding-top',header_height);
		} else {
			$('body').removeClass('headfixed');
			$('body').css('padding-top',0);
		}
	});

}
	