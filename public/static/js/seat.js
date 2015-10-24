$(function(){
	seatSet();
	$('#seats').on('touchend','span',{flag:1},seatClick);
})

//生成座位
function seatSet(){
	var seatHTML = '';
	seatHTML += '<ul class="seat-ul">';
	for(var i=0;i<10;i++){
		seatHTML += '<li>';
		seatHTML += '<p>'+ (i+1) +'</p>';
		seatHTML += '<div class="seat-box">';
		for(var j=0;j<(i+5);j++){
			if(j<10){
				seatHTML += '<span class="empty"></span>';
			}
		}
		
		seatHTML += '</div>';
		seatHTML += '</li>';
	}
	seatHTML += '</ul>';
	
	$('#seats').html(seatHTML);
}

//座位点击事件
function seatClick(e){
	console.log(e.data)
	if(e.data.flag==1){
		$(this).removeClass('empty').addClass('on');
	}else{
		
	}
}
