$(function() {
	var win = $(window);
		
		
    $("#tabs").tabs();
	$(document).tooltip();
	$('#email').keyup(function() {
		$('span.error-keyup-1').hide();
		var inputVal = $(this).val();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(!emailReg.test(inputVal)) {
			$(this).before('<span class="error error-keyup-1">Enter a valid email</span>');
		}
	});
	
		$("#deleteForm").click(function() {
 		 alert("Are you sure you want to delete");
		});
			
			
 });