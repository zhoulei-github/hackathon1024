<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>下单</title>
    <script src="/static/js/mui.min.js"></script>
    <link href="/static/css/mui.min.css" rel="stylesheet"/>
    <link href="/static/css/seat.css" rel="stylesheet"/>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">下单</h1>
	</header>
		<div class="mui-content">
			<div class="film-top">
				<div class="film-txt">
					<p class="flim-name">{{{ $voteinfo['film']['name'] }}}</p>
					<p class="flim-addr">上映影院：{{{ $voteinfo['cinema']['name'] }}}</p>
					<p class="film-date">上映时间：{{{ $voteinfo['show_time'] }}}</p>
					<p class="film-date">票价/人：{{{ $voteinfo['price'] }}}￥</p>
					<p class="film-date">上映条件：满{{{ $voteinfo['min_people'] }}}人上映</p>
					<p class="film-date">影院地址：{{{ $voteinfo['cinema']['address'] }}}</p>
				</div>
			</div>
			<div class="stage" style="margin:20px auto 10px;">银幕</div>
			<div class="seats" id="seats">
			</div>
		</div>
		<p style="margin:-20px 0 10px 10px;">金额：<span id="price" style="font-size: 16px;color:orange;">---</span></p>
		<div style="text-align: center;">
			<button type="button" class="mui-btn mui-btn-primary" style="width:150px;" id="sub-account">提 交 订 单</button>
		</div>
	<script>
		var voteid = {{{ $voteinfo['id'] }}};
		var price = {{{ $voteinfo['price'] }}};
		var totalprice = 0;
		var vote_count = 0;
	</script>
	<script src="/static/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="https://one.pingxx.com/lib/pingpp_one.js"></script>
	<script type="text/javascript" src="/static/js/seat.js" ></script>
</body>
</html>