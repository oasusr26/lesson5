/*global $*/
window.onload = function(){
	$('body').fadeMover({
		'effectType': 1,
		'inSpeed': 1500,
		'outSpeed': 1500,
		'inDelay' : '0',
		'outDelay' : '0',
		'nofadeOut' : 'nonmover'
	});
};

// パスワード一致確認
window.onload = function() {
	$(".error_check").submit(function() {
		var password1 = $(".password1").val();
		var password2 = $(".password2").val();
		
		
		if (password1 !== password2) {
			$(".error").html("<p>パスワードが一致していません。</p>");
			$(".clear").click(function() {
				$(".error").toggle();
			});
			return false;
		}
	});
};

// // クッキー保存設定
// window.onload = function() {
// 	// クッキーを保存
// 	$("#name").val($.cookie("name"));
// };

// // submitを押したら、クッキーを保存
// window.onload = function() {
// 	$("#submit").click(function() {
// 		$.cookie("name", $("#name").attr("value"), {expires: 30 });
// 	});
// };


// ヘッダー画像 
$(function(){
    var $setElm = $('.viewer'),
    fadeSpeed = 1500,
    switchDelay = 5000;
 
    $setElm.each(function(){
        var targetObj = $(this);
        var findUl = targetObj.find('ul');
        var findLi = targetObj.find('li');
        var findLiFirst = targetObj.find('li:first');
 
        findLi.css({display:'block',opacity:'0',zIndex:'99'});
        findLiFirst.css({zIndex:'100'}).stop().animate({opacity:'1'},fadeSpeed);
 
        setInterval(function(){
            findUl.find('li:first-child').animate({opacity:'0'},fadeSpeed).next('li').css({zIndex:'100'}).animate({opacity:'1'},fadeSpeed).end().appendTo(findUl).css({zIndex:'99'});
        },switchDelay);
    });
});

// メインエリア　水の波紋エフェクト
window.onload = function() {
	$('body').ripples({
	    resolution: 512,
	    dropRadius: 20,
	    perturbance: 0.04
	});
};

// footerスライダー画像
window.onload = function(){
	$("#photo").endlessRiver({
		speed: 40,
		buttons: false,
		pause: true
	});
};
