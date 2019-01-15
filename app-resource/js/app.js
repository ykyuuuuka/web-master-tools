//分析項目で「すべて」が選択された時の処理
function checkbox_seo_select_all() {
	//「すべて」のチェック状態を取得
	var prop = $('#checkbox-seo-primary input').prop('checked');

	if(prop == true) {
		//「すべて」のチェックがtrueなら全てのチェックをtrue
		$('.checkbox-seo input').prop('checked', true);
	} else {
		//「すべて」のチェックがfalseなら全てのチェックをfalse
		$('.checkbox-seo input').prop('checked', false);
	}
}

//分析項目で「すべて」以外が選択された時の処理
function checkbox_seo_disSelect_all() {
	//「すべて」のチェック状態を取得
	var prop = $('#checkbox-seo-primary input').prop('checked');
	//「すべて」以外のフォームの個数を取得
	var count_form = $('#checkbox-seo-secondary input').length;
	//「すべて」以外のチェック状態のフォームの個数を取得
	var count_form_disSelect = $('#checkbox-seo-secondary :checked').length;

	if(prop == true) {
		//「すべて」のチェックがtrueなら全てのチェックをfalse
		$('#checkbox-seo-primary input').prop('checked', false);
	}
	if(count_form_disSelect == count_form) {
		//すべて以外のチェックが全てtrueならば「すべて」もtrue
		$('#checkbox-seo-primary input').prop('checked', true);
	}
}

//domの読み込みが終わった時点でformのinitializeを実行
$(window)
	.on('load',function(){
		checkbox_seo_select_all();
	}
);

//「すべて」が選択された時の処理
$('#checkbox-seo-primary input').on('change', function() {
	checkbox_seo_select_all();
});

//「すべて」以外が選択された時の処理
$('#checkbox-seo-secondary input').on('change', function() {
	checkbox_seo_disSelect_all();
});

