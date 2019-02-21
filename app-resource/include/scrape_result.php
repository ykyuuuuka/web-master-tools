<?php

	//画面描画の実施
	@ob_flush();
	@flush();

	/*
	前のページからパラメーターを受け取り
	*/
	$card_info = $_POST['card_info'];
	$scrape_info = $_POST['scrape_info'];

//ヒアドキュメント開始------------------------
echo <<<EOD
<h1 class="h3">ファイルリスト生成</h1>
<div class="card mt-5">
	<div class="row">
		<div class="col-sm-4">
			<img class="rounded-left p-0 m-0 w-100" src="$card_info[0]" alt="サムネイル">
		</div>
		<div class="col-sm-8 pl-0">
			<div class="card-body pt-2 pr-2 pb-2 pl-0">
				<dl class="row mb-0">
					<dt class="col-sm-3">リクエストURL</dt>
					<dd class="col-sm-9 mb-1 p-0">$card_info[1]</dd>
					<dt class="col-sm-3">推定ページ数</dt>
					<dd class="col-sm-9 mb-1 p-0">約 $card_info[2] ページ</dd>
					<dt class="col-sm-3">推定処理時間</dt>
					<dd class="col-sm-9 mb-1 p-0">$card_info[3]</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

<div class="card mt-5 fade-1">
	<div class="row">
		<div class="col-sm-4" style="text-align:center;">
			<img src="/app-resource/images/loading.gif" class="mw-100 rounded-left p-0 m-0" style="width:70%;">
		</div>
		<div class="col-sm-8 pl-0">
			<div class="card-body pt-2 pr-2 pb-2 pl-0">
				<p>処理プロセス中</p>
			</div>
		</div>
	</div>
</div>
EOD;
//------------------------ヒアドキュメント終了

	//画面描画の実施
	@ob_flush();
	@flush();


	/*
	プロセス1
	*/
	//インスタンスのセットアップ
	$config = new Config();
	$config->set_config($scrape_info);

	//初回評価の実施
	$doc = PageScrape::curl_access($config, $config->_target_url);
	list($array_href, $array_href_minify) = PageScrape::scrape_href($config, $doc);

	//初回評価の結果を配列に格納
	$array_unopen = $array_href_minify;
	$array_open = [];
	$array_result = $array_href;
	array_push($array_open, $config->_target_url);


	//結果が格納される配列クラスのセットアップ
	$scrape_array = new ScrapeArray();
	$scrape_array->set_array($array_unopen, $array_open, $array_result);
	PageScrape::scrape_roop($config, $scrape_array);

	//デバッグ用echo
	// echo '<pre>';
	// var_dump($scrape_array->_array_unopen);
	// var_dump($scrape_array->_array_open);
	// var_dump($scrape_array->_array_result);
	// var_dump($array_result);
	// echo '</pre>';

	//セッションに配列を保存（じゃあもう値は全部セッション管理にした方がいいのでは）
	$_SESSION['result_array'] = $scrape_array->_array_result;
	$_SESSION['config'] = $scrape_info;
	echo '<style>.fade-1{display:none;}</style>';


//ヒアドキュメント開始------------------------
echo <<<EOD
	<a href="/index.php/?panel=5-3" class="btn btn-primary mt-3">ファイルリストを出力</a>
EOD;
//------------------------ヒアドキュメント終了

?>
















