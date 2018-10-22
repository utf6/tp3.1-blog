$(function(){

	$('#sendAnswer').submit(function(){

		if (!login) {
			$('.login').click();
			return false;
		}

		var content = $("textarea[name='content']");

		if (content.val() == '') {
			content.focus();
			return false;
		};
	});
});