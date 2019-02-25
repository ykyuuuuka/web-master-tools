<h1 class="h3">ファイルリスト生成</h1>

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

<?php

	//画面描画の実施
	@ob_flush();
	@flush();

	//配列の取得
	$result_array = $_SESSION['result_array'];
	$scrape_info = $_SESSION['config'];
	$config = new Config();
	$config->set_config($scrape_info);

	//画面描画の実施
	@ob_flush();
	@flush();

	$filelist_csv[0] = array(
		'* path',
		'* content',
		'* id',
		'* title',
		'* title_breadcrumb',
		'* title_h1',
		'* title_label',
		'* title_full',
		'* logical_path',
		'* list_flg',
		'* layout',
		'* orderby',
		'* keywords',
		'* description',
		'* category_top_flg',
		'* **delete_flg',
		'* og:title',
		'* og:description',
		'* og:image',
		'* og:type',
		'* og:site_name',
		'* og:url',
		'* og:locale',
		'* fb:app_id',
		'* apple-touch-icon',
		'* copyright',
		'* viewport',
		'* sitecatalyst',
		'* favicon'
	);

	foreach($result_array as $file_path){
		$doc = PageScrape::curl_access($config, $file_path);

		//* path
		$target_str = $config->_target_domain;
		$val_path = str_replace($target_str, '', $file_path);
		//* content
		$val_content = '';
		//* id
		$val_id = '';
		//* title
		$val_title = $doc['title']->text();
		//* title_breadcrumb
		$val_title_breadcrumb = '';
		//* title_h1
		$val_title_h1 = $doc['h1']->text();
		if(!isset($val_title_h1) or empty($val_title_h1)) $val_title_h1 = '';
		$val_title_h1 = str_replace(" ", "", $val_title_h1);
		$val_title_h1 = preg_replace('/(?:\n|\r|\r\n)/', '', $val_title_h1);
		//* title_label
		$val_title_label = '';
		//* title_full
		$val_title_full = '';
		//* logical_path
		$val_logical_path = '';
		//* list_flg
		$val_list_flg = '';
		//* layout
		$val_layout = '';
		//* orderby
		$val_orderby = '';
		//* keywords
		$val_keywords = $doc['meta[name=keywords]']->attr('content');
		if(!isset($val_keywords) or empty($val_keywords)) $val_keywords = '';
		//* description
		$val_description = $doc['meta[name=description]']->attr('content');
		if(!isset($val_description) or empty($val_description)) $val_description = '';
		//* category_top_flg
		$val_category_top_flg = '';
		//* **delete_flg
		$val_delete_flg = '';
		//* og:title
		$val_og_title = $doc['meta[property=og:title]']->attr('content');
		if(!isset($val_og_title) or empty($val_og_title)) $val_og_title = '';
		//* og:description
		$val_og_description = $doc['meta[property=og:description]']->attr('content');
		if(!isset($val_og_description) or empty($val_og_description)) $val_og_description = '';
		//* og:image
		$val_og_image = $doc['meta[property=og:image]']->attr('content');
		if(!isset($val_og_image) or empty($val_og_image)) $val_og_image = '';
		//* og:type
		$val_og_type = $doc['meta[property=og:type]']->attr('content');
		if(!isset($val_og_type) or empty($val_og_type)) $val_og_type = '';
		//* og:site_name
		$val_og_site_name = $doc['meta[property=og:site_name]']->attr('content');
		if(!isset($val_og_site_name) or empty($val_og_site_name)) $val_og_site_name = '';
		//* og:url
		$val_og_url = $doc['meta[property=og:url]']->attr('content');
		if(!isset($val_og_url) or empty($val_og_url)) $val_og_url = '';
		//* og:locale
		$val_og_locale = $doc['meta[property=og:locale]']->attr('content');
		if(!isset($val_og_locale) or empty($val_og_locale)) $val_og_locale = '';
		//* fb:app_id
		$val_fb_app_id = $doc['meta[property=fb:app_id]']->attr('content');
		if(!isset($val_fb_app_id) or empty($val_fb_app_id)) $val_fb_app_id = '';
		//* apple-touch-icon
		$val_apple_touch_icon = $doc['link[rel=apple-touch-icon]']->attr('href');
		if(!isset($val_apple_touch_icon) or empty($val_apple_touch_icon)) $val_apple_touch_icon = '';
		//* copyright
		$val_copyright = '';
		//* viewport
		$val_viewport = $doc['meta[name=viewport]']->attr('content');
		if(!isset($val_viewport) or empty($val_viewport)) $val_viewport = '';
		//* sitecatalyst
		$val_sitecatalyst = '';
		//* favicon
		$val_favicon = $doc['link[rel=shortcut icon]']->attr('href');
		if(!isset($val_favicon) or empty($val_favicon)) $val_favicon = '';

		$array[0] = array(
			$val_path,
			$val_content,
			$val_id,
			$val_title,
			$val_title_breadcrumb,
			$val_title_h1,
			$val_title_label,
			$val_title_full,
			$val_logical_path,
			$val_list_flg,
			$val_layout,
			$val_orderby,
			$val_keywords,
			$val_description,
			$val_category_top_flg,
			$val_delete_flg,
			$val_og_title,
			$val_og_description,
			$val_og_image,
			$val_og_type,
			$val_og_site_name,
			$val_og_url,
			$val_og_locale,
			$val_fb_app_id,
			$val_apple_touch_icon,
			$val_copyright,
			$val_viewport,
			$val_sitecatalyst,
			$val_favicon
		);

		$filelist_csv = array_merge($filelist_csv, $array);

		//初期化
		$array = [];
	}


	/*
	CSV化の関数
	*/
	// 区切り文字と囲み文字を指定
	define('CSV_DELIMITER', ',');
	define('CSV_ENCLOSURE', '"');

	//ファイル名にタイムスタンプを残す
	$timestamp = time();
	$timestamp = date('Ymd' ,$timestamp);
	$filename = 'filelist_'.$timestamp.'.csv';

	//csv化
	$f = fopen($filename, 'w');
	foreach ($filelist_csv as $row) {
		fputcsv($f, $row, CSV_DELIMITER, CSV_ENCLOSURE);
	}
	fclose($f);
	echo '<style>.fade-1{display:none;}</style>';

//ヒアドキュメント開始------------------------
echo <<<EOD
<div class="card mt-5">
	<div class="row">
		<div class="col-sm-12">
			<div class="card-body">
				<p class="m-0">全ての処理が終了しました。<br><a href="/$filename">こちら</a>からCSVファイルをダウンロードいただけます。</p>
				<br>
				<p class="m-0">ダウロードファイルはWindowsのExcelで開くと文字化けするケースがあります。事象が再現された場合は、プリインストールされている「メモ帳」でcsvファイルを展開し、上書き保存を行うことで解消されます。</p>
			</div>
		</div>
	</div>
</div>
EOD;
//------------------------ヒアドキュメント終了

?>


















