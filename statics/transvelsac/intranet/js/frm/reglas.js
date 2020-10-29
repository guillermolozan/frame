// JavaScript Document
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});

$().ready(function() {
	/* $("#commentForm").validate(); */
	
  $("#commentForm").validate({
		rules: {
				nombreAdmin: {
				required: true,
				minlength: 2
				}
				
				
		},
		messages: {
			
				nombreAdmin: {
				required: "Requerido",
				minlength: "Minimo 2 caracteres"
				}
		}
	}); 
	
	
});