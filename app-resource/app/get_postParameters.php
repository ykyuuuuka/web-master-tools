<?php

	/*
	post通信内容の処理
	*/
	//IDとパスワードの受け取り
	if(!empty($_POST['form-id']) and !empty($_POST['form-pass'])) {
		//IDもパスワードも値がある場合
		$post_auth = TRUE;
		$curl_auth = $_POST['form-id'].':'.$_POST['form-pass'];
	} else if(empty($_POST['form-id']) and empty($_POST['form-pass'])) {
		//IDもパスワードも空の場合
		$post_auth = TRUE;
		$curl_auth = NULL;
	} else {
		//IDかパスワードどちらかの値がある場合
		$post_auth = FALSE;
		error_formPass();
	}

	//URLリストの受け取り
	if(!empty($_POST['url'])) {
		$post_url = TRUE;
		$file_list = explode_postUrl($_POST['url']);
		$file_list_num = count($file_list);
	} else {
		$post_url = FALSE;
		error_formUrl();
	}

	//分析項目の受け取り
	if(!empty($_POST['audits'])) {
		$audits = implode('+', $_POST['audits']);
	}

	//文字コードの受け取り
	if(isset($_POST['form-charset'])) {
		$charset = $_POST['form-charset'];
	}

	//ユーザーエージェントの受け取り
	if(isset($_POST['form-useragent'])) {
		$useragent = $_POST['form-useragent'];
	}

?>