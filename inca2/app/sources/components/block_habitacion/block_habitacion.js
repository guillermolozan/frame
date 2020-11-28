module.exports = ()=>{

	if(is_local)
		console.log('block_habitaciones');


  let domm='.p-detail .block_habitaciones .block_habitacion';


	$(domm).each(function (index, value) { 

		let contexto=$(this);

		contexto.find(".train a").on("click", (e) => {
		
			var vall=$(e.target).attr("src")
			contexto.find(".foto img").attr("src",vall);
			contexto.find(".foto a").attr("href",vall);

		});

	});



  if($(domm).length>0){

		if($(domm+' .foto a').length>0){

			requirejs(['magnific-popup.min'],()=>{

			loadCss('magnific-popup.css');

			$(domm+' .foto').magnificPopup({
				delegate: 'a',
				gallery: {
				enabled: true
				},	  
				type: 'image'
			});

			console.log('magnific');

			});

		}

	

   }


}