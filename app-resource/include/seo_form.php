<h1 class="h3">SEO分析</h1>

<nav class="mt-5">
	<div class="nav nav-tabs">
		<p class="nav-item nav-link active" data-toggle="tab" href="#nav-1">URLから分析</p>
		<!-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-2">サーバー内のファイルを診断</a> -->
	</div>
</nav>

<div class="tab-content">
	<div class="tab-pane fade p-3 mt-3 show active" id="nav-1">
		<form action="/?panel=0-1" method="post">
			<div class="form-group">
				<textarea class="form-control"rows="5" name="url"></textarea>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">ダイジェスト認証</label>
				<div class="col-sm-4">
					<label class="sr-only">ID</label>
					<input type="text" class="form-control" name="form-id" placeholder="ID" autocomplete="off">
				</div>
				<div class="col-sm-4">
					<label class="sr-only">Password</label>
					<input type="password" class="form-control" name="form-pass" placeholder="Password" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4">分析項目</label>
				<div class="col-sm-8 checkbox-seo">
					<div class="form-check mb-2" id="checkbox-seo-primary">
						<input class="form-check-input" id="form-check01" type="checkbox" value="all" name="audits[]" checked="checked">
						<label class="form-check-label" for="form-check01">すべて</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check02" type="checkbox" value="meta" name="audits[]">
						<label class="form-check-label" for="form-check02">meta情報</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check03" type="checkbox" value="heading" name="audits[]">
						<label class="form-check-label" for="form-check03">見出しタグ</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check04" type="checkbox" value="bread" name="audits[]">
						<label class="form-check-label" for="form-check04">パンくず</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check05" type="checkbox" value="link" name="audits[]">
						<label class="form-check-label" for="form-check05">リンク</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check06" type="checkbox" value="alt" name="audits[]">
						<label class="form-check-label" for="form-check06">alt</label>
					</div>
					<div class="form-check custom-control-inline" id="checkbox-seo-secondary">
						<input class="form-check-input" id="form-check07" type="checkbox" value="ogp" name="audits[]">
						<label class="form-check-label" for="form-check07">OGP</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">文字コード</label>
				<div class="col-sm-4">
					<select class="form-control" name="form-charset">
						<option value="utf-8">UTF-8</option>
						<option value="shift_jis">shift_jis</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">ユーザーエージェント</label>
				<div class="col-sm-4">
					<select class="form-control" name="form-useragent">
						<option value="pc">PC</option>
						<option value="mobile">MOBILE</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">分析を開始</button>
				</div>
			</div>
		</form>
	</div>
<!-- 	<div class="tab-pane fade p-3 mt-3" id="nav-2">
		SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断SEO診断
	</div> -->
</div>