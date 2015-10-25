<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="/static/css/mui.min.css" rel="stylesheet"/>
    <link href="/static/css/myOrder.css" rel="stylesheet"/>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-icon mui-icon-left-nav mui-pull-left" style="font-size: 14px; font-weight:normal; padding-top: 15px;" href="/">首页</a>
		<h1 class="mui-title">我的订单</h1>
	</header>
	<div class="mui-content">
		<div class="mui-table-view">
			@foreach ($list as $v)
				<div class="mui-table-view-cell">
					<div class="order-img"><img src="{{{ $v['film']['pic_url'] }}}"></div>
					<div class="order-txt">
						<p class="film-name">{{{ $v['film']['name'] }}}</p>
						<p class="order-addr">{{{ $v['cinema']['name'] }}}</p>
						<span class="film-detail">3排6座</span>
						<p class="order-date">取票号：{{{ substr(md5(uniqid()),0,10) }}} 【密码：{{{ rand(10000, 100000) }}}】</p>
						<p class="order-date">上映时间：{{{ $v['vote']['show_time'] }}}</p>
					</div>
					<span class="mui-icon mui-icon-arrowright">

					</span>
				</div>
			@endforeach
		</div>
	</div>
</body>
</html>