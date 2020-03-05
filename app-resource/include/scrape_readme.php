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

<h2 class="h4 mb-3">実行方法</h2>
<ul>
	<li>任意のディレクトリに解凍したファイルを XAMPP や MAMP などの Apache ディストリビューションソフトウェアで構築したローカル環境に可能します。（その際、「web-master-tools-master」がルートディレクトリとなるよう、httpd.conf または httpd-vhosts.conf を調整してください）</li>
	<li>エントリーポイントはindex.phpですので例えば「localhost:8888/index.php」などでアプリケーションの実行が可能です。</li>
</ul>
<p class="normal mb-5">XAMPP のセットアップに不慣れな方は 「<a href="http://creator.aainc.co.jp/archives/6388" target="_blank">xamppでローカル作業環境構築をしよう！</a>」 などを参考ください。</p>

<h2 class="h4 mb-3">リクエスト制限の解除</h2>
<p class="normal">本アプリケーションはherokuでの実行を前提に、サーバーで30秒以上かかることが予想されるボリュームのリクエストはデフォルトで拒否していますが、「/app-resource/include/setting.php」の以下の変数を変更することでリクエスト制限を解除できます。</p>
<div class="bg-code mb-5">
	$request_limit = 0;　　//制限あり（デフォルト）<br>
	$request_limit = 1;　　//制限なし
</div>

