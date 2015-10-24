<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link href="/static/css/mui.min.css" rel="stylesheet" />

		<style>
			.mui-input-row.mui-search.mui-active:before{
				margin-top: -10px;
			}
			ul {
				font-size: 14px;
				color: #8f8f94;
			}
			.mui-btn {
				padding: 10px;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			@if ($name)
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">搜索结果</h1>
			@else
			<h1 class="mui-title">选择电影</h1>
			@endif
		</header>
		<div class="mui-content">
			@if (!$name)
			<div class="mui-input-row mui-search">
				<input type="search" class="mui-input-clear" placeholder="搜索电影" id="input-search" style="margin-bottom:0px;">
			</div>
			@endif
			<ul class="mui-table-view mui-table-view-chevron" style="margin-top:0px;">
				@foreach ($filmData as $val)
					<li class="mui-table-view-cell mui-media">
						<a class="mui-navigate-right" href="film/{{ $val->id }}">
							<img class="mui-media-object mui-pull-left" src="{{ $val->pic_url }}">
							<div class="mui-media-body">
								<p style="font-weight: 400;color: #000;font-size: 15px;">{{ $val->name }}</p>
								<p style="font-size: 12px;" class="mui-ellipsis">{{ $val->desc }}</p>
							</div>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		</div>
		<script src="/static/js/mui.min.js"></script>
		<script src="static/js/jquery-1.11.3.min.js"></script>
		<script src="static/js/main.js"></script>
	</body>

</html>