/*
 * 获取影院列表页面脚本
 * 2015-10-24 14:54:21
 */
$(function() {
	$('#input-search').change(function(e) {
		var name = $('#input-search').val();
		$('#input-search').val('');
		window.location.href = "/?name="+name;
	})
	var list = $('.mui-table-view').html();
	list = list.replace(/[\r\n\s\f\t\v\o ]+/gm, "");
	if (list == "") {
		$('.mui-table-view').html("<div style='text-align:center;font-size:16px;'>Opos!暂无相关影片</div>");
	};
})