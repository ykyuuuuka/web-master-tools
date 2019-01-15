<?php
	function error_formPass() {
//ヒアドキュメント開始------------------------
echo <<<EOD
	<div class="alert alert alert-danger alert-dismissible fade show" role="alert">
		入力された <strong>ID</strong> または <strong>Password</strong>が 正しくありません
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
EOD;
//------------------------ヒアドキュメント終了
	}


	function error_formUrl() {
//ヒアドキュメント開始------------------------
echo <<<EOD
	<div class="alert alert alert-danger alert-dismissible fade show" role="alert">
		入力された <strong>URL</strong> が正しくありません
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
EOD;
//------------------------ヒアドキュメント終了
	}


?>