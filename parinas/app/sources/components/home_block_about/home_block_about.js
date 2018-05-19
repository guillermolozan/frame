module.exports = ()=>{

	if(is_local)
		console.log('home_block_about');

	$(".home_block_about .train a").on("click", (e) => {
	// $(".train a img").on("mouseenter", (e) => {
	  var vall=$(e.target).attr("src")
	  // console.log(vall);
	  $(".img_side .foto img").attr("src",vall);
	  // $(".img_side .foto a").attr("href",vall);
	  
	});

}