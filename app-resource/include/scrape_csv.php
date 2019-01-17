<?php

	//配列の取得
	// $result_array = $_SESSION['result_array'];
	$result_array = ['https://www.imjp.co.jp'];
	// $config = $_SESSION['config'];
	$scrape_info = array(
		'',
		'',
		'',
		'',
		'',
		'',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100',
		'utf-8',
		0
	);
	$config = new Config();
	$config->set_config($scrape_info);

	$filelist_csv = array('url', 'title');

	foreach($result_array as $file_path){
		$doc = PageScrape::curl_access($config, $file_path);
		$val_title = $doc['title']->text();
		$array = array($file_path, $val_title);
		$filelist_csv = array_merge($filelist_csv, $array);
	}

	echo '<pre>';
	var_dump($filelist_csv);
	echo '</pre>';

	$f = fopen("test.csv", "w");
	fputcsv($f, $filelist_csv);
	fclose($f);


?>
















