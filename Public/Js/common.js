$(function(){
	$('#box').click(function(){
		var inputs = $(this).parents('table').find('input');
		$(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
	});
});


selectRowIndex = 0;
function getSelectCheckboxValues(){
	var obj = document.getElementsByName('key');
	var result ='';
	var j= 0;
	for (var i=0;i<obj.length;i++){
		if (obj[i].checked==true){
				selectRowIndex[j] = i+1;
				result += obj[i].value+",";
				j++;
		}
	}
	return result.substring(0, result.length-1);
}

//批量删除操作
function del(id){
	var keyValue;
	
	if (id)	{
		keyValue = id;
	}else {
		keyValue = getSelectCheckboxValues();
	}
	
	if (!keyValue){
		alert('请选择删除项！');
		return false;
	}

	if (window.confirm('确实要删除选择项吗？')){
		location.href =  URL+"/delete/id/"+keyValue;			
	}
}

