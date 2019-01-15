<?php

	include('app-resource/app/get_httpParameters.php');

	/*
	分析の開始
	*/
		/*
		curl関数
		*/
		foreach($file_path_list as $file_path){
			//curl関数でページソースを取得
			$ch = curl_init($file_path);
			if($curl_auth !== NULL) {
				//Auth認証が必要な場合
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
				curl_setopt($ch, CURLOPT_USERPWD, $curl_auth);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			}
			if($useragent=== 'pc') {
				//ユーザーエージェントの指定
				curl_setopt($ch, CURLOPT_USERAGENT, 'ua2');
			} else {
				//ユーザーエージェントの指定
				curl_setopt($ch, CURLOPT_USERAGENT, 'ua2');
			}
			//デフォルトでブラウザ出力されるのを回避
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($ch);

			//ステータスコードの確認
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);

			if($http_code === 200) {
				$doc = phpQuery::newDocument(mb_convert_encoding($response, 'HTML-ENTITIES', $post_charset));
				// $doc_val = $doc['title'] -> text();
				// echo $doc_val;
			} else {
				echo $file_path.'は診断可能なURLではありません。ステータスコードは'.$http_code.'です<br>';
			}
		}
	} else {
		include('app-resource/include/seo_form.php');
	}

?>
<h1 class="h3">SEO分析結果</h1>
<div class="row mt-3">
	<div class="col-sm-9">
		<div class="card">
			<div class="card-header p-2">
				<div class="row">
					<div class="col-sm-8 h5 pt-1 mb-0">
						<i class="zmdi zmdi-alert-octagon mr-2 ml-2"></i>タイトルを設定する
					</div>
					<div class="col-sm-4 pl-1">
						<button type="button" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
							<i class="zmdi zmdi-format-list-bulleted"></i> 一覧表示<span class="badge badge-light ml-2">12</span>
						</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<p class="card-text">以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。以下のいずれかの項目で不適切なページがあります。</p>
				<ul>
					<li>てきすと</li>
					<li>てきすと</li>
					<li>てきすと</li>
					<li>てきすと</li>
					<li>てきすと</li>
				</ul>
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header pt-2 pb-2 pr-3 pl-3">
						<h6 class="modal-title pt-1" id="exampleModalLabel">ページリスト</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-3">
						テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。
					</div>
					<div class="modal-footer pt-2 pb-2 pr-3 pl-3">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-sm-3">
		<ul class="seo_issue_list_menu">
			<li><a href="#">致命的な課題<span class="badge badge-pill badge-dark">40</span></a></li>
			<li><a href="#">要注意な課題<span class="badge badge-pill badge-dark">20</span></a></li>
			<li><a href="#">非推奨な課題<span class="badge badge-pill badge-dark">88</span></a></li>
			<li><a href="">How it works</a></li>
			<li><a href="">How it works</a></li>
			<li><a href="">How it works</a></li>
		</ul>
	</div>
</div>







