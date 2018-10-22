$(function(){
	var li = $(".ask-filter").children('li'); //.find('li')
	var div = $(".title").parents().find('.list list-filter');
	div.hide();

	li.click(function(){
		if (li.index() = div.index() ) {
			alert(11);
		};
	});
});
