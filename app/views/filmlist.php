<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>影片列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="css/mui.min.css">
		<style>
			html,
			body {
				background-color: #efeff4;
			}
		</style>
	</head>

	<body>
		<!--下拉刷新容器-->
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<ul class="mui-table-view mui-table-view-chevron"></ul>
			</div>
		</div>
		<script src="js/mui.min.js"></script>
		<script>
			var page = 1;
			var page_size = 10;
			mui.init({
				pullRefresh: {
					container: '#pullrefresh',
					up: {
      					contentnomore:'没有更多数据了',//可选，请求完毕若没有更多数据时显示的提醒内容；
						contentrefresh: '奋力加载中...',
						callback: pullupRefresh
					}
				}
			});
			/**
			 * 上拉加载具体业务实现
			 */
			function pullupRefresh() {
				//加载电影列表
				mui.getJSON('http://10.0.20.41:8080/api/film/pagelist',
					{page:page, page_size:page_size}
					,function(data){
						var fileData = data.data.list;
						mui('#pullrefresh').pullRefresh().endPullupToRefresh((++page > parseInt(data.data.count/page_size)));
						var table = document.body.querySelector('.mui-table-view');
						var cells = document.body.querySelectorAll('.mui-table-view-cell');
						for (var i = 0, len = fileData.length; i < len; i++) {
							var li = document.createElement('li');
							li.className = 'mui-table-view-cell mui-media';
							li.innerHTML = '<a class="mui-navigate-right"><img class="mui-media-object mui-pull-left" src="'+fileData[i]['pic_url']+'"><div class="mui-media-body">'+fileData[i]['name']+'<p class="mui-ellipsis">'+fileData[i]['desc']+'</p></div></a>';
							table.appendChild(li);
						}
					}
				);
			}
			if (mui.os.plus) {
				mui.plusReady(function() {
					setTimeout(function() {
						mui('#pullrefresh').pullRefresh().pullupLoading();
					}, 1000);

				});
			} else {
				mui.ready(function() {
					mui('#pullrefresh').pullRefresh().pullupLoading();
				});
			}
		</script>
	</body>
</html>