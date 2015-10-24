$(function(){
	progressBar(80);
	mui.getJSON('http://10.0.20.41:8080/api/film/get?id=1',
		{page:page, page_size:page_size}
		,function(data){
			console.log(data);
			var film = data.data;
			mui('.film-title').innerHTML = film.name;
		}
	);
})

//进度条
function progressBar(lWidth){
	$('#line-bar').width(lWidth);
	$('#line-bar').html(lWidth + '%');
}
