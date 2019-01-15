<h1 class="h3">404チェック</h1>

<nav class="mt-5">
	<div class="nav nav-tabs">
		<p class="nav-item nav-link active" data-toggle="tab" href="#nav-1">URLから分析</p>
	</div>
</nav>

<div class="tab-content">
	<div class="tab-pane fade p-3 mt-3 show active" id="nav-1">
		<form action="/?panel=2-1" method="post">
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
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">分析を開始</button>
				</div>
			</div>
		</form>
	</div>
</div>