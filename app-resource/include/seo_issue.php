<?php

	include('app-resource/app/get_postParameters.php');

	/*
	単一ページの分析なのか、複数ページの分析なのか
	*/
	//formの受け取りでエラーがあったら分岐の実行は行わない
	if($post_auth === TRUE and $post_url === TRUE) {
		if($file_list_num != 1) {
			include('app-resource/include/seo_issue_list.php');
		} else {
			$curl_auth_encode	= urlencode($curl_auth);
			$file_path_encode	= urlencode($file_list[0]);
			$charset_encode		= urlencode($charset);
			$audits_encode		= urlencode($audits);
			$useragent_encode	= urlencode($useragent);

			$redirect_path = 
				'/?panel=0-2&url='	.$file_path_encode.
				'&auth='				.$curl_auth_encode.
				'&audits='			.$audits_encode.
				'&charset='			.$charset_encode.
				'&useragent='			.$useragent_encode;

			header('Location: '.$redirect_path);
		}
	} else {
		include('app-resource/include/seo_form.php');
	}
?>







