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

// クッキー保存設定
window.onload = function() {
	// クッキーを保存
	$("#name").val($.cookie("name"));
};

// submitを押したら、クッキーを保存
window.onload = function() {
	$("#submit").click(function() {
		$.cookie("name", $("#name").attr("value"), {expires: 30 });
	});
};