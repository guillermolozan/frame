module.exports = () => {
	// open modal
	if ($('.modal').length > 0) {
		//
		$('.modal').modal({
			dismissible: true, // Modal can be dismissed by clicking outside of the modal
			opacity: 0.5, // Opacity of modal background
			inDuration: 300, // Transition in duration
			outDuration: 200, // Transition out duration
			startingTop: '4%', // Starting top style attribute
			endingTop: '10%', // Ending top style attribute
			ready: function(modal, trigger) {
				// Callback for Modal open. Modal and trigger parameters available.
				// alert('Ready');
				console.log(modal, trigger);
			},
			complete: function() {
				// alert('Closed');
			} // Callback for Modal close
		});

		$('#popup').modal('open');
		// $('#popup').openModal();
	}
};
