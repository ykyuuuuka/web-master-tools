<h1 class="h3">Readme</h1>
<p class="normal mb-5">web-scraper をローカルで実行する方法をご案内します。</p>

<h2 class="h4 mb-3">Githubからソースファイルをダウンロード</h2>
<div class="bg-code mb-5">
	<a href="https://github.com/ykyuuuuka/web-master-tools" target="_blank">https://github.com/ykyuuuuka/web-master-tools</a>
</div>

<h2 class="h4 mb-3">実行環境</h2>
<ul class="mb-5">
	<li>PHP5.0以上</li>
	<li>php includeを許可</li>
</ul>

<h2 class="h4 mb-3">リクエスト制限の解除</h2>
<p class="normal">本アプリケーションはherokuでの実行を前提に、サーバーで30秒以上かかることが予想されるボリュームのリクエストはデフォルトで拒否していますが、 setting.php ファイルの以下の変数でリクエスト制限を解除できます。</p>
<div class="bg-code mb-5">
	$request_limit = 0;　　//デフォルトの設定。リクエスト制限あり<br>
	$request_limit = 1;　　//リクエスト制限なし
</div>

