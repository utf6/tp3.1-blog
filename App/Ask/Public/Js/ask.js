$(function(){
	var cateId = 0; //问题分类id
	var cateName = '';

	$("select[name='cate-one']").change(function(){
		var obj = $(this);

		if (obj.index() < 3) {
			var id = obj.val();

			//清除之前栏目
			obj.next().html('');
			obj.next().next().html('');

			$.post(getCateUrl, {id:id}, function(data){
				if (data) {
					var option = '';

					$.each(data, function(i, k){
						option += '<option value='+ k.id +'>'+ k.name +'</option>';
					});
					obj.next().html(option).show();
				};
			}, 'json');			
		};
		cateId = obj.val();
		$.post(getCheckCateNameUrl, {pid:cateId}, function(str){
			cateName = str;
		}, 'html');
	});

	//点击确定按钮事件
	$("#ok").click(function(){
		if (!cateId) {
			alert('请选择分类');
			return;
		};
		$("#sel-cate").html(cateName);
		$("input[name='cid']").val(cateId);
		$('.close-window').click();
	});

	//设置金币可以选择的范围
	var opt = $("select[name='reward'] option");

	for (var i = 0; i < opt.length; i++) {
		if (opt.eq(i).val() > point) {
			opt.eq(i).attr('disabled', 'disabled');
		};
	}

	$("select[name='reward']").change(function(){
		if (!login) {
			$(".login").click();
		};
	});

	$("#send").submit(function(){
		if (!cateId) {
			alert('忘记选择分类了');
			return false;
		};

		if (!login) {
			$('.login').click();
			return false;
		};

		var content = $("textarea[name='content']");
		if (content.val() == '') {
			content.focus();
			return false;
		}
		return true;
	});
})