<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>web master tools</title>

	<link rel="stylesheet" href="/app-resource/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="/app-resource/css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700">
</head>
<body>

	<div class="wrapper">
		<?php include('app-resource/include/header.php'); ?>
		<main>
			<div class="contents">

				<?php
					//エラー出力等のphp.ini向け設定ファイル
					include('app-resource/include/setting.php');

					//処理ファイル
					require_once('app-resource/app/app_bundle.php');
					require_once('app-resource/app/phpQuery-onefile.php');

					//セッションスタート
					session_start();

					//ルーティング処理
					if(isset($_GET['panel'])) {
						$panel_type = $_GET['panel'];
						//サイトスクレイプアプリケーション
						if($panel_type == '5') include('app-resource/include/scrape_form.php');
						if($panel_type == '5-1') include('app-resource/include/scrape_check.php');
						if($panel_type == '5-2') include('app-resource/include/scrape_result.php');
						if($panel_type == '5-3') include('app-resource/include/scrape_csv.php');
					} else {
						header('Location: /?panel=5');
					}
				?>

			</div>
		</main>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="/app-resource/js/app.js"></script>
</body>
</html>