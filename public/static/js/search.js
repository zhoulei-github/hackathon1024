/*
 * 获取影院列表页面脚本
 * 2015-10-24 14:54:21
 */
mui.init({
	subpages:[{
	  url:'searchFilmList.html',//下拉刷新内容页面地址
	  id:'searchFilmList',//内容页面标志
	  styles:{
	    top:'45px',
	    bottom:'0px'
	  },
	  extras:{name:name}
	}]
});
(function($, doc) {
	$.init();
	var settings = app.getSettings();
	//var account = doc.getElementById('account');
	//
	window.addEventListener('show', function() {
		var state = app.getState();
		//account.innerText = state.account;
	}, false);
	$.plusReady(function() {
		var settingPage = $.preload({
			"id": 'setting',
			"url": 'setting.html'
		});
		//设置
		var settingButton = doc.getElementById('setting');
		//settingButton.style.display = settings.autoLogin ? 'block' : 'none';
		settingButton.addEventListener('tap', function(event) {
			$.openWindow({
				id: 'setting',
				show: {
					aniShow: 'pop-in'
				},
				styles: {
					popGesture: 'hide'
				},
				waiting: {
					autoShow: false
				}
			});
		});
		$.oldBack = mui.back;
		var backButtonPress = 0;
		$.back = function(event) {
			backButtonPress++;
			if (backButtonPress > 1) {
				plus.runtime.quit();
			} else {
				plus.nativeUI.toast('再按一次退出应用');
			}
			setTimeout(function() {
				backButtonPress = 0;
			}, 1000);
			return false;
		};
	});
}(mui, document));