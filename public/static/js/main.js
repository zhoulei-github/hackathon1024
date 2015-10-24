/*
 * 获取影院列表页面脚本
 * 2015-10-24 14:54:21
 */
mui.init({
	subpages:[{
	  url:'filmlist.html',//下拉刷新内容页面地址
	  id:'filmlist',//内容页面标志
	  styles:{
	    top:'80px',
	    bottom:'0px'
	  }
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
		var searchPage = $.preload({
			"id": 'searchFilm',
			"url": 'searchFilm.html'
		});
		//设置
		var settingButton = doc.getElementById('setting');
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
		mui("#input-search").on('submit','',function(){
			var name = mui("#input-search").val();
			console.log("123");
			//打开关于页面
//			 mui.openWindow({
//				id: 'searchFilm',
//				show: {
//					aniShow: 'pop-in'
//				},
//				styles: {
//					popGesture: 'hide'
//				},
//				waiting: {
//					autoShow: false
//				}
//				extras:{name:name},
//			    createNew:false,
//			});
		})
		//获取地理位置
		plus.geolocation.getCurrentPosition( geoInf, function ( e ) {
			mui.toast('地理位置获取失败，请检查是否开启定位');
		} );
		//
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

function geoInf( position ) {
	var codns = position.coords;
	var lat = codns.latitude;//获取到当前位置的纬度；
	var longt = codns.longitude;//获取到当前位置的经度
	//写入地理位置到本地存储
	plus.storage.setItem( "lat", lat);
	plus.storage.setItem( "longt", longt);
	console.log("lat:"+lat+" longt:"+longt);
}