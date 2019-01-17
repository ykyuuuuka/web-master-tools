<?php


	function get_post_parameters_scrape() {
		$target_domain = '';
		if(!empty($_POST['form-domain'])) {
			$target_domain = $_POST['form-domain'];
		}

		$target_directory = '';
		if(!empty($_POST['form-directory'])) {
			$target_directory = $_POST['form-directory'];
		}

		$request_url = $target_domain . $target_directory;

		$target_file = '';
		if(!empty($_POST['form-file'])) {
			$target_file = $_POST['form-file'];
		}

		$target_url = $target_domain . $target_directory . $target_file;

		$target_auth = '';
		if(!empty($_POST['form-id'])) {
			$target_auth = $_POST['form-id'] . ':' . $_POST['form-pass'];
		}

		$target_useragent = '';
		if(!empty($_POST['form-useragent'])) {
			if($_POST['form-useragent'] == 'pc') {
				$target_useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100';
			} else {
				$target_useragent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1';
			}
		}

		$target_charset = $_POST['form-charset'];
		$target_check_type = $_POST['form-check_type'];

		return array(
			$target_domain,
			$target_directory,
			$request_url,
			$target_file,
			$target_url,
			$target_auth,
			$target_useragent,
			$target_charset,
			$target_check_type
		);
	}


	function get_index_count($url) {
		$options = array(
			'http' => array(
				'method' => 'GET',
				'header' => 'User-Agent: DoCoMo/2.0 P903i(c100;TB;W24H12)',
			),
		);
		$context = stream_context_create($options);
		$str = 'site:' . $url;
		$url = 'http://search.yahoo.co.jp/search?p='.urlencode($str);
		$data = file_get_contents($url, false, $context);
		$doc = phpQuery::newDocument(mb_convert_encoding($data, 'HTML-ENTITIES', 'utf8')); 
		$doc_val = $doc['#inf']->text();
		preg_match("/(約)(.*?)(件)/", $doc_val, $result);
		$result = str_replace(',', '', $result[2]);
		$result = intval($result);
		return $result;
	}


	//初期設定変数は全部このclassに抱えさせる
	class Config {
		//変数
		public $_target_domain;
		public $_target_directory;
		public $_target_string;
		public $_target_file;
		public $_target_url;
		public $_target_auth;
		public $_target_useragent;
		public $_target_charset;
		public $_target_check_type;
		// //配列
		// public $_array_unopne;
		// public $_array_open;
		// public $_array_result;

		//変数宣言
		public function set_config($array) {
			$this->_target_domain			= $array[0];
			$this->_target_directory		= $array[1];
			$this->_target_string			= $array[2];
			$this->_target_file				= $array[3];
			$this->_target_url				= $array[4];
			$this->_target_auth				= $array[5];
			$this->_target_useragent		= $array[6];
			$this->_target_charset			= $array[7];
			$this->_target_check_type		= $array[8];
		}

		// //配列宣言
		// public function set_array_config($array_unopen, $array_open, $array_result) {
		// 	$this->_array_open 		= $array_open;
		// 	$this->_array_unopen 	= $array_unopen;
		// 	$this->_array_result 	= $array_result;
		// }
	}

	class ScrapeArray {
		//配列
		public $_array_unopne;
		public $_array_open;
		public $_array_result;

		//配列宣言
		public function set_array($array_unopen, $array_open, $array_result) {
			$this->_array_open 		= $array_open;
			$this->_array_unopen 	= $array_unopen;
			$this->_array_result 	= $array_result;
		}
	}


	class PageScrape {
		//curl関数でURLへアクセス。phpQueryで取得したオブジェクトを返却
		public static function curl_access($config, $url) {
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_USERAGENT, $config->_target_useragent); //UA宣言
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); //リダイレクトの許容
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //値返却を拒否
			if($config->_target_auth !== '') {
				//Auth認証が必要な場合
				echo 'Auth認証用のロジックを通ってる';
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
				curl_setopt($ch, CURLOPT_USERPWD, $config->_target_auth);
			}
			$response = curl_exec($ch); //curlの実行

			//実行結果のステータス取得
			$responce_http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE); //httpステータスコードの取得
			$responce_request_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); //最終的にアクセスしたURLの取得

			//実行結果の評価
			// if($responce_http_status !== 200) return FALSE;
			// if(strpos($responce_request_url, $config->_target_string) === false) return FALSE;

			$doc = phpQuery::newDocument(mb_convert_encoding($response, 'HTML-ENTITIES', $config->_target_charset));
			return $doc;
		}

		//phpQueryで取得したオブジェクトからhrefの値をスクレイプ。配列で返却。
		public static function scrape_href($config, $doc) {
			$array_href = []; //配列の初期化
			$array_href_minify = []; //配列の初期化

			foreach( $doc['a'] as $dom ) {
				$dom_val = pq($dom) -> attr('href');

				//取得したhrefの値がルート相対パスだった場合は絶対パスへ書き換え
				$path_absolute = UrlCheck::path_convert_absolute($config, $dom_val);

				//絶対パスの適正チェック
				if(UrlCheck::path_target_check($config, $path_absolute) === FALSE) continue;

				//パラメーター付きURLを含めるかどうかの分岐
				if($config->_target_check_type === 0) {
					//パラメーター付きURLは含めない場合
					$arr = parse_url($path_absolute);
					$path_absolute = $arr['scheme'] . '://' . $arr['host'] . $arr['path'];
				}

				if(UrlCheck::rec_check($path_absolute) === FALSE) {
					array_push($array_href, $path_absolute);
				} else {
					array_push($array_href, $path_absolute);
					array_push($array_href_minify, $path_absolute);
				}
			}

			$array_href = array_unique($array_href);
			$array_href_minify = array_unique($array_href_minify);

			return array($array_href, $array_href_minify); //配列で返却
		}

		public static function scrape_roop($config, $scrape_array) {
			$array_unopen 	= $scrape_array->_array_unopen;
			$array_open 	= $scrape_array->_array_open;
			$array_result 	= $scrape_array->_array_result;

			foreach($array_unopen as $key => $val) {

				//$array_unopenから検査済みの値を削除
				if(in_array($val, $array_open, TRUE)) {
					$slice_target = array_search($val, $array_unopen);
					array_splice($array_unopen, $slice_target, 1);
					continue;
				} else {
					//検査済みでなければ$array_openへ格納
					array_push($array_open, $val);
					@ob_flush();
					@flush();
				}

				$doc = PageScrape::curl_access($config, $val);
				list($array_href, $array_href_minify) = PageScrape::scrape_href($config, $doc);

				//配列をマージ
				$array_unopen = array_merge($array_unopen, $array_href_minify);
				$array_result = array_merge($array_result, $array_href);

				//重複を調整
				$array_unopen = array_unique($array_unopen);

				//$array_unopenを順番通り並べる
				$array_unopen = array_values($array_unopen);
			}

			$array_result = array_unique($array_result);
			$array_unopen_count = count($array_unopen);

			//検査結果をconfigクラスの配列に格納して情報を更新
			$scrape_array->set_array($array_unopen, $array_open, $array_result);

			if($array_unopen_count !== 0) {

				PageScrape::scrape_roop($config, $scrape_array);
			} else {
				return TRUE;
			}
		}
	}


	class UrlCheck {
		//絶対パスへの書き換え
		public static function path_convert_absolute($config, $path) {
			if(strpos($path, '.png')) return FALSE;
			if(strpos($path, '.jpg')) return FALSE;
			if(strpos($path, '.jpeg')) return FALSE;
			if(strpos($path, '.gif')) return FALSE;

			if(0 === strpos($path, '//')) {
				return $path;
			} else if(0 === strpos($path, '/')) {
				$path_absolute = $config->_target_domain . $path;
				return $path_absolute;
			} else {
				return $path;
			}
		}

		//target_stringに合致するかしないかを判定
		public static function path_target_check($config, $path) {
			if (0 !== strpos($path, $config->_target_string)) return FALSE;
		}

		//そもそも読まないように
		public static function rec_check($rec) {
			if (strpos($rec, '.jpg')) return FALSE;
			if (strpos($rec, '.png')) return FALSE;
			if (strpos($rec, '.jpeg')) return FALSE;
			if (strpos($rec, '.gif')) return FALSE;
			if (strpos($rec, '.xlsx')) return FALSE;
			// if (strpos($rec, '.pdf')) return FALSE;
			return TRUE;
		}

	}

?>