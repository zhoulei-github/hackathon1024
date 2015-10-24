<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title></title>
    <link href="/static/css/mui.min.css" rel="stylesheet"/>
    <link href="/static/css/movieDetail.css" rel="stylesheet"/>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>

    <h1 class="mui-title">电影详情</h1>
</header>
<div class="mui-content">
    <div class="g-center">
        <div class="movie-img">
            <img id="film-img" src="{{{ $film['pic_url'] }}}"/>
        </div>
        <div class="movie-detail">
            <p class="film-title" id="film-title">{{{ $film['name'] }}}</p>

            <p class="mark" id="film-score">{{{ $film['score'] }}}分</p>

            <p class="author" id="film-director">导演：{{{ $film['director'] }}}</p>

            <p class="actors" id="film-actor">主演：{{{ $film['actor'] }}}</p>

            <p class="category" id="film-type">类别：{{{ $film['type'] }}}</p>

            <p class="addr" id="film-country">地区/国家：{{{ $film['country'] }}}</p>
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
    <ul class="mui-table-view film-list" id="film-list">
        @foreach ($list as $v)
            <li class="mui-table-view-cell mui-media">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left"
                         src="{{{ isset($v['cinema']['pic']) ? $v['cinema']['pic'] : '/static/images/xsk.jpeg'}}}">

                    <div class="mui-media-body">
                        {{{ isset($v['cinema']['name']) ? $v['cinema']['name'] : '获取失败'}}}
                        <p style="color: grey;font-size: 12px;">上映时间:{{{ $v['show_time'] }}}</p>
                        <p class='mui-ellipsis' style="font-size: 13px"><span class="mui-icon mui-icon-location"></span>距离{{{ $v['cinema']['distance'] }}}m</p>

                        <div class="progress-bar">
                            <span class="line-bar" id="line-bar" style="width:{{{ $v['current_people']/$v['max_people']*100 }}}px;">
                                {{{ $v['current_people'] }}} / {{{ $v['max_people'] }}}
                            </span>
                        </div>
                    </div>
                    <a class="mui-btn" href="/select?"><span class="like-btn"><img src="/static/images/like.png"></span>想看</a>
                </a>
            </li>
        @endforeach

    </ul>
</div>
<script>

</script>
<script src="/static/js/mui.min.js"></script>
<script src="/static/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/static/js/movieDetail.js"></script>
</body>
</html>