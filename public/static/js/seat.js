$(function(){
	seatSet();
	$('#seats').on('touchend','span',seatClick);
})

//生成座位
function seatSet(){
	var seatHTML = '';
	seatHTML += '<ul class="seat-ul">';
	for(var i=0;i<6;i++){
		seatHTML += '<li>';
		seatHTML += '<p>'+ (i+1) +'</p>';
		seatHTML += '<div class="seat-box">';
		for(var j=0;j<10;j++){
				seatHTML += '<span class="empty"></span>';
		}
		
		seatHTML += '</div>';
		seatHTML += '</li>';
	}
	seatHTML += '</ul>';
	
	$('#seats').html(seatHTML);
}

//座位点击事件
function seatClick(){
	if($(this).hasClass('empty')){
		$(this).removeClass('empty').addClass('on');
	}else{
		$(this).removeClass('on').addClass('empty');
	}
}
