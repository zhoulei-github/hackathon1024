$(function () {
    seatSet();
    $('#seats').on('touchend', 'span', seatClick);
    //模拟支付
    $('#sub-account').on('touchend', function () {
        if(totalprice<1) {
            alert('请选择座位');
            return false;
        }
        pingpp_one.init({
            app_id: 'app_0WnDiPXjj1aHSGGO',
            order_no: 'TEST' + Math.round(new Date().getTime() / 1000),
            amount: 10,
            // 壹收款页面上需要展示的渠道，数组，数组顺序即页面展示出的渠道的顺序
            // upmp_wap 渠道在微信内部无法使用，若用户未安装银联手机支付控件，则无法调起支付
            channel: ['alipay_wap', 'wx_pub', 'upacp_wap', 'yeepay_wap', 'jdpay_wap', 'bfb_wap'],
            charge_url: '/api/user/vote',
            charge_param: {
                vote_id : voteid,
                vote_count : vote_count
            },                      //(可选，用户自定义参数，若存在自定义参数则壹收款会通过 POST 方法透传给 charge_url)
            open_id: 'Openid'                       //(可选，使用微信公众号支付时必须传入)
        }, function (res) {
                alert('支付成功');
                window.location.href = "/orders";
        });
    });
})

//生成座位
function seatSet() {
    var seatHTML = '';
    seatHTML += '<ul class="seat-ul">';
    for (var i = 0; i < 6; i++) {
        seatHTML += '<li>';
        seatHTML += '<p>' + (i + 1) + '</p>';
        seatHTML += '<div class="seat-box">';
        for (var j = 0; j < 10; j++) {
            seatHTML += '<span class="empty"></span>';
        }

        seatHTML += '</div>';
        seatHTML += '</li>';
    }
    seatHTML += '</ul>';

    $('#seats').html(seatHTML);
}

//座位点击事件
function seatClick() {
    if ($(this).hasClass('empty')) {
        $(this).removeClass('empty').addClass('on');
        totalprice += price;
        vote_count ++;
        $("#price").html(totalprice + '￥');
    } else {
        $(this).removeClass('on').addClass('empty');
        totalprice -= price;
        vote_count --;
        $("#price").html(totalprice + '￥');
    }
}
