<?php

	//formから受け取ったURLリストを配列化
	function explode_postUrl($url) {
		$post_val = $url;
		//改行を削除
		$post_val = str_replace('\r\n', '\n', $post_val);
		$post_val = str_replace('\r', '\n', $post_val);
		//配列化したファイルリストが完成
		$file_path_list = explode('\n', $post_val);
		$file_path_list = array_map('trim', $file_path_list);
		$file_path_list = array_values($file_path_list);
		return $file_path_list;
	}

	//分析項目を配列化
	function explode_audits($audits) {
		$audits_arr = explode('+', $audits);
		$audits_arr = array_map('trim', $audits_arr);
		$audits_arr = array_values($audits_arr);
		return $audits_arr;
	}

	//Google Page Speed Insightからスクリンショットを取得
	function getScreenshot($url, $useragent) {
		if($useragent == 'pc') {
			$target = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?screenshot=true&strategy=desktop&url='.$url;
		} else {
			$target = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?screenshot=true&strategy=mobile&url='.$url;
		}
		$ch = curl_init($target);
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		curl_close($ch);

		$data = json_decode($response, true);
		$mime_type = $data['screenshot']['mime_type'];
		$screenshot = $data['screenshot']['data'];
		$screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);
		$screenshot_src = 'data:'.$mime_type.';base64,'.$screenshot;

		return $screenshot_src;
	}

?>