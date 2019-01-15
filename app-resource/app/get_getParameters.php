<?php

	/*
	get通信内容の処理
	*/
	//IDとパスワードの受け取り
	if(isset($_GET['auth'])) {
		$auth = $_GET['auth'];
	}

	//URLリストの受け取り
	if(isset($_GET['url'])) {
		$file_path = $_GET['url'];
	}

	//分析項目の受け取り
	if(isset($_GET['audits'])) {
		$audits = explode_audits($_GET['audits']);
	}

	//文字コードの受け取り
	if(isset($_GET['charset'])) {
		$charset = $_GET['charset'];
	}

	//ユーザーエージェントの受け取り
	if(isset($_GET['useragent'])) {
		$useragent_type = $_GET['useragent'];
	}

?>