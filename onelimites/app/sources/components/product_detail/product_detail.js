module.exports = () => {
	if (is_local) console.log('product_detail');

	$('.product_detail .train a').on('click', (e) => {
		// $(".train a img").on("mouseenter", (e) => {
		var vall = $(e.target).attr('src');
		// console.log(vall);
		$('.fotos .foto img').attr('src', vall);
		$('.fotos .foto a').attr('href', vall);
	});
};
