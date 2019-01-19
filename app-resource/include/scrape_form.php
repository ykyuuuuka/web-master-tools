<h1 class="h3">ファイルリスト生成</h1>

<form action="/?panel=5-1" method="post" class="mt-5">

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">ドメイン名</label>
		<div class="col-sm-6">
			<label class="sr-only">ドメイン名</label>
			<input type="text" class="form-control" name="form-domain" placeholder="" autocomplete="off">
			<p class="pr-2 m-0 small text-muted">「https://example.com/aaa/bbb/index.html?p=xyz」の場合、「https://example.com」のみ入力してください。</p>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">ディレクトリ名</label>
		<div class="col-sm-6">
			<label class="sr-only">ディレクトリ名</label>
			<input type="text" class="form-control" name="form-directory" placeholder="" autocomplete="off">
			<p class="pr-2 m-0 small text-muted">「https://example.com/aaa/bbb/index.html?p=xyz」の場合、<br>「/aaa/bbb/」のみ入力してください。</p>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">ファイル名</label>
		<div class="col-sm-6">
			<label class="sr-only">ファイル名</label>
			<input type="text" class="form-control" name="form-file" placeholder="" autocomplete="off">
			<p class="pr-2 m-0 small text-muted">「https://example.com/aaa/bbb/index.html?p=xyz」の場合、<br>「index.html?p=xyz」のみ入力してください。</p>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">ダイジェスト認証</label>
		<div class="col-sm-3">
			<label class="sr-only">ID</label>
			<input type="text" class="form-control mb-3" name="form-id" placeholder="ID" autocomplete="off">
		</div>
		<div class="col-sm-3">
			<label class="sr-only">Password</label>
			<input type="password" class="form-control" name="form-pass" placeholder="Password" autocomplete="off">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">文字コード</label>
		<div class="col-sm-4 mb-3">
			<select class="form-control" name="form-charset">
				<option value="utf-8">utf-8</option>
				<option value="shift_jis">shift_jis</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">ユーザーエージェント</label>
		<div class="col-sm-4 mb-3">
			<select class="form-control" name="form-useragent">
				<option value="pc">PC</option>
				<option value="mobile">MOBILE</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label">パラメーター付きURL</label>
		<div class="col-sm-4">
			<select class="form-control" name="form-check_type">
				<option value="off">カウントしない</option>
				<option value="on">カウントする</option>
			</select>
			<p class="pr-2 m-0 pt-1 small text-muted">ファイル名が同じでも違うパラメーターが割り振られているケースで、パラメーターが違えば違うページとみなす場合に「カウントする」を選択してください。</p>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">ファイルリストを生成する</button>
		</div>
	</div>

</form>


