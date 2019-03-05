<h1 class="h3">ファイルリスト生成</h1>

<div class="card mt-5 fade-1">
	<div class="row">
		<div class="col-sm-4" style="text-align:center;">
			<img src="/app-resource/images/loading.gif" class="mw-100 rounded-left p-0 m-0" style="width:70%;">
		</div>
		<div class="col-sm-8 pl-0">
			<div class="card-body pt-2 pr-2 pb-2 pl-0">
				<dl class="row">
					<dt class="col-sm-3">リクエストURL</dt>
					<dd class="col-sm-9 mb-1 p-0"><?php echo $_POST['form-domain'] . $_POST['form-directory'] . $_POST['form-file']; ?></dd>
				</dl>
				<p class="m-0">URLのインデックス数をGoogleに問い合わせています。インデックス数が500件を超えていた場合、処理負荷の観点からファイルリスト生成のリクエストを拒否することがあります。</p>
			</div>
		</div>
	</div>
</div>


<?php

	//画面描画の実施
	@ob_flush();
	@flush();

	//postされた値の受け取り
	$scrape_info = get_post_parameters_scrape();

	list(
		$target_domain,
		$target_directory,
		$request_url,
		$target_file,
		$target_url,
		$target_auth,
		$target_useragent,
		$target_charset,
		$target_check_type
	) = $scrape_info;

	//スクリーンショットの取得
	$screenshot_src = getScreenshot($request_url, $_POST['form-useragent']);

	//インデックス数の取得
	$index_count = get_index_count($request_url);

	//処理時間の取得
	if($index_count > 500) {
		$flag_process = '<span class="badge badge-warning">ページ数が多すぎるため処理リクエストを拒否します。</span>';
	} else {
		$flag_process = '<span class="badge badge-primary">処理可能です。次のステップに進んでください。</span>';
	}


	$card_info = array(
		$screenshot_src,
		$target_url,
		$index_count,
	);

//ヒアドキュメント開始------------------------
echo <<<EOD
<style>
.fade-1 {
	display: none;
}
</style>
<div class="card mt-5">
	<div class="row">
		<div class="col-sm-4">
			<img class="mw-100 rounded-left p-0 m-0" src="$screenshot_src" alt="サムネイル">
		</div>
		<div class="col-sm-8 pl-0">
			<div class="card-body pt-2 pr-2 pb-2 pl-0">
				<dl class="row mb-0">
					<dt class="col-sm-3">リクエストURL</dt>
					<dd class="col-sm-9 mb-1 p-0">$target_url</dd>
					<dt class="col-sm-3">推定ページ数</dt>
					<dd class="col-sm-9 mb-1 p-0">約 $index_count ページ</dd>
				</dl>
				$flag_process
			</div>
		</div>
	</div>
</div>
EOD;
//------------------------ヒアドキュメント終了


//ヒアドキュメント開始------------------------
echo <<<EOD
<form method="POST" action="/?panel=5-2">
	<div style="display:none;">
EOD;
		foreach($card_info as $rec) {
			echo '<input type="checkbox" name="card_info[]" value="' . $rec . '" checked="checked">';
		}

		foreach($scrape_info as $rec) {
			echo '<input type="checkbox" name="scrape_info[]" value="' . $rec . '" checked="checked">';
		}
echo <<<EOD
	</div>
EOD;
//------------------------ヒアドキュメント終了

	if($index_count < 5000) {
//ヒアドキュメント開始------------------------
echo <<<EOD
	<div class="form-group row mt-3">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">次の処理に進む</button>
		</div>
	</div>
</form>
EOD;
//------------------------ヒアドキュメント終了
	}

?>