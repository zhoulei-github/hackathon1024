<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/movieDetail.css" rel="stylesheet"/>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">电影详情</h1>
	</header>
	<div class="mui-content">
		<div class="g-center">
			<div class="movie-img">
				<img src="images/xsk.jpeg" />
			</div>
			<div class="movie-detail">
				<p class="film-title">肖申克的救赎</p>
				<p class="mark">8.0分</p>
				<p class="author">导演：某某某</p>
				<p class="actors">主演：某某某、某某某、某某某</p>
				<p class="category">类别：动作</p>
				<p class="addr">地区/国家：中国大陆</p>
			</div>
		</div>
		<div class="g-border">
		</div>
		<ul class="mui-table-view ul-nav">
			<li class="mui-table-view-cell mui-collapse">
				<a class="mui-navigate-right" href="#">地区选择</a>
				<div class="mui-collapse-content">
					<div class="table-list">杭州市区</div>
				</div>
			</li>
			<li class="mui-table-view-cell mui-collapse">
				<a class="mui-navigate-right" href="#">默认排序</a>
				<div class="mui-collapse-content table-list-middle">
					<div class="table-list">按时间排序</div>
					<div class="table-list">按评分排序</div>
				</div>
			</li>
			<li class="mui-table-view-cell mui-collapse">
				<a class="mui-navigate-right" href="#">筛选</a>
				<div class="mui-collapse-content table-list-right">
					<div class="table-list">按类别筛选</div>
					<div class="table-list">按演员筛选</div>
				</div>
			</li>
		</ul>
		<ul class="mui-table-view film-list">
			<li class="mui-table-view-cell mui-media">
				<a href="javascript:;">
					<img class="mui-media-object mui-pull-left" src="images/xsk.jpeg">
					<div class="mui-media-body">
						某某电影院
						<p class='mui-ellipsis'><span class="mui-icon mui-icon-location"></span>距离300m</p>
						<div class="progress-bar">
							<span class="line-bar" id="line-bar"></span>
						</div>
					</div>
					<a class="mui-btn"><span class="like-btn"><img src="images/like.png"></span>想看</a>
				</a>
			</li>
		</ul>
	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/movieDetail.js" ></script>
</body>
</html>