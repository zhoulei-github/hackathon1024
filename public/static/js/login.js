/**
 * 登陆页面脚本
 * 2015-10-24 21:54:58
 */

$(function() {
	//注册登陆事件
	$('#login').on('tap',do_login);
})

function do_login (e) {
	window.location.href = "./index";
}